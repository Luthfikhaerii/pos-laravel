<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $price;
    public $image;
    public $editUrl;
    public $deleteUrl;
    public $stock;
    public $category;

    public function __construct( String $name,String $price,String $image,  String $editUrl, String $deleteUrl, String $stock, String $category)
    {
       $this->name = $name;
       $this->price = $price;
       $this->image = $image;
       $this->editUrl = $editUrl;
       $this->deleteUrl = $deleteUrl;
       $this->stock = $stock;
       $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_product');
    }
}
