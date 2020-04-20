<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Currency;
use App\Models\Category;
use App\Models\Metatag;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        $productsQuery = Product::query();

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->$field(); // вызывает scope Product
            }
        }

        $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());

        $hitProducts = Product::where('hit', 1)->get();

        $categories = Category::where('parent_id', 0)->get();

        $menu_categories = $categories;

        return view('index', compact('products', 'hitProducts', 'categories', 'menu_categories'));
    }

    public function categories()
    {
//        $categories = Category::get();
//        return view('categories', compact('categories'));
        return view('categories', [
            'category' => '',
            'categories' => Category::where('parent_id', 0)->get(),
            'delimeter' => ''
        ]);
    }

    public function subcategories()
    {
//        $categories = Category::get();
//        return view('subcategories', compact('categories'));
//        return view('subcategories', [
//            'parentcategory' => Category::with('parentCategory')->first(),
//            'category' => '',
//            'categories' => Category::with('children')->where('parent_id', 0)->get(),
//            'delimeter' => ''
//        ]);
    }

    public function subcategory($code)
    {
        $category = Category::where('code', $code)->first();
        // для вывода текущей категории
        $breadcrumbCategoryEnd = $category;
        $menu_categories = Category::where('parent_id', 0)->get();
        $parentcategory = Category::with('parentCategory')->where('id', $category->parent_id)->first();
        //проверяю есть ли у текущей страницы категорий родительская категория, если есть то заменяю на родительскую категорию
        if (!empty($parentcategory)) {
            $category = $parentcategory;
        }

        return view('subcategories', [
            'parentcategory' => $parentcategory,
            'category' => $category, //категория, либо родительская категория
//            'subcategory' => $category,
            'menu_categories' => $menu_categories,
            'breadcrumbCategoryEnd' => $breadcrumbCategoryEnd, // текущая категория
            'delimeter' => ''
        ]);
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($category, $productCode = null)
    {
        $product = Product::withTrashed()->byCode($productCode)->firstOrFail();
//        $parentcategory = Category::where('id', $product->category->parent_id)->first();
        $metatag = Metatag::where('product_id', $product->id)->first();

//        dd($product->category->code);
        $delimeter = '';
        $category = Category::where('code', $product->category->code)->first();
        // для вывода текущей категории
        $breadcrumbCategoryEnd = $category;
        $parentcategory = Category::with('parentCategory')->where('id', $product->category->parent_id)->first();
        //проверяю есть ли у текущей страницы категорий родительская категория, если есть то заменяю на родительскую категорию
        if (!empty($parentcategory)) {
            $category = $parentcategory;
        }
        $menu_categories = Category::where('parent_id', 0)->get();
        return view('product', compact('product', 'metatag', 'parentcategory', 'category', 'breadcrumbCategoryEnd', 'menu_categories'));
    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return view('clear');
    }

    public function subscribe(SubscriptionRequest $request, Product $product)
    {
        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id
        ]);

        return redirect()->back()->with('success', 'Спасибо, мы сообщим вам о поступлении товара');
    }

    public function changeLocale($locale)
    {
        $availableLocales = ['ru', 'en'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function changeCurrency($currencyCode)
    {
        $currency = Currency::byCode($currencyCode)->firstOrFail();
        session(['currency' => $currency->code]);
        return redirect()->back();
    }
}
