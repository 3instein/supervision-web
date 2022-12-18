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
        <livewire:card-menu :menu="$menu" />
      @endforeach
    </div>
  </div>
  <livewire:add-to-cart />
  @push('addon-script')
    <script>
      feather.replace()
    </script>
  @endpush
</x-app-layout>
