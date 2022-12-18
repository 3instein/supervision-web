<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Order;
use Livewire\Component;

class ShowMenus extends Component {

    public $menu;

    public function mount($menu) {
        $this->menu = $menu;
    }

    public function addToCart($id) {
        $selectedMenu = Menu::findOrFail($id);
        $orderId = Order::findOrFail(1);
        $orderId->menus()->attach($selectedMenu);
    }

    public function render() {
        return view('livewire.show-menus');
    }
}
