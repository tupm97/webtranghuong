<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Banner;
use App\Category;
use App\Product;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $banners = Banner::all();
        $categories = Category::orderBy('order','DESC')->get();
        $products =Product::all();
        $recomenderProducts = Product::orderBy(DB::raw('RAND()'))->take(4)->get();
        $sellingProducts = Product::orderBy('price','ASC')->take(4)->get();
		$goodProducts = Product::orderBy('sold','ASC')->take(6)->get();
        $data = array(
            "banners"=>$banners,
            "categories" => $categories,
            "products" => $products,
            "recomenderProducts"=>$recomenderProducts,
            "sellingProducts" =>$sellingProducts,
			"goodProducts"=>$goodProducts
        );
        View::share('data', $data);
        Schema::defaultStringLength(191);
    }
}
