<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class CardCheckout extends Component
{
    // protected $rules = [
    //     'menu.pivot.quantity' => 'required|numeric|min:1',
    // ];

    public $menu;
    public $quantity;

    public function mount($menu)
    {
        $this->menu = $menu;
        $this->quantity = $menu->pivot->quantity;
    }

    public function increment()
    {	
        $this->quantity++;
        $this->menu->orders()->updateExistingPivot($this->menu->orders()->first()->id, ['quantity' => $this->quantity]);
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->menu->orders()->updateExistingPivot($this->menu->orders()->first()->id, ['quantity' => $this->quantity]);
        }
    }

    public function render()
    {
        return view('livewire.card-checkout');
    }
}
