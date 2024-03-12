<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function bmiCalculate (Request $req)
    {
        $out = $tmp = '';
        $bmi = 0.0;
        if ($req->isMethod('post')) {
            $my_name = $req->input('myname');
            $my_wei = $req->input('mywei');
            $my_hei = $req->input('myhei');

            $bmi = number_format(($my_wei/($my_hei*$my_hei)), 2);

            if($bmi < 18.50) $tmp = 'น้ำหนักน้อย / ผอมมากกว่าคนปกติ';
            else if($bmi >= 18.50 || $bmi <= 22.99) $tmp = 'ปกติ (สุขภาพดี) เท่าคนปกติ';
            else if($bmi >= 23 || $bmi <= 24.99) $tmp = 'ท้วม / โรคอ้วนระดับ 1 อันตรายระดับ 1';
            else if($bmi >= 25 || $bmi <= 29.99) $tmp = 'อ้วน / โรคอ้วนระดับ 2 อันตรายระดับ 2';
            else $tmp = 'อ้วนมาก / โรคอ้วนระดับ 3 อันตรายระดับ 3';

            $out = "<h1>ผลการคำนวณ BMI</h1>";
            $out.= "คุณ ".$my_name."<br>";
            $out.= "ค่า BMI เท่ากับ ".$bmi."<br>";
            $out.= "คำอธิบายค่า BMI: ".$tmp;
        }
        return $out2;
    }
}
