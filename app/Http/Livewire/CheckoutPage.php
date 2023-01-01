<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Livewire\Component;

class CheckoutPage extends Component {
    public $userOrder;
    public $subtotal = 0;
    public $selectedVoucher;
    public $tax = 0;
    public $total = 0;
    public $showVoucher = false;

    protected $listeners = ['sumSubtotal', 'getVoucher'];

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

    public function getVoucher(Voucher $voucher) {
        $this->selectedVoucher = $voucher;
    }

    public function checkout() {
        if($this->selectedVoucher){
            $this->total = $this->total - $this->selectedVoucher->discount;
        }
        $this->userOrder->transaction()->create([
            'order_id' => $this->userOrder->id,
            'total' => $this->total,
            'voucher_id' => $this->selectedVoucher->id ?? null,
        ]);
        $this->userOrder->delete();
        return redirect()->route('home');
    }

    public function render() {
        return view('livewire.checkout-page');
    }
}
