<?php

namespace App\Modules\web\Home\View\Components;

use Illuminate\View\Component;

class RecommendedCategories extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->categories = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('home::components.recommended-categories');
    }
}
