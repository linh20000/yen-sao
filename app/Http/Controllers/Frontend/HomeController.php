<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Introduce;
use App\Models\RegisterNews;
use App\Repositories\Banner\BannerInterface;
use App\Repositories\Blog\BlogInterface;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Trademark\TrademarkInterface;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $bannerRepository, $trademarkRepository, $blogRepository, $productRepository;
    public function __construct(
        BannerInterface $bannerRepository,
        BlogInterface $blogRepository,
        TrademarkInterface $trademarkRepository,
        ProductInterface $productRepository

    ) {
        $this->bannerRepository = $bannerRepository;
        $this->trademarkRepository = $trademarkRepository;
        $this->blogRepository = $blogRepository;
        $this->productRepository = $productRepository;
    }

    public function home()
    {
        $banner = $this->bannerRepository->getAll();
        $trademark = $this->trademarkRepository->getAll();
        $blog = $this->blogRepository->getAll();
        $product_hot = $this->productRepository->getProductsHot();
        $product_rau = $this->productRepository->getWith('rau cu')->take(8)->get();
        $product_hoaqua = $this->productRepository->getWith('hoa qua')->take(8)->get();
        $product_haisan = $this->productRepository->getWith('hai san')->take(8)->get();
        $product_cacloaihat = $this->productRepository->getWith('cac loai hat')->take(8)->get();
        $product_tuoisong = $this->productRepository->getWith('thuc pham tuoi song')->take(8)->get();

        return view('frontend.home.index', compact(
            'banner',
            'trademark',
            'blog',
            'product_hot',
            'product_rau',
            'product_hoaqua',
            'product_haisan',
            'product_cacloaihat',
            'product_tuoisong'
        ));
    }

    public function showAllProduct(Request $request)
    {
        $products = $this->productRepository->filter();
        if ($request->salePrice) {
            $product = $products->orderBy('salePrice', $request->salePrice == 'desc' ? 'DESC' : 'ASC');
        }
        if ($request->name) {
            $product = $products->orderBy('name', $request->name == 'desc' ? 'DESC' : 'ASC');
        }
        if ($request->created_at) {
            $product = $products->orderBy('created_at', $request->created_at == 'desc' ? 'DESC' : 'ASC');
        }
        $product = $products->paginate(12);
        return view('frontend.product.index', compact('product'));
    }

    public function showAllProductWith($name, Request $request)
    {
        $products = $this->productRepository->getWith($name);
        if ($request->salePrice) {
            $product = $products->orderBy('salePrice', $request->salePrice == 'desc' ? 'DESC' : 'ASC');
        }
        if ($request->name) {
            $product = $products->orderBy('name', $request->name == 'desc' ? 'DESC' : 'ASC');
        }
        if ($request->created_at) {
            $product = $products->orderBy('created_at', $request->created_at == 'desc' ? 'DESC' : 'ASC');
        }
        $product = $products->paginate(12);
        // dd($name);
        return view('frontend.product.index_with', compact('product', 'name'));
    }

    public function productDetail($id, $slug)
    {
        $product_detail = $this->productRepository->find($id);
        $products = $this->productRepository->getWith($product_detail->category_id);
        $product = $products->take(8)->get();
        // dd($product);
        // $product_hot = $this->productRepository->getProductsHot();
        return view('frontend.product_details.index', compact('product_detail', 'product'));
    }


    public function filterAjax(Request $request)
    {
        $salePrice = $request->prices;
        $minPrice = null;
        $maxPrice = null;
        if ($salePrice) {
            foreach ($salePrice as $price) {
                $range = explode('-', $price);
                if (count($range) == 2) {
                    $min = (int) str_replace('.', '', $range[0]);
                    $max = (int) str_replace('.', '', $range[1]);
                    if ($minPrice === null || $min < $minPrice) {
                        $minPrice = $min;
                    }
                    if ($maxPrice === null || $max > $maxPrice) {
                        $maxPrice = $max;
                    }
                }
            }
        }
        $product = $this->productRepository->filter();
        if ($salePrice) $product = $product->whereBetween('salePrice', [$minPrice, $maxPrice]);
        if (!$salePrice) $product = $product->where('status', '=', 1);
        $product = $product->paginate(12);
        $data =  view('frontend.product.product_list', compact('product'))->render();
        return response()->json(['data' => $data]);
    }


    public function aboutUs()
    {
        $aboutUs = Introduce::find(1);
        return view('frontend.about_us.index', compact('aboutUs'));
    }


    public function Contact()
    {
        return view('frontend.contact.index');
    }

    public function addContact(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|min:10|max:10|',
                'comment' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập họ tên !',
                'email.required' => 'Nhập email !',
                'email.email' => 'Nhập email hợp lệ! (***@***)',
                'phone' => 'Nhập số điện thoại',
                'phone.min' => 'Vui lòng nhập đúng số điện thoại !',
                'phone.max' => 'Vui lòng nhập đúng số điện thoại !',
                'comment.required' => 'Nhập bình luận !',
            ]
        );
        $data = $request->all();
        // dd($data);
        Contact::create($data);
        return response()->json(['success' => 'Cảm ơn bạn đã gửi phản hồi!']);
    }


    public function sendEmail(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $request->validate([
            'email' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
        ]);
        RegisterNews::create($data);
        return response()->json(['success' => 'Cảm ơn bạn đã đăng ký theo dõi!']);
    }


    public function blog()
    {
        $blog_list = $this->blogRepository->getPaginate(2);
        return view('frontend.blog.index',compact('blog_list')
        );
    }

    public function blog_details($id, $slug)
    {
        $blog_detail = Blog::find($id);
        $blog_to = $this->blogRepository->getNewBlog(5);
        return view('frontend.blog.blog_details',compact('blog_detail', 'blog_to')
        );
    }

    public function search(Request $request)
    {
        $product = $this->productRepository->search($request);
        return view('frontend.product.index', compact('product'));
        
    }

    // public function filterAjax(Request $request){
    //     $salePrice = $request->prices;
    //     $minPrice = null;
    //     $maxPrice = null;
    //     if ($salePrice) {
    //         foreach ($salePrice as $price) {
    //             $range = explode('-', $price);
    //             if (count($range) == 2) {
    //                 $min = (int) str_replace('.', '', $range[0]);
    //                 $max = (int) str_replace('.', '', $range[1]);
    //                 if ($minPrice === null || $min < $minPrice) {
    //                     $minPrice = $min;
    //                 }
    //                 if ($maxPrice === null || $max > $maxPrice) {
    //                     $maxPrice = $max;
    //                 }
    //             }
    //         }
    //     } 
    //     $product = $this->productRepository->filter();  
    //     if($salePrice) $product = $product->whereBetween('salePrice', [$minPrice, $maxPrice]);
    //     if(!$salePrice) $product = $product->where('status','=',1);
    //     $product_paginate =  $product->paginate(12);
    //     $data =  view('frontend.product.list',compact('product_paginate'))->render();
    //     return response()->json(['data'=>$data]);
    // }
}
