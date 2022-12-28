<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutPage extends Component {
    public $userOrder;
    public $subtotal = 0;
    public $tax = 0;
    public $total = 0;

    protected $listeners = ['sumSubtotal'];

    public function mount($userOrder) {
        $this->userOrder = $userOrder;
        $this->sumSubtotal();
        $this->tax = $this->subtotal * 0.11;
        $this->total = $this->subtotal + $this->tax;
    }

    public function sumSubtotal() {
        $this->subtotal = 0;
        if (isset($this->userOrder->menus)) {
            foreach ($this->userOrder->menus as $menu) {
                $this->subtotal += $menu->pivot->quantity * $menu->price;
                $this->tax = $this->subtotal * 0.11;
                $this->total = $this->subtotal + $this->tax;
            }
        }
    }

    public function checkout(){
        $this->userOrder->transaction()->create([
            'order_id' => $this->userOrder->id,
            'total' => $this->total,
        ]);
        $this->userOrder->delete();
        return redirect()->route('home');
    }

    public function render() {
        return view('livewire.checkout-page');
    }
}
