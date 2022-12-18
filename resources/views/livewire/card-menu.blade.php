<div>
  <div class="w-[164px] border mb-4 rounded-xl overflow-hidden menu-card" wire:click="getMenu">
    <img class="h-[143px] object-cover" src="{{ $menu->image }}" alt="{{ $menu->name }}" />
    <div class="mt-4 mx-4">
      <p class="font-light">{{ $menu->name }}</p>
      <p class="pb-4 text-xs font-extrabold">Rp. {{ number_format($menu->price) }}</p>
    </div>
  </div>
</div>
