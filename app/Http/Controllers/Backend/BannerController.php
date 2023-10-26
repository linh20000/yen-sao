<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Banner\BannerInterface;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $bannerRepository;
    public function __construct(BannerInterface $bannerRepository) {
        $this->bannerRepository = $bannerRepository;
    } 

    public  function view_Banner(){
        $banner = $this->bannerRepository->getPaginate(5);
        $dataLength = count($this->bannerRepository->getAll());
        return view('backend.banner.list', ['title'=>'Danh sách banner'], compact('banner', 'dataLength'));
    }

    public function createBanner() {
        return view('backend.banner.create', ['title'=>'Thêm banner']);
    }

    public function post(Request $request){
        $sort = $request->sort;
        $banner = $this->bannerRepository->getSort($sort);
        if(!$banner->isEmpty()){
            return back()->with('error', 'Số thứ tự đã tồn tại !!!');
        };

        $request->validate([
            'name'=>'required',
            'images'=>'required',
            'sort'  => 'required',
        ],[
            'name.required'=>'Vui lòng nhập tiêu đề',
            'images.required' => 'Vui lòng chọn ảnh',
            'sort.required' => 'Nhập số thứ tự (là số nguyên dương) !!!',
        ]);
        $data = $request->all();
        $this->bannerRepository->create($data);
        return back()->with('success', 'Thêm thành công banner');
    } 

    public function get_update_Banner($id){
        $banner = $this->bannerRepository->find($id);
        return view('backend.banner.update',['title'=>'Chỉnh sửa banner'], compact('banner'));
    }

    public function update_Banner($id, Request $request){
        $sort = $request->sort;
        $banner = $this->bannerRepository->getSort($sort);
        if(!$banner->isEmpty()){
            return back()->with('error', 'Số thứ tự đã tồn tại !!!');
        }; 
        $request->validate([
            'name'=>'required',
            'images'=>'required',
            'sort'  => 'required',
        ], [
            'name.required'=>'Vui lòng nhập tiêu đề',
            'images.required' => 'Vui lòng chọn ảnh',
            'sort.required' => 'Nhập số thứ tự (là số nguyên dương) !!!',
        ]);
        $data = $request->all();
        // dd($data);
        $this->bannerRepository->update($id, $data);
        return redirect(route('admin.Banner'))->with('success', 'Chỉnh sửa banner thành công');
    }

    public function deleteBanner($id){
        $this->bannerRepository->delete($id);
        return back()->with('success', 'Xóa thành công banner');
    }
}
