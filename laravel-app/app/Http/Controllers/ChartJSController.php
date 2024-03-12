<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB; // For Query Builder
use Barryvdh\DomPDF\Facade\Pdf; // For DomPDF Package

class ChartJSController extends Controller
{
    public function index(Request $request, ?string $download=null)
    {

        if (!$request->session()->has('keyLoggedin')) {
            return redirect('/login');
        }

        $flag = false; // To control a web page elements

        $prods_rp = DB::table('products')
                ->join('category', 'products.prod_cate', '=', 'category.cate_id')
                ->select('products.*', 'category.cate_name')
                ->groupBy('prod_id')
                ->get();
        $prods = DB::table('products')
                ->select('prod_name','prod_amount','prod_balance')
                ->groupBy('prod_id')
                ->get();
 
        $labels = [];
        $data_a = [];
        $data_b = [];
        foreach( $prods as $prod_k => $prod_v )
        {
            $labels[] = $prod_v->prod_name;
            $data_a[] = $prod_v->prod_amount;
            $data_b[] = $prod_v->prod_balance;
        }

        if(!empty($download) && $download === 'pdf')
        {
            $flag = true;
            /***/
            //$pdf = app('dompdf.wrapper');
            //$pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = Pdf::loadView('chartjs.products', 
                [
                    // 'labels' => $labels,
                    // 'data_a' => $data_a,
                    // 'data_b' => $data_b,
                    'prods_rp' => $prods_rp,
                    'flag' => $flag
                ]
            );
            // Pdf::setOption(['dpi' => 96, 'defaultFont' => 'THSarabun', 'isPhpEnabled'=>true]);
        // print_r($labels);
        // print_r($data_a);
        // print_r($data_b);
        // die;
            /***/
            //$pdf = PDF::loadView('chartjs.products', $data);
            return $pdf->stream('PDFReport.pdf');
            //return $pdf->stream('PIR'.date('Ymdhis0').'.pdf', array("Attachment" => false));
        }
              
        return view(
            'chartjs.products', 
            compact('labels', 'data_a', 'data_b', 'prods_rp', 'flag')
        );
    }

}
