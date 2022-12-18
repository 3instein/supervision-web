<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Order;
use Livewire\Component;

class AddToCart extends Component {
    public $menu;
    public $showOverlay;
    public $note;
    public $quantity = 1;

    protected $listeners = ['getMenu'];

    public function getMenu($id) {
        $this->menu = Menu::findOrFail($id);
        $this->showOverlay = true;
    }

    public function addToCart() {
        $orderId = Order::findOrFail(1);
        $orderId->menus()->attach($this->menu->id, ['quantity' => $this->quantity, 'note' => $this->note]);
    }

    public function increment() {
        $this->quantity++;
    }

    public function decrement() {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function render() {
        return view('livewire.add-to-cart');
    }
}
