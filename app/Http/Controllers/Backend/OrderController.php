<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showListOrder() {
        $data = Order::orderBy('created_at', 'DESC')->paginate(10);
        $orderCount = count($data);
        return view('backend.orders.list', ['breadcrumb'=>'Danh sách đơn hàng'], compact('data','orderCount'));
    }

    public function showDetailsOrder($id) {
        $data_details = Order::find($id);
            $decode_product =  json_decode($data_details->product_rowId);
        return view('backend.orders.details_order',['breadcrumb'=>'Chi tiết đơn hàng'], compact('data_details','decode_product'));
    }

    public function updateStatus($id, Request $request){
        $status_order = Order::find($id);
        $updateStatus =  $status_order['status'] = $request->status;
        // DB::table('products')->where('id', $id)->update(['value' => $request->value"]);
        Order::where('id', $id)->update(['status'=>$updateStatus]);
        return redirect(route('showListOrder'))->with('messes', 'Cập nhật trạng thái thành công');
    }

    public function deleteOrder($id) {
        $order = Order::find($id);
        $order->delete();
        return redirect(route('showListOrder'))->with('messes', 'Xóa đơn hàng thành công');
    }
}
