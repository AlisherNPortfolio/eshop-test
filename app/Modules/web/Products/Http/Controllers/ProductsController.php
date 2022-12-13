<?php

namespace App\Modules\web\Products\Http\Controllers;

use App\Http\Controllers\Controller;

class ProductsController extends Controller {

    public function index()
    {
        return view('products::index');
    }
}
