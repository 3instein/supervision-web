<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class CardCheckout extends Component {
    public $menu;
    public $quantity;
    public $note;

    protected $listeners = ['changeQuantity'];

    public function mount($menu) {
        $this->menu = $menu;
        $this->quantity = $menu->pivot->quantity;
        $this->note = $menu->pivot->note;
    }

    public function increment() {
        $this->quantity++;
        $this->menu->orders()->updateExistingPivot($this->menu->orders()->first()->id, ['quantity' => $this->quantity]);
        $this->emitUp('sumSubtotal');
    }

    public function decrement() {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->menu->orders()->updateExistingPivot($this->menu->orders()->first()->id, ['quantity' => $this->quantity]);
            $this->emitUp('sumSubtotal');
        }
    }

    public function changeQuantity() {
        $this->menu->orders()->updateExistingPivot($this->menu->orders()->first()->id, ['quantity' => $this->quantity]);
        $this->emitUp('sumSubtotal');
    }

    public function remove() {
        $order = Order::where('customer_id', 1)->first();
        if($order->menus->count() == 1){
            $this->menu->orders()->detach($this->menu->orders()->first()->id);
            $order->delete();
        } else {
            $this->menu->orders()->detach($this->menu->orders()->first()->id);
        }
        $this->emitUp('sumSubtotal');
    }

    public function render() {
        return view('livewire.card-checkout');
    }
}
