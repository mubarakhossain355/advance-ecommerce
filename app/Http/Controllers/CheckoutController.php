<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use ShoppingCart;

class CheckoutController extends Controller
{
    private $customer,$order,$orderDetail;

    public function index(){
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else{
            $this->customer = '';
        }
        return view('website.checkout.index',['customer' => $this->customer]);
    }

    public function newCashOrder(Request $request){
        // return ShoppingCart::all();
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {   
            $this->validate($request,[
                'name'                  => 'required',
                'email'                 => 'required|unique:customers,email',
                'mobile'                => 'required|unique:customers,mobile',
                'delivery_address'      => 'required',
            ]);
            $this->customer = Customer::newCustomer($request);
            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
        }
       
       

        $this->order = Order::newOrder($request,$this->customer->id);
        OrderDetail::newOrderDetail($this->order->id);

       return redirect('/complete-order')->with('message','Congratulations .... your order post successfully');
    }


    public function completeOrder(){

        return view('website.checkout.complete-order');
    }
}
