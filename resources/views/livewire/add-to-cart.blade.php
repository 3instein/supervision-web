<div>
  <div class="w-full h-[512px] bg-white absolute bottom-0 left-0 rounded-t-2xl overflow-scroll" x-data="{ open: @entangle('showOverlay') }"
    x-show="open">
    <img class="h-[196px] w-full object-cover rounded-t-2xl" src="{{ $menu->image ?? '' }}" alt="{{ $menu->name ?? '' }}" />
    <div class="mt-4 mx-4">
      <div class="flex justify-between items-center mb-2">
        <p class="font-extrabold">{{ $menu->name ?? '' }}</p>
        <p class=font-extrabold">{{ 'Rp. ' . number_format($menu->price ?? 0) }}</p>
      </div>
      <p class="font-light mb-4">{{ $menu->description ?? '' }}</p>
      <textarea class="w-full resize-none placeholder:text-xs border-gray-400 rounded-md" placeholder="Tambah catatan (contoh: tidak pedes ya...)"></textarea>
    </div>
    <button class="w-full absolute bottom-0 left-0 bg-gray-300 py-3 font-extrabold"
      wire:click="addToCart">Tambah</button>
  </div>
</div>
