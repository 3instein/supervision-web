<div>
  <div class="flex items-center border-b w-full pb-4 mb-4" wire:click="getMenu">
    <img class="h-20 w-20 object-cover" src="{{ $menu->image }}" alt="{{ $menu->name }}" />
    <div class="mt-4 mx-4">
      <p class="font-light">{{ $menu->name }}</p>
      <p class="pb-4 text-xs font-extrabold">Rp. {{ number_format($menu->price) }}</p>
    </div>
  </div>
</div>
