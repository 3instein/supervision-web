<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Livewire\Component;

class VoucherModal extends Component {
    public $vouchers;

    public function mount() {
        $this->vouchers = Voucher::all();
    }

    public function render() {
        return view('livewire.voucher-modal');
    }
}
