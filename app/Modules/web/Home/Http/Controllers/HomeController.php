<?php

namespace App\Modules\web\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\web\Brands\Repositories\Contracts\IBrandReadRepository;
use App\Modules\web\Categories\Repositories\Contracts\ICategoryReadRepository;

class HomeController extends Controller
{
    private $categoryRepository;

    private $brandRepository;

    public function __construct(ICategoryReadRepository $categoryRepository, IBrandReadRepository $brandRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $categoryMenu = $this->categoryRepository->getAsMenu();
        $brands = $this->brandRepository->homeBrands();

        return view('home::index', [
            'categoryMenu' => $categoryMenu,
            'brands' => $brands
        ]);
    }
}
