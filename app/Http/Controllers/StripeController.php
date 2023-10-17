<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Repositories\CartRepository;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
   
    public function create() 
    {
        $customer = Auth::guard('webcustomers')->user();
        \Stripe\Stripe::setApiKey(env('STRIPE_TEST_SECRET_KEY'));

        $cartContents = (new CartRepository())->content();
       
        $lineItems = [];
        $totalPrice = 0;
        foreach ($cartContents as $cartContent) {
            $totalPrice += $cartContent->associatedModel->price;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $cartContent->associatedModel->name,
                        'images' => [$cartContent->associatedModel->image]
                    ],
                    'unit_amount' => $cartContent->associatedModel->price * 100,
                ],
                'quantity' => 1,
            ];
        }
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('stripe.checkout-success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('stripe.checkout-cancel', [], true),
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
        // return view ('stripe.checkout');
    }

    public function success(Request $request) 
    {
        (new CartRepository())->clear();
        $customer = Auth::guard('webcustomers')->user();
        $purchases = Purchase::where('customer_id', $customer->id)->orderBy('created_at', 'DESC')->get();
        // return view('modules.checkout-success', compact('customer'));
        \Stripe\Stripe::setApiKey(env('STRIPE_TEST_SECRET_KEY'));
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

            return view('stripe.checkout-success')->with(['customer'=> $customer, 'purchases' => $purchases, 'order' => $order]);
        // } catch (\Exception $e) {
        //     throw new NotFoundHttpException();
        // }
    }

    public function cancel() 
    {
        $customer = Auth::guard('webcustomers')->user();
        $purchases = Purchase::where('customer_id', $customer->id)->orderBy('created_at', 'DESC')->get();

        $order = Purchase::latest()->first();
        

            return view('stripe.checkout-cancel')->with(['customer'=> $customer, 'purchases' => $purchases, 'order' => $order]);
        // } catch (\Exception $e) {
        //     throw new NotFoundHttpException();
        // }
    }

//     public function paymentIntent()
//     {
//         \Stripe\Stripe::setApiKey(config('stripe.test_secret_key'));

//         $cartTotal = (new CartRepository())->total();

// header('Content-Type: application/json');

// try {
//     // retrieve JSON from POST body
//     $jsonStr = file_get_contents('php://input');
//     $jsonObj = json_decode($jsonStr);

//     // Create a PaymentIntent with amount and currency
//     $paymentIntent = \Stripe\PaymentIntent::create([
//         'amount' => $cartTotal,
//         'currency' => 'eur',
//         'automatic_payment_methods' => [
//             'enabled' => true,
//         ],
//         'metadata' => [
//             'order_items' => (new CartRepository())->jsonOrderItems()
//         ]
//     ]);

//     $output = [
//         'clientSecret' => $paymentIntent->client_secret,
//     ];

//     echo json_encode($output);
// } catch (Error $e) {
//     http_response_code(500);
//     echo json_encode(['error' => $e->getMessage()]);
// }
//     }
}
