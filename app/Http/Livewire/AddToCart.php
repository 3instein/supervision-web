<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Table;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component {
    public $menu;
    public $table;
    public $showOverlay;
    public $note;
    public $quantity = 1;

    protected $listeners = ['getMenu'];

    public function mount($table) {
        $this->table = $table;
    }

    public function getMenu($id) {
        $this->menu = Menu::findOrFail($id);
        $this->showOverlay = true;
    }

    public function addToCart(Table $table) {
        if ($table->orders->where('customer_id', Auth::id())->count() == 0) {
            $order = Order::create([
                'customer_id' => 1,
                'table_id' => $table->id,
            ]);
        } else {
            $order = $table->orders->where('customer_id', 1)->first();
        }

        if ($this->quantity >= 1) {
            if (!$order->menus->contains($this->menu->id)) {
                $order->menus()->attach($this->menu->id, ['quantity' => $this->quantity, 'note' => $this->note]);
                flash('Berhasil menambahkan ' . $this->quantity . ' ' . $this->menu->name . ' ke keranjang.')->success()->livewire($this);
                $this->quantity = 1;
            } else {
                $oldValue = $this->menu->orders->first()->pivot->quantity;
                $order->menus()->updateExistingPivot($this->menu->id, ['quantity' => $oldValue + $this->quantity, 'note' => $this->note]);
                flash('Berhasil menambahkan ' . $this->quantity . ' ' . $this->menu->name . ' ke keranjang.')->success()->livewire($this);
                $this->quantity = 1;
            }
        }
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
