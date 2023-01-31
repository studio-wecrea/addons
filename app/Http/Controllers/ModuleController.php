<?php

namespace App\Http\Controllers;

use App\Http\Requests\Module\StoreModuleRequest;
use App\Http\Requests\Module\UpdateModuleRequest;
use App\Models\Category;
use App\Models\Module;
use App\Models\ModuleCategory;
use App\Models\Platform;
use App\Models\Purchase;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ModuleController extends Controller
{
    public function index()
    {
        
        $modules = Module::orderBy('name')->get();
        $customer = Auth::guard('webcustomers')->user();
        return view('modules.index')->with(['customer' => $customer,
        'modules'=>$modules]);
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
        // $video = MediaService::upload($vdata['video']);

        $module = Module::create([
            'name' => $vdata['name'],
            'description' => $vdata['description'],
            'price' => $vdata['price'] ,
            'image' => $image,
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
            Storage::delete($module->image);
            $image_url = MediaService::upload($vdata['image']);
            $module->image = $image_url;
        }
        if (isset($vdata['video'])){
            Storage::delete($module->video);
            $video_url = MediaService::upload($vdata['video']);
            $module->video = $video_url;
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
        if (!empty($module->image) || !empty($module->video) ){
            $filePathImage = explode('/storage', $module->image);
            $filePathVideo = explode('/storage', $module->video);

            $pathImage = '/public' . $filePathImage[1];
            $pathVideo = '/public' . $filePathVideo[1];

            if (!Storage::delete($pathImage) || !Storage::delete($pathVideo)) {
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

    public function checkout()
    {
        $customer = Auth::guard('webcustomers')->user();
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $modules = Module::all();
        $lineItems = [];
        $totalPrice = 0;
        foreach ($modules as $module) {
            $totalPrice += $module->price;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $module->name,
                        'images' => [$module->image]
                    ],
                    'unit_amount' => $module->price * 100,
                ],
                'quantity' => 1,
            ];
        }
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('modules.checkout-success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('modules.checkout-cancel', [], true),
        ]);

        $purchase = new Purchase();
        $purchase->status = 'unpaid';
        $purchase->total_price = $totalPrice;
        $purchase->session_id = $session->id;
        $purchase->customer_id = $customer->id;
        // if((!empty($customer))){
        //     $purchase->customer_id = $session->customer->id;
        // }
        
        $purchase->save();

        return redirect($session->url);
    }

    public function success(Request $request)
    {

        $customer = Auth::guard('webcustomers')->user();
        $purchases = Purchase::where('customer_id', $customer->id)->get();
        // return view('modules.checkout-success', compact('customer'));
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        // try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException();
            }
            $customer = Auth::guard('webcustomers')->user();

            // $customer = \Stripe\Customer::retrieve($session->customer);

            $order = Purchase::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }

            return view('modules.checkout-success')->with(['customer'=> $customer, 'purchases' => $purchases, 'order' => $order]);
        // } catch (\Exception $e) {
        //     throw new NotFoundHttpException();
        // }

    }

    public function cancel()
    {
        $customer = Auth::guard('webcustomers')->user();
        return view('modules.checkout-cancel', compact('customer'));
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