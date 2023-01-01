<div>
  <div class="w-full h-[512px] bg-white absolute bottom-0 left-0 rounded-t-2xl overflow-scroll" x-data="{ open: @entangle('showOverlay') }"
    x-show="open" @click.outside="open = false">
    <button
      class="text-2xl absolute top-0 right-0 mr-4 mt-4 rounded-full px-3 pb-1 inline-flex justify-center items-center bg-black text-white"
      type="button" @click="open = false">x</button>
    <img class="h-[196px] w-full object-cover rounded-t-2xl" src="{{ $menu->image ?? '' }}"
      alt="{{ $menu->name ?? '' }}" />
    <div class="mt-4 mx-4">
      <div class="flex justify-between items-center mb-2">
        <p class="font-extrabold">{{ $menu->name ?? '' }}</p>
        <p class="font-extrabold">{{ 'Rp. ' . number_format($menu->price ?? 0) }}</p>
      </div>
      <p class="font-light mb-4">{{ $menu->description ?? '' }}</p>
      <textarea class="w-full resize-none placeholder:text-xs border-gray-400 rounded-md text-xs mb-4"
        placeholder="Tambah catatan (contoh: tidak pedes ya...)" wire:model="note"></textarea>
      <div class="flex justify-center items-center">
        <button class="text-xl mr-4" type="button" wire:click.defer="decrement">-</button>
        <input class="w-10 text-xs text-center border-gray-400 rounded" type="text" value="{{ $quantity }}"
          wire:model="quantity" />
        <button class="text-xl ml-4" type="button" wire:click.defer="increment">+</button>
      </div>
    </div>
    <button class="w-full absolute bottom-0 left-0 bg-gray-300 py-3 font-extrabold" wire:click="addToCart({{ $table }})"
      @click="open = false">Tambah</button>
  </div>
</div>
