<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Admin\Course;
use Livewire\Component;

class Cart extends Component
{
    public $carts,$cartsArr=[],$subtotal;

    public function mount($carts){
        $this->carts = $carts;
        $this->cartsArr = $carts->toArray();
        $this->updateSubtotal();
    }
    public function render()
    {
        return view('livewire.cart');
    }

    public function decreaseQty($index){
        if ($this->cartsArr[$index]['quantity'] >0){
            $this->cartsArr[$index]['quantity'] -= 1;
            $this->updateSubtotal();
        }
    }

    public function increaseQty($index){
        $this->cartsArr[$index]['quantity'] += 1;
        $this->updateSubtotal();
    }

//    public function changeQty($index){
//        $this->cartsArr[$index]['quantity'] == 1;
//    }

    public function updateSubtotal(){
        $carttotal=0;

        foreach ($this->cartsArr as $cart){
            $carttotal += $cart['quantity']*$cart['price'];
        }
        $this->subtotal = $carttotal;
    }
}
