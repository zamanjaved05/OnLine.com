<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Cart;
use App\Models\Cosmetic;
use App\Models\Product;
use App\Models\Product1;
use App\Models\Shoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Stripe\Charge;

class CartController extends Controller
{

    public function layout()
    {
        $cartItems = \Cart::getContent();
        return view('layout.layout',compact('cartItems'));
    }
    public function productList()
    {
        $shoes=Shoes::all();
        $cartItems = \Cart::getContent();
        $cosmetics=Cosmetic::all();
        $bags=Bag::all();
        $products = Product::all();
        $products1 = Product1::all();
        return view('content.products', compact('products',
            'products1','cartItems','bags','cosmetics','shoes'));
    }

    public function cartList()
    {

        $cartItems = \Cart::getContent();
         //dd($cartItems);
        return view('content.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return Redirect::back();
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }
    public function updateCartt(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->back();
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }


    public function checkout(Request $request)
    {

        $cartItems = \Cart::getContent();
        $product=Product::all();
        return view('content.checkout',compact('product','cartItems'));

    }
    public function checkoutstore(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51J7ZcUEmlMSPD9MKO5Al77O8IjzkeydlIVGIwCQjNkucHogihaghHVsrwRAn8JmCREPrQhplXM55IXlKIPTPvmar005tEVublJ');
        $email=$request->email;
        //$stripeDescription = '';
        $stripePlanId = $request->price;
        $cNumber =$request->cnumber;
        $cExpiryMonth = $request->ExpiryMonth;
        $cExpiryYear =$request->ExpiryYear;
        $cCvc = $request->cvc;
        $cName = $request->name;
        $cAddress_line1 = $request->address;
        $cAddress_line2 = '';
        $cAddress_city = $request->city;
        $cAddress_zip = $request->zip;
        $cAddress_state = $request->state;
        $cAddress_country = $request->country;
        //$metadata = $request->metadeta;
        $cardArray = array(
            "number" => $cNumber,
            "exp_month" => (int)$cExpiryMonth,
            "exp_year" => (int)$cExpiryYear,
            "cvc" => (int)$cCvc,
            "name" => $cName,
            "address_line1" => $cAddress_line1,
            "address_city" => $cAddress_city,
            "address_zip" => $cAddress_zip,
            "address_state" => $cAddress_state,
            "address_country" => $cAddress_country,
        );

        if($cAddress_line2 != ''){
            $cardArray['address_line2'] = $cAddress_line2;
        }
        try {
            $token = \Stripe\Token::create(array(
                "card" => $cardArray
            ));


            $stripeDescription =$request->description;
            $responce = \Stripe\Customer::create(array(
                "name" => $cName,
                "email" => $email,
                "plan" => $stripePlanId,
                "description" => $stripeDescription,
                // "metadata" => $metadata,
                "source" => $token
            ));

            $stripeCustomerId = $responce->id;
            $default_source = $responce->default_source;
            $charge = Charge::create([
                'amount' => $request->totalamount*100,
                'currency' => 'usd',
                'customer' => $stripeCustomerId,
                "description" => $stripeDescription,
                'source' => $default_source,

            ]);


            $responce = [
                'error' => false,
                'data' => $responce,
                'message'  => ''
            ];
        } catch (\Exception $e) {
            error_log('Create Card Error: '.$e->getMessage());
            error_log('Card Details: '.json_encode($cardArray));
            $responce = [
                'error'  => true,
                'data' => [],
                'message'  => $e->getMessage()
            ];
        }
        // return $responce;
        return redirect()->to('cart');
    }

    public function productDetail($id)
    {
        $cartItems = \Cart::getContent();
        $product=Product::find($id);
        $cosmetic=Cosmetic::find($id);
        $bag=Bag::find($id);
        return view('content.productDetail',compact('product','cosmetic',
            'cartItems','bag'));


    }
    public function cosmetic_detail($id)
    {
        $cartItems = \Cart::getContent();
        $product=Cosmetic::find($id);
        return view('detail_page.cosmetic',compact('product','cartItems'));
    }
    public function bag_detail($id)
    {
        $cartItems = \Cart::getContent();
        $product = Bag::find($id);
        return view('detail_page.bags',compact('product','cartItems'));
    }
    public function products1_detail($id)
    {
        $cartItems = \Cart::getContent();
        $product = Product1::find($id);
        return view('detail_page.products1',compact('product','cartItems'));
    }
    public function shoes_detail($id)
    {
        $cartItems = \Cart::getContent();
        $shoes = Shoes::find($id);
        return view('detail_page.shoes',compact('shoes','cartItems'));
    }

}
