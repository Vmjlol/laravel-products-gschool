<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function test(Request $request) {

         $name = $request->input('name');
         $age = $request->input('age');

        // return 'Meu nome é ' . $request->input('name').' e tenho '.$request->input('age') .' anos';
        return "Meu nome é $name e tenho $age anos";

    }
}
