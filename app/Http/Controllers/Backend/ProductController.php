<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegisterNews;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Product\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $categoryRepository, $productRepository;
    public function __construct(CategoryInterface $categoryRepository, ProductInterface $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function showProductList()
    {
        $productLength = count($this->productRepository->getAll());
        $product = $this->productRepository->getPaginate(8);
        // dd($product);
        return view('backend.product.list', ['breadcrumb' => 'Danh sách sản phẩm'], compact('product', 'productLength'));
    }

    public function createProduct()
    {
        $category_id = $this->categoryRepository->getCategoryId();
        return view('backend.product.create', ['breadcrumb' => 'Thêm sản phẩm'], compact('category_id'));
    }

    public function post(Request $request)
    {
        $request['images'] =  JSON_encode($request['images']);
        $data = $request->all();
        // dd($data);
        $validate = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'qty' => 'required',
            'oldPrice' => 'required|numeric',
            'percent_discount' => 'required|numeric|max:100|min:0',
            'salePrice' => 'required',
            'images' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên sản phẩm!',
            'code.required' => 'Bạn chưa nhập mã sản phẩm!',
            'qty.required' => 'Bạn chưa nhập số lượng!',
            'oldPrice.required' => 'Bạn chưa nhập giá gốc sản phẩm!',
            'oldPrice.numeric' => 'Vui lòng kiểm tra lại giá gốc!',
            'images.required' => 'Vui lòng nhập ảnh!',
            'percent_discount.numeric' => 'Vui lòng kiểm tra lại phần trăm giảm giá!',
            'percent_discount.max' => 'Vui lòng kiểm tra lại phần trăm giảm giá (<=100)!',
            'category_id.required' => 'Vui lòng chọn danh mục!',
            'description.required' => 'Vui lòng nhập mô tả',
            'seo_title.required' => 'Vui lòng nhập tiêu đề tìm kiếm',
            'seo_keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm',
            'seo_description.required' => 'Vui lòng nhập miêu tả tìm kiếm',
        ]);

        $this->productRepository->create($data);
        return back()->with('success', 'Thêm thành công sản phẩm !');
    }

    public function getUpdateProduct($id)
    {
        $category_id = $this->categoryRepository->getCategoryId();
        $product = $this->productRepository->find($id);
        return view('backend.product.update', ['breadcrumb' => 'Chỉnh sửa sản phẩm'], compact('product', 'category_id'));
    }

    public function updateProduct($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'qty' => 'required',
            'oldPrice' => 'required|numeric',
            'percent_discount' => 'required|numeric|max:100|min:0',
            'salePrice' => 'required',
            'images' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên sản phẩm!',
            'code.required' => 'Bạn chưa nhập mã sản phẩm!',
            'qty.required' => 'Bạn chưa nhập số lượng!',
            'oldPrice.required' => 'Bạn chưa nhập giá gốc sản phẩm!',
            'oldPrice.numeric' => 'Vui lòng kiểm tra lại giá gốc!',
            'images.required' => 'Vui lòng nhập ảnh!',
            'percent_discount.numeric' => 'Vui lòng kiểm tra lại phần trăm giảm giá!',
            'percent_discount.max' => 'Vui lòng kiểm tra lại phần trăm giảm giá (<=100)!',
            'category_id.required' => 'Vui lòng chọn danh mục!',
            'description.required' => 'Vui lòng nhập mô tả',
            'seo_title.required' => 'Vui lòng nhập tiêu đề tìm kiếm',
            'seo_keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm',
            'seo_description.required' => 'Vui lòng nhập miêu tả tìm kiếm',
        ]);
        $data = $request->all();
        // dd($data);
        $this->productRepository->update($id, $data);
        return redirect(route('admin.showProductList'))->with('success', 'Chỉnh sửa thành công');
    }

    public function deleteProduct($id)
    {
        $this->productRepository->delete($id);
        return back()->with('success', 'Xóa sản phẩm thành công');
    }

    public function search(Request $request)
    {
        $product = $this->productRepository->search($request);
        $productLength = count($product);
        return view('backend.product.list', ['breadcrumb' => 'Danh sách sản phẩm'], compact('product', 'productLength'));
    }

    public function showEmail(){
        $data = RegisterNews::orderBy('created_at' , 'ASC')->paginate(10);
        $emailCount = count($data);
        return view('backend.register_news.list', ['breadcrumb'=>'Danh sách email'], compact('data', 'emailCount'));
    }
    public function deleteEmail($id) {
        $data = RegisterNews::find($id);
        $data->delete();
        return redirect(route('showEmail'))->with('mess', 'Đã xóa email');
    }
}
