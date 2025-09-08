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
    public $price;
    public $title;
    public $img;
    public $editUrl;
    public $deleteUrl;

    public function __construct(String $price,String $img, String $title, String $editUrl, String $deleteUrl)
    {
       $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_product',compact('price'));
    }
}
