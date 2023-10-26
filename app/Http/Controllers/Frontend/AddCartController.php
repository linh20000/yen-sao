<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderInterface;
use App\Repositories\Product\ProductInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AddCartController extends Controller
{
    private $productRepository, $orderRepository;
    public function __construct(ProductInterface $productRepository, OrderInterface $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function addcart(Request $request)
    {
        $product = $this->productRepository->find($request->productId);
        // dd($product);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->salePrice,
            'qty' => (int)$request['qty'],
            'weight' => $product->status,
            'options' => [
                'images' => $product->images,
                'code' => $product->code,
                'discount' => $product->percent_discount,
                'price' => $product->salePrice,
            ]
        ]);
        return response()->json(['success' => 'Thêm vào giỏ hàng thành công', 'qty' => Cart::count()]);
    }

    public function addCartajax(Request $request)
    {
        // dd($request);
        $product = $this->productRepository->find($request->productId);

        // dd($product);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->salePrice,
            'qty' => 1,
            'weight' => $product->status,
            'options' => [
                'images' => $product->images,
                'code' => $product->code,
                'discount' => $product->percent_discount,
                'price' => $product->salePrice,
            ]
        ]);
        return response()->json(['success' => 'Thêm vào giỏ hàng thành công', 'qty' => Cart::count()]);
    }

    public function showCartList()
    {
        $productCarts = Cart::content();
        return view('frontend.shopping_cart.index', compact('productCarts'));
    }

    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Xóa sản phẩm thành công ');
    }

    public function pay(){
        $payCart = Cart::content();
        // dd($payCart);
        return view('frontend.pay.index',compact('payCart'));
    }

    public function sendOrder(Request $request){
        $data = $request->all();
        $request->validate([
            'name'=>'required',
            'phoneNumber'=>'required|min:10|max:10|',
            'email'=>'required|email',
            'province'=>'required',
            'district'=>'required',
            'address'=>'required',
        ],[
            'name.required'=>'Vui lòng nhập đầy đủ họ tên !',
            'phoneNumber.required'=>'Vui lòng nhập số điện thoại !',
            'phoneNumber.min'=>'Vui lòng nhập đúng số điện thoại !',
            'phoneNumber.max'=>'Vui lòng nhập đúng số điện thoại !',
            'email.required'=>'Vui lòng nhập email',
            'province.required'=>'Vui lòng nhập tỉnh !',
            'district.required'=>'Vui lòng nhập huyện !',
            'address.required'=>'Vui lòng nhập địa chỉ cụ thể !',
        ]);
        // dd($data);
        $data['total'] = $data['total'];
        $data['qty'] = (int)$data['qty'];
        $this->orderRepository->create($data);
        Cart::destroy();
        return back()->with('success', 'Bạn đã đặt hàng thành công');
    }

}
