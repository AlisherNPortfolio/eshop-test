<?php

namespace App\Modules\web\Home\View\Components;

use Illuminate\View\Component;

class RecommendedProducts extends Component
{
    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->products = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('home::components.recommended-products');
    }
}
