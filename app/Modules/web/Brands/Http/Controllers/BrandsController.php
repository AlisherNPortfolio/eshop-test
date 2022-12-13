<?php

namespace App\Modules\web\Brands\Http\Controllers;

use App\Http\Controllers\Controller;

class BrandsController extends Controller {

    public function index()
    {
        return view('brands::index');
    }
}
