<x-app-layout>
  <nav class="mb-8">
    <div class="flex mb-1 items-center py-3">
      <h4 class="flex-auto text-center font-bold">Lorem ipsum</h4>
      <i data-feather="shopping-cart"></i>
    </div>
    <div class="flex">
      <select class="flex-auto rounded-xl border-gray-400" name="" id="">
        <option value="">Filter</option>
      </select>
      <button class="inline-flex border border-gray-400 rounded-xl ml-4 items-center justify-center px-4 text-xs"
        type="button"><i class="w-4 h-4 mr-2" data-feather="search"></i>Search</button>
    </div>
  </nav>
  <div>
    <div class="flex justify-between items-center mb-6">
      <h4 class="font-bold">Paling laris</h4>
      <p class="text-xs">Lihat semua</p>
    </div>
    <div class="flex justify-between flex-wrap">
      @foreach ($menus as $menu)
        <div class="w-[164px] border mb-4 rounded-xl overflow-hidden menu-card" data-menu="{{ $menu }}">
          <img class="h-[143px] object-cover" src="{{ $menu->image }}" alt="{{ $menu->name }}" />
          <div class="mt-4 mx-4">
            <p class="font-light">{{ $menu->name }}</p>
            <p class="pb-4 text-xs font-extrabold">Rp. {{ number_format($menu->price) }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <livewire:add-to-cart :menu="$menu" />
  @push('addon-script')
    <script>
      feather.replace()
      var menuCard = document.querySelectorAll('.menu-card');
      var overlay = document.querySelector('#overlay');
      const formatter = new Intl.NumberFormat('de-DE');

      for (let i = 0; i < menuCard.length; i++) {
        menuCard[i].addEventListener('click', function() {
          const {
            id,
            image,
            name,
            description,
            price
          } = JSON.parse(this.dataset.menu);
          overlay.querySelector('input').value = id;
          overlay.querySelector('img').src = image;
          overlay.querySelector('.menu-name').innerHTML = name;
          overlay.querySelector('.menu-description').innerHTML = description;
          overlay.querySelector('.menu-price').innerHTML = 'Rp. ' + formatter.format(price);
        });
      }
    </script>
  @endpush
</x-app-layout>
