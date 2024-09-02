<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\CustomerOrder;
use App\Models\OrderItem;

class PayPalController extends Controller
{
    public function checkout(Request $request)
    {
        $priceArray = explode(' ', $request->price);
        $price = str_replace('$', '', $priceArray[0]);
        $currency = $priceArray[1];
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        // Define the items and calculate the total
        $items = [
            [
                "name" => "Product 1",
                "quantity" => 1,
                "unit_amount" => [
                    "currency_code" => $currency,
                    "value" => $price
                ]
            ]
        ];

        $itemTotal = array_reduce($items, function ($total, $item) {
            return $total + ($item['quantity'] * $item['unit_amount']['value']);
        }, 0);

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => $currency,
                        "value" => $price,
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => $currency,
                                "value" => $price
                            ]
                        ]
                    ],
                    "items" => $items
                ]
            ],
            'application_context' => [
                'return_url' => route('paypal.status'),
                'cancel_url' => route('paypal.cancel'),
            ]
        ]);

       
        $url = '';
        if (isset($order['id'])) {
            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    $url = $link['href'];
                    //return redirect($link['href']);
                }
            }
        }
        //dd($link);
        return response()->json(['link'=> $url]);
        //return redirect()->route('home')->with('error', 'Something went wrong.');
    }

    public function getPaymentStatus(Request $request)
    {

        //dd($request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        // Check if the order already exists in the database
        $orderID = $request->token;
        $existingOrder = CustomerOrder::where('order_id', $orderID)->first();
        
        if ($existingOrder) {
            return redirect()->route('home')->with('error', 'Transaction has already been processed.');
        }
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Save the order details in the database
            $order = new CustomerOrder();
            $order->order_id = $response['id'];
            
             $order->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $order->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $order->status = $response['status'];
            $order->payment_id = $response['id'];
            $order->payer_id = $response['payer']['payer_id'];
            $order->payer_email = $response['payer']['email_address'];
            //dd($response,$order);
            $order->save();

            

            // Save the product details in the database
            // foreach ($response['purchase_units'][0]['items'] as $item) {
            //     $orderItem = new OrderItem();
            //     $orderItem->order_id = $order->id;
            //     $orderItem->product_name = $item['name'];
            //     $orderItem->quantity = $item['quantity'];
            //     $orderItem->price = $item['unit_amount']['value'];
            //     $orderItem->save();
            // }

            return redirect()->route('home')->with('success', 'Transaction complete.');
        }

        return redirect()->route('home')->with('error', 'Transaction failed.');
    }

    public function cancel()
    {
        // Handle the payment cancellation
        return redirect()->route('home')->with('error', 'You have canceled the transaction.');
    }
}
