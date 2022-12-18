<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardMenu extends Component {
    public $menu;

    public function mount($menu) {
        $this->menu = $menu;
    }

    public function getMenu() {
        $this->emit('getMenu', $this->menu->id);
    }

    public function render() {
        return view('livewire.card-menu');
    }
}
