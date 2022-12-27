<?php

namespace App\Modules\web\Categories\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\web\Categories\Repositories\Contracts\ICategoryReadRepository;
use App\Modules\web\Categories\Repositories\Contracts\ICategoryWriteRepository;

class CategoriesController extends Controller
{

    private $readRepository;

    private $writeRepository;

    public function __construct(ICategoryReadRepository $readRepository, ICategoryWriteRepository $writeRepository)
    {
        $this->readRepository = $readRepository;
        $this->writeRepository = $writeRepository;
    }

    public function index()
    {
        $categoryMenu = $this->readRepository->getAsMenu();

        return view('categories::index', compact('categoryMenu'));
    }
}
