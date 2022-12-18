<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardCheckout extends Component
{
    public $menu;

    public function mount($menu)
    {
        $this->menu = $menu;
    }

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->menu->pivot->quantity > 1) {
            $this->menu->pivot->quantity--;
        }
    }

    public function render()
    {
        return view('livewire.card-checkout');
    }
}
