<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VoucherModal extends Component {
    public $vouchers;
    public $selectedVoucher;

    public function mount() {
        $this->vouchers = Voucher::all();
    }

    public function selectVoucher(Voucher $voucher) {
        $user = Auth::guard('customer')->user();
        if ($user->orders->count() != 0) {
            $order = $user->orders->last();
            $total = 0;
            foreach ($order->menus as $menu) {
                $total += $menu->pivot->quantity * $menu->price;
            }
            if ($total >= $voucher->minimal) {
                $this->selectedVoucher = $voucher;
                $this->emit('getVoucher', $this->selectedVoucher);
            }
        }
    }

    public function removeVoucher() {
        $this->selectedVoucher = null;
        $this->emit('removeVoucher');
    }

    public function render() {
        return view('livewire.voucher-modal');
    }
}
