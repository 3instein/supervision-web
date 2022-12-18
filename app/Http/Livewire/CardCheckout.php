<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardCheckout extends Component
{
    protected $rules = [
        'menu.pivot.quantity' => 'required|numeric|min:1',
    ];

    public $menu;

    public function mount($menu)
    {
        $this->menu = $menu;
    }

    public function increment()
    {
        $this->menu->orders()->updateExistingPivot($this->menu->id, [
            'quantity' => $this->menu->pivot->quantity + 1,
        ]);
        dd($this->menu->orders());
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
