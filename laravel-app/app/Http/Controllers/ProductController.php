<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; // For Query Builder
use Carbon\Carbon; // For DateTime

class ProductController extends Controller
{
    public function productCreate(Request $request)
    {
        $validated = Validator::make($request->all(),
          [
            'prod_name' => 'required|min:8',
            'prod_cate' => 'required',
            'prod_price' => 'required',
            'prod_amount' => 'required',
            'prod_supp' => 'required',
          ],
          [
            'prod_name.required' => 'Product name is required.',
            'prod_name.min' => 'Product name must be at least 8 characters.',
            'prod_cate.required' => 'Product category is required.',
            'prod_price.required' => 'Product price is required.',
            'prod_amount.required' => 'Product amount is required.',
            'prod_supp.required' => 'Product supplier is required.',
          ]
        );

        if ($validated->fails()) {
            return redirect('/product_create_form')
                ->withErrors($validated)
                ->withInput();
        }

        if ($validated && $request->isMethod('post')) {
            $pdName = $request->input('prod_name');
            $pdDesc = $request->input('prod_desc');
            $pdCate = $request->input('prod_cate');
            $pdPrice = $request->input('prod_price');
            $pdAmount = $request->input('prod_amount');
            $pdStatus = $request->input('prod_status');
            $pdAddBy = $request->session()->get('keyUserId');
            $pdSupp = $request->input('prod_supp');

            $item = [
                "prod_name" => $pdName,
                "prod_desc" => $pdDesc,
                "prod_cate" => $pdCate,
                "prod_price" => $pdPrice,
                "prod_amount" => $pdAmount,
                "prod_balance" => $pdAmount,
                "prod_status" => $pdStatus,
                "user_added" => $pdAddBy,
                "prod_supplier" => $pdSupp,
                "date_added" => Carbon::now()->toDateTimeString()
            ];

            DB::table('products')->insert($item);

            return redirect('/products');
        } else {
            return redirect('/error.perm_denied');
        }
        
    }

    public function productUpdate(Request $request){
        $validated = Validator::make($request->all(),
          [
            'prod_name' => 'required|min:8',
            'prod_cate' => 'required',
            'prod_price' => 'required',
            'prod_amount' => 'required',
            'prod_supp' => 'required',
          ],
          [
            'prod_name.required' => 'Product name is required.',
            'prod_name.min' => 'Product name must be at least 8 characters.',
            'prod_cate.required' => 'Product category is required.',
            'prod_price.required' => 'Product price is required.',
            'prod_amount.required' => 'Product amount is required.',
            'prod_supp.required' => 'Product supplier is required.',
          ]
        );

        if ($validated->fails()) {
            return redirect('/product_create_form')
                ->withErrors($validated)
                ->withInput();
        }

        if ($validated && $request->isMethod('post')) {
            $pdId = $request->input('prod_id');
            $pdName = $request->input('prod_name');
            $pdDesc = $request->input('prod_desc');
            $pdCate = $request->input('prod_cate');
            $pdPrice = $request->input('prod_price');
            $pdAmount = $request->input('prod_amount');
            $pdStatus = $request->input('prod_status');
            $pdAddBy = $request->session()->get('keyUserId');
            $pdSupp = $request->input('prod_supp');

            $item = [
                "prod_name" => $pdName,
                "prod_desc" => $pdDesc,
                "prod_cate" => $pdCate,
                "prod_price" => $pdPrice,
                "prod_amount" => $pdAmount,
                "prod_balance" => $pdAmount,
                "prod_status" => $pdStatus,
                "user_added" => $pdAddBy,
                "prod_supplier" => $pdSupp
            ];

            DB::table('products')
                ->where('prod_id', $pdId)
                ->update($item);

            return redirect('/products');
        } else {
            return redirect('/error.perm_denied');
        }
    }

    public function productCreateForm(Request $request): View
    {
        if ($request->session()->has('keyLoggedin')) {
            return view('products.create');
        } else {
            return view('errors.perm_denied');
        }
    }

    public function productUpdateForm(Request $request, string $id): View
    {
        if ($request->session()->has('keyLoggedin')) {
            $prod = DB::table('products')->where('prod_id', $id)->first();
            // print_r($prod); die;
            return view('products.update', [
                'prod' => $prod
            ]);
        } else {
            return view('errors.perm_denied');
        }
    }

    public function productDelete(Request $request, string $id)
    {
        if ($request->session()->has('keyLoggedin')) {
            DB::table('products')->where('prod_id', $id)->delete();
            return redirect('/products');
        } else {
            return view('errors.perm_denied');
        }
    }

    public function getProducts(string $id=''): View
    {
        // $products = [
        //     (object)[ "name" => "xxx" ]
        // ];
        // return view('products.getproducts', [
        //     'products' => $products
        // ]);
        if(!empty($id)){
            $prod = DB::table('products')
                ->join('category', 'products.prod_cate', '=', 'category.cate_id')
                ->join('supplier', 'products.prod_supplier', '=', 'supplier.supp_id')
                ->where('products.prod_id', $id)
                ->select('products.*', 'category.cate_name', 'supplier.supp_name')
                ->first();
            // print_r($prod);
            // die;
            return view('products.products', [
                'prod' => $prod
            ]);
        }else{
            $prods_row = DB::table('products')->count();
            $prods = DB::table('products')
                ->join('category', 'products.prod_cate', '=', 'category.cate_id')
                ->select('products.*', 'category.cate_name')
                ->simplePaginate(10);
            return view('products.getproducts', [
                'prods' => $prods,
                'prods_row' => $prods_row
            ]);
        }
    }

    // Example: Static method
    public static function getProductStatus(int $val): string
    {
        $res = null;
        if($val == 10){
            $res = "มีสินค้า (In stock)";
        }else{
            $res = "ไม่มีสินค้า (Out of stock)";
        }
        return $res;
    }

}
