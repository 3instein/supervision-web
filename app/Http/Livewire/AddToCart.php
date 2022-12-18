<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Order;
use Livewire\Component;

class AddToCart extends Component {
    public $menu;
    public $showOverlay;

    protected $listeners = ['getMenu'];

    public function getMenu($id) {
        $this->menu = Menu::findOrFail($id);
        $this->showOverlay = true;
    }

    public function addToCart() {
        $orderId = Order::findOrFail(1);
        $orderId->menus()->attach($this->menu->id);
    }

    public function render() {
        return view('livewire.add-to-cart');
    }
}
