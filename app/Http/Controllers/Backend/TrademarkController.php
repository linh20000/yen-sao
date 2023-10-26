<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Trademark\TrademarkInterface;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    private $trademarkRepository;
    public function __construct(TrademarkInterface $trademarkRepository) {
        $this->trademarkRepository = $trademarkRepository;
    } 

    public  function view_Trademark(){
        $trademark = $this->trademarkRepository->getPaginate(6);
        $dataLength = count($this->trademarkRepository->getAll());
        return view('backend.trademark.list', ['title'=>'Danh sách thương hiệu'], compact('trademark', 'dataLength'));
    }

    public function createTrademark() {
        return view('backend.trademark.create', ['title'=>'Thêm thương hiệu']);
    }

    public function post(Request $request){
        $request->validate([
            'link'=>'required',
            'images'=>'required',
        ],[
            'link.required'=>'Vui lòng nhập tiêu đề',
            'images.required' => 'Vui lòng chọn ảnh',
        ]);
        $data = $request->all();
        $this->trademarkRepository->create($data);
        return back()->with('success', 'Thêm thành công thương hiệu');
    } 

    public function get_update_Trademark($id){
        $trademark = $this->trademarkRepository->find($id);
        return view('backend.trademark.update',['title'=>'Chỉnh sửa trademark'], compact('trademark'));
    }

    public function update_Trademark($id, Request $request){
        $request->validate([
            'link'=>'required',
            'images'=>'required',
        ], [
            'link.required'=>'Vui lòng nhập tiêu đề',
            'images.required' => 'Vui lòng chọn ảnh',
        ]);
        $data = $request->all();
        // dd($data);
        $this->trademarkRepository->update($id, $data);
        return redirect(route('admin.Trademark'))->with('success', 'Chỉnh sửa banner thành công');
    }

    public function deleteTrademark($id){
        $this->trademarkRepository->delete($id);
        return back()->with('success', 'Xóa thành công banner');
    }
}
