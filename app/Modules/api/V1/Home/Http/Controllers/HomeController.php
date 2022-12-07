<?php

namespace App\Modules\api\V1\Home\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index()
    {
        return response()->json('Home page');
    }
}
