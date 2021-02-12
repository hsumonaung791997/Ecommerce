<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryComponent extends Component
{
    
    public $categories;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->categories =Category::has('items')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category-component');
    }
}
