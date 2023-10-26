<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Profile;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Banner\BannerInterface::class,
            \App\Repositories\Banner\BannerRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Category\CategoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Product\ProductInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Blog\BlogInterface::class,
            \App\Repositories\Blog\BlogRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Trademark\TrademarkInterface::class,
            \App\Repositories\Trademark\TrademarkRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderInterface::class,
            \App\Repositories\Order\OrderRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Auth\AuthInterface::class,
            \App\Repositories\Auth\AuthRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with([
                'category' => Category::all(),
                // 'products' => Products::all(),
                'productCart' => Cart::content(),
                'profile'=>Profile::first(),


            ]);
        });


        if (env('REDIRECT_HTTPS')) {
            \URL::forceScheme('https');
        }
    }
}
