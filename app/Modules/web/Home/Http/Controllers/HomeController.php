<?php

namespace App\Modules\web\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\web\Categories\Repositories\Contracts\ICategoryReadRepository;

class HomeController extends Controller
{
    private $categoryRepository;

    public function __construct(ICategoryReadRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        dd($this->categoryRepository->getAsMenu());
        return view('home::index');
    }
}
