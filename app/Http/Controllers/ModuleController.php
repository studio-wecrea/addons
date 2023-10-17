<?php

namespace App\Http\Controllers;

use App\Http\Requests\Module\StoreModuleRequest;
use App\Http\Requests\Module\UpdateModuleRequest;
use App\Models\Category;
use App\Models\Module;
use App\Models\ModuleCategory;
use App\Models\Platform;
use App\Models\Purchase;
use App\Services\FilteringService;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ModuleController extends Controller
{
    public function index(Request $request)
    {
        $customer = Auth::guard('webcustomers')->user();
        $modules = Module::orderBy('name')->get();
        $categories = Category::withCount('modules')->get();
        $platforms = Platform::all();
        $selectedCategories = $request->input('categories', []);
        $selectedPlatforms = $request->input('platforms', []);
       
        $filteredModules = FilteringService::multiFiltering($request);

        // $modulesnumbers = Category::withCount('modules')->get();

        return view('modules.index', compact('customer','modules', 'categories', 'platforms', 'filteredModules', 'selectedCategories', 'selectedPlatforms'));

        // if(empty($request->all()) )
        // {
        //     $modules = Module::orderBy('name')->get();
        // }
        // else
        // {
        //     $modules = FilteringService::filterByCategory($request);
        // }
        
        // $customer = Auth::guard('webcustomers')->user();
        // return view('modules.index')->with(['customer' => $customer,
        // 'modules'=>$modules]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $platforms = Platform::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('modules.create')->with(['platforms' => $platforms,
    'categories'=>$categories]);
    }

    public function show($id)
    {
        $customer = Auth::guard('webcustomers')->user();
        $module = Module::findOrFail($id);
        $platforms = Platform::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('modules.show')->with(['module'=> $module, 'platforms'=>$platforms, 'categories'=>$categories, 'customer' => $customer]);
    }

    public function store(StoreModuleRequest $request)

    {
        $vdata = $request->validated();

        $image = MediaService::upload($vdata['image']);
        $file = MediaService::uploadFile($vdata['file']);
        // $video = MediaService::upload($vdata['video']);

        $module = Module::create([
            'name' => $vdata['name'],
            'description' => $vdata['description'],
            'price' => $vdata['price'] ,
            'image' => $image,
            'file' => $file,
            'platform_id' => $vdata['platform']
            // 'video' => $video
        ]);

        $category = new ModuleCategory();
        $category->module_id = $module->id;
        $category->category_id = $request->category;
        $category->save();

        return redirect()->route('admin.list')
            ->with('success', 'Module stored successfully.');
    }

    public function edit($id)
    {
        
        $module = Module::findOrFail($id);
        $platforms = Platform::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('modules.edit')->with(['module'=> $module,'platforms' => $platforms,
    'categories'=>$categories]);
    }
    

    public function update(UpdateModuleRequest $request, $id)
    {
        $module= Module::findOrFail($id);

        $vdata= $request->validated();

        if (isset($vdata['image'])){
            if (empty($module->image)){
                $image_url = MediaService::uploadFile($vdata['image']);
                $module->image = $image_url;
            }
            Storage::delete($module->image);
            $image_url = MediaService::upload($vdata['image']);
            $module->image = $image_url;
        }
        if (isset($vdata['video'])){
            Storage::delete($module->video);
            $video_url = MediaService::upload($vdata['video']);
            $module->video = $video_url;
        }
        if (isset($vdata['file'])){

            if (empty($module->file)){
                $file_url = MediaService::uploadFile($vdata['file']);
                $module->file = $file_url;
            }
            
            Storage::delete($module->file);
            $file_url = MediaService::uploadFile($vdata['file']);
            $module->file = $file_url;

        } 

        $module->name = $vdata['name'];
        $module->description = $vdata['description'];
        $module->price = $vdata['price'];
        $module->platform_id = $vdata['platform'];
        $module->save();

        $category= ModuleCategory::findOrFail($id);
        $category->module_id = $module->id;
        $category->category_id = $request->category;
        $category->save();

        return redirect()->route('admin.list')->with('success', 'Module was updated successfully');
    }

    public function delete($id)
    {
        $module = Module::findOrFail($id);
        if (!empty($module->image) || !empty($module->video) || !empty($module->file) ){
            $filePathImage = explode('/storage', $module->image);
            $filePathVideo = explode('/storage', $module->video);
            $filePathFile = explode('/storage', $module->file);

            $pathImage = '/public' . $filePathImage[1];
            $pathVideo = '/public' . $filePathVideo[1];
            $pathFile = '/public' . $filePathFile[1];

            if (!Storage::delete($pathImage) || !Storage::delete($pathVideo) | !Storage::delete($pathFile)) {
                return redirect()->route('modules.index')->with('error', 'Problem');
            }
        }

            $module->delete();

            return redirect()->route('admin.list')->with('success', 'Module was successfully deleted');
    }

    public function cart(){

        $customer = Auth::guard('webcustomers')->user();
        $modules = Module::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();
        return view ('modules.cart')->with(['customer'=> $customer, 'modules'=> $modules, 'platforms' => $platforms]);
    }

    public function webhook()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

// Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $order = Purchase::where('session_id', $session->id)->first();
                if ($order && $order->status === 'unpaid') {
                    $order->status = 'paid';
                    $order->save();
                    // Send email to customer
                }

            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }

}
