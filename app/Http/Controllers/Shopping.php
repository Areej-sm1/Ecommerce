<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\productDetails;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;




class shopping extends Controller
{
    
    public function ShowListitemsPhone(Request $request){
        $data=DB::table('products')
        ->join ('product_details', 'products.id','=','product_details.productid')
        ->get(); 
        $tax=0.15;
        $desc = 10;
        foreach($data as $key=> $row)
        {
        $data[$key]->total=($data[$key]->price*$tax)+$data[$key]->price;
        $data[$key]->desc=$desc;
        $data[$key]->tax=$tax;
        $data[$key]->net=$data[$key]->total - $data[$key]->desc;
        }
        return view(' shopping/list-items', ['data'=>$data]);
    }

    public function ShowDetailsPhone($id){
        $data=DB:: table('products')
        ->join('product_details', 'products.id','=','product_details.productid')
        ->where('products.id','=',$id)
        ->first(); 

        $tax=15/100;
        $descount=10;
        $data->total=($data->price*$tax)+$data->price;
        $data->descount=$descount;
        $data->tax=$tax;
        $data->net=$data->total- $data->descount;  

        return view('shopping/details',['data'=>$data]);
    }

    public function AddToCArt(Request $request,$id){

        $userid=$request->user()->id;
        $data=DB::table('products')
        ->join('product_details', 'products.id','=','product_details.productid')
        ->where('products.id','=',$id)
        ->first(); 

        $tax=15/100;
        $descount=10;
        $data->total=($data->price*$tax)+$data->price;
        $data->descount=$descount;
        $data->tax=$tax;
        $data->net=$data->total- $data->descount;  
        //dd($data);
    $row = [
        'productid'=>$data->id,
        'price'=>$data->price,
        'qty'=>$data->qty,
        'tax'=>$data->tax,
        'total'=>$data->total,
        'desc'=>$data->descount,
        'net'=>$data->net,
        'userid'=>$userid,
    ];

    DB:: table('carts')->insert($row);
    $count=DB:: table('carts')
    ->where('userid','=',$userid)
    ->count();

    Session::put('count', $count);

}

public function getCoffee(){
    $response=HTTP::get('https://api.sampleapis.com/coffee/hot');
    return view('shopping/coffee',['data'=>$response->object()]);
}

public function cart1(Request $request, $id){
    $userid=$request->user()->id;
    $DATA = DB::table('carts')
            ->join('product_details', 'products.id', '=', 'product_details.productid')
            ->join('users', 'users.id', '=', 'carts.userid')
            ->join('products', 'products.id', '=', 'product_details.productid') // Join with the products table
            ->where('carts.userid', $id) // Assuming $id is the current user's ID
            ->get();
    dd($DATA);
    $tax = 0.15;
    $desc = 10;
    $DATA->total=($DATA->price*$tax)+$DATA->price;
    $DATA->descount=$descount;
    $DATA->tax=$tax;
    $DATA->net=$DATA->total- $DATA->descount;  

    return view('shopping/cart', ['DATA' => $DATA]);
}

public function cart2(Request $request, $userid){
    $data = Cart::where('userid', $userid)
                ->get();
    $tax = 0.15;
    $desc = 10;
    
    return view('shopping/cart', ['data' => $data]);
}

public function cart(Request $request, $userid){
    $data = Cart::where('userid', $userid)
                ->join('product_details', 'carts.productid', '=', 'product_details.productid')
                ->join('products', 'carts.productid', '=', 'products.id')
                ->select('carts.*', 'product_details.color', 'products.productname')
                ->get();
                $tax = 0.15*100;

                $totalPrice = $data->sum('price'); 
                $totalNet = $data->sum('net'); 

    return view('shopping/cart', ['data' => $data, 'totalPrice' => $totalPrice,'totalNet' => $totalNet]);
}








}
