<?php

namespace App\Modules\web\Settings\Http\Controllers;

use App\Http\Controllers\Controller;

class SettingsController extends Controller {

    public function index()
    {
        return view('settings::index');
    }
}
