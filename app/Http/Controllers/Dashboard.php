<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\productDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;


class Dashboard extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function test(){
        // $data=DB::select('select * from products');
        $data=DB::table('products')->get();
        return Response::json($data);
    }

    public function index(Request $request){ 
        Session::put('data','Welcome to tuwaiq');
        Cookie::queue('A','here my cookies','60');
        $user=$request->User()->name;
        return view('dashboard/index');
    }

    public function del($id){

        $products=Product::where('id',$id);  
        $products->delete(); 
        return Redirect('dashboard/products');
    }

    public function edit($id){
        $products=Product::find($id);  
        return view('dashboard/edit',['products'=>$products]); 
    }
    
    //delete + edit (details)
    public function delDetails($id){

        $Details =productDetails::where('id',$id);  
        $Details->delete(); 
        return Redirect('dashboard/productdet');
    }

    public function editDetails($id){
        $Details =productDetails::find($id);  
        return view('dashboard/edit',['products'=>$products]); 
    }


    //public function search(Request $request){ 
    //   $products=Product::where('productname',$request->name)->get();  
    //  return view('dashboard/products',['products'=>$products]); 
    //}
    

    //get products & search
    public function getproducts(Request $request){  
        if ($request->has('name')) {
            $products = Product::where('productname', $request->name)->get();  
        } else {
            $products = Product::all();
        }
        return view('dashboard.products',['products'=>$products]); 
    }

    public function update(Request $request){ 
        $products=Product::where('id' ,$request->id)->update([
            'productname'=>$request-> productname,

        ]);

        return Redirect('dashboard/products');
    }

    //public function getproducts(){
    //    $products =Product::all();
    //    return view('dashboard.products',['products'=>$products]);
    //}

    public function CreateProduct(Request $request){
        $products =Product::create([
            'productname'=>$request->productname
        ]);
        $products->save();

        return redirect('/dashboard/products');
    }

    public function productDetails(){ //get
        $details = DB::table('product_details')
         ->join('products', 'product_details.productid', '=', 'products.id')
         ->select('product_details.id', 'products.productname', 'product_details.color', 'product_details.price', 'product_details.qty', 'product_details.description','product_details.images')
         ->get();

         $products = DB::table('products')->get();

         return view('dashboard.productDetails', ['details' => $details, 'products' => $products]);
         //$Details =productDetails::all();
        //$products =Product::all();
        //return view('dashboard.productDetails',['details'=>$Details,'products'=>$products]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

    public function CreateProductDetails(Request $request){
        
        $validate= $request->validate([
            'color' => ['required', 'string', 'max:10'],
            'price' => ['required', 'numeric'],
            'qty' => ['required', 'numeric'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        
       
        $Details = productDetails::create([
            'color' => $request->color,
            'price' => $request->price,
            'qty' => $request->qty,
            'description' => $request->description,
            'productid' => $request->product,
        ]);
    
        // Redirect back
        return redirect('/dashboard/productdet');
    }
    

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:10', 'min:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    

}
