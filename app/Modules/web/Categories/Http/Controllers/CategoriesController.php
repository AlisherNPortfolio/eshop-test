<?php

namespace App\Modules\web\Home\Http\Controllers;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller {

    public function index()
    {
        return view('categories::index');
    }
}
