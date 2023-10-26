<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Introduce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IntroduceController extends Controller
{
    // function getUpdateIntroduce() {
    //     $datas = DB::select('SELECT * from introduces WHERE id = ?', [1]);
    //     return view('backend.introduce.update',['breadcrumb'=>'Chỉnh sửa giới thiệu'], compact('datas'));
    // }
    // function updateIntroduce(Request $request) {
    //     $request->validate([
    //         'name'=>'required|max:2000',
    //         'seo_title'=>'required|max:2000',
    //         'description'=>'required',
    //     ],
    //     [
    //         'name.required'=>'vui lòng nhập tên ',
    //         'seo_title.required'=>'vui lòng nhập tiêu đề',
    //         'description.required'=>'vui lòng nhập nội dung',
    //     ]
    //     );
    //     // dd($request);
    //     DB::table('Introduces')->update(
    //         [
    //             'name'=>$request['name'],
    //             'thumbnail'=>$request['thumbnail'],
    //             'seo_title'=>$request['seo_title'],
    //             'description'=>$request['description'],
    //         ]
    //     );
    //     return view('backend.introduce.update',['breadcrumb'=>'Chỉnh sửa giới thiệu']);
    // }

    public function getUpdateIntroduce() {
        $data = Introduce::find(1);
        return view('backend.introduce.update',['breadcrumb'=>'Chỉnh sửa thông tin footer']
        , compact('data'));
    }

    public function updateIntroduce(Request $request){
        $datas = Introduce::find(1);
        $data = $request->all();
        $datas->update($data);
        return back()->with('success', 'Chỉnh sửa thành công!!!');
    }
}
