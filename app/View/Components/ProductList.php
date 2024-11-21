<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductList extends Component
{
    /**
     * Create a new component instance.
     */
    public $modalId;
    public $modalTitle;
    public function __construct(  
        string $modalId = 'defaultModalId',
        string $modalTitle = 'Product List' )
    {
        $this->modalId = $modalId;
        $this->modalTitle = $modalTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-list');
    }
}
