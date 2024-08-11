<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('test');
    }

    public function show(Request $request){
        $validatedData = $request->validate([
            'number' => [
                'required',
                'digits:14',
            ],
        ], [
            'number.required' => 'الرقم القومي مطلوب',
            'number.digits' => 'الرقم القومي يجب أن يتكون من 14 رقمًا',
        ]);
        $number = $request->number;
        $first = substr($number, 0, 1);
        $month = substr($number, 4, 1);
        $day = substr($number, 5, 2);
        $year = substr($number, 2, 1);
        $zero = substr($number, 1, 1);
        $four = substr($number, 1, 2);
        $zeroday = substr($number, 3, 1);
        $daay = substr($number, 3, 2);
        $Governorate = substr($number, 7, 2);
        $type = substr($number, 12, 1);
        return view('show', compact('number', 'first', 'month', 'day', 'year', 'zero', 'four', 'zeroday', 'daay', 'Governorate', 'type'));
    }
}
