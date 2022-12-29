<?php

namespace App\Modules\web\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\web\Brands\Repositories\Contracts\IBrandReadRepository;
use App\Modules\web\Categories\Repositories\Contracts\ICategoryReadRepository;
use App\Modules\web\Products\Repositories\Contracts\IProductReadRepository;

class HomeController extends Controller
{
    private $categoryRepository;
    private $brandRepository;
    private $productRepository;

    public function __construct(
        ICategoryReadRepository $categoryRepository,
        IBrandReadRepository $brandRepository,
        IProductReadRepository $productRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $categoryMenu = $this->categoryRepository->getAsMenu();
        $brands = $this->brandRepository->homeBrands();
        $featuredProducts = $this->productRepository->featureProducts();
        $recommendedCatProducts = $this->categoryRepository->homeRecommends();
        $recommendedProducts = $this->productRepository->homeRecommends();
        return view('home::index', [
            'categoryMenu' => $categoryMenu,
            'brands' => $brands,
            'featuredProducts' => $featuredProducts,
            'recommendedCategories' => $recommendedCatProducts,
            'recommendedProducts' => $recommendedProducts
        ]);
    }
}
