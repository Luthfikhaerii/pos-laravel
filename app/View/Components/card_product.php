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
    public $name_product;
    public $img;
    public $editUrl;
    public $deleteUrl;

    public function __construct(String $price,String $img, String $name_product, String $editUrl, String $deleteUrl)
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
        return view('components.card_product',[
            'name_product'=>$this->name_product,
            'price'=>$this->price,
            'img'=>$this->img,
            'editUrl'=>$this->editUrl,
            'deleteUrl'=>$this->deleteUrl
        ]);
    }
}
