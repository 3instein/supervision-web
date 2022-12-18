<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Order;
use Livewire\Component;

class AddToCart extends Component {

    public $menu;
    public $selectedId;

    public function mount($menu) {
        $this->menu = $menu;
    }

    public function addToCart() {
        $selectedMenu = Menu::findOrFail($this->selectedId);
        dd($selectedMenu);
        // $orderId = Order::findOrFail(1);
        // $orderId->menus()->attach($selectedMenu);
    }

    public function render() {
        return view('livewire.add-to-cart');
    }
}
