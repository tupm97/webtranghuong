<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Mail;
use App\Mail\OrderShip;
use Session;
use App\Bill;
use App\BillDetail;
use App\Category;
class ProductController extends Controller
{
    public function viewProduct($id){
        $product = Product::findorFail($id);
        if($product){
            $product->increment('views');
            return view('shop.productdetail',compact('product'));
        }
    }
    public function checkOut(){
        return view('shop.checkout');
    }
    public function sendMail(Request $request){
        $data=Session::get('cart');
        $custom = $request->all(); 
        //dd($data);       
        Mail::to('tranghuongbuilding@gmail.com')->send(new OrderShip($data,$custom));
        if (Mail::failures()) {
            return redirect()->back()->with('fail','Không đặt được hàng');
        }else{
            
            $bill = new Bill;
            $bill->customer = $custom['customname'];
            $bill->phone = $custom['customphone'];
            $bill->address= $custom['customaddress'];
            $bill->mail = $custom['custommail'];
            $bill->status = "WAIT";
            $bill->save();
            foreach ($data as $id=>$detail) {
                $billDetail = new BillDetail;
                $billDetail->bill_id = $bill->id;
                $billDetail->product_id = $id;
                $billDetail->quantity = $detail['quantity'];
                $billDetail->price = $detail['price'];
                Product::find($id)->increment('sold');
                $billDetail->save();
            }
			if($data){
                foreach($data as $id=> $deleteProduct){
                    $cart = session()->get('cart');
                    if(isset($cart[$id])) {

                        unset($cart[$id]);

                        session()->put('cart', $cart);
                    }
                }
            }
            return redirect()->back()->with('success','Đặt hàng thành công');
         }
        
    }
    public function index(){
        $products = Product::all();

        return view('shop.allproducts', compact('products'));
    }
    public function filterProduct($id){
		
        $products = Product::where('category_id',$id)->get();
		if(count($products)==0){
			$categories = Category::where('parent_id',$id)->get();
			//dd($categories);
			foreach( $categories as $category){
				$sub = Product::where('category_id',$category->id)->get();
				$products = $products->union($sub);
			}
			//$products = Product::where($category->id,$id)->get();
			
			return view('shop.filterproduct',compact('products'));
		}
		else
        return view('shop.filterproduct',compact('products'));
    }
    public function filterProductByPrice(Request $request){
        $products = Product::where('price','<',$request->inputRange*10000)->get();
       
        return view('shop.filterproduct',compact('products'));
    }
    public function search(Request $request){
        $products = Product::where('name', 'LIKE', "%{$request->search}%") 
        ->orWhere('price', 'LIKE', "%{$request->search}%") 
        ->get();
        
        return view('shop.filterproduct',compact('products'));
    }
    public function cart()
    {
        return view('shop.cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price- $product->price*$product->sale/100,
                        "image" => $product->image,
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Đã Thêm Sản Phẩm Vào Giỏ Hàng!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Đã Thêm Sản Phẩm Vào Giỏ Hàng!!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price- $product->price*$product->sale/100,
            "image" =>  $product->image,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã Thêm Sản Phẩm Vào Giỏ Hàng!!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Đã Cập Nhật Giỏ Hàng');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Đã Xóa Khỏi Giỏ Hàng');
        }
    }
}
