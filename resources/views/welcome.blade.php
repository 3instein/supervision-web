<x-guest-layout>
  <nav class="mb-8">
    <div class="flex mb-1 items-center py-3">
      <h4 class="flex-auto text-center font-bold">Lorem ipsum</h4>
      <i data-feather="shopping-cart"></i>
    </div>
    <div class="flex">
      <select class="flex-auto rounded-xl" name="" id="">
        <option value="">Filter</option>
      </select>
      <button class="inline-flex border rounded-xl ml-4 items-center justify-center px-4" type="button"><i data-feather="search"></i>Search</button>
    </div>
  </nav>
  <div>
    <div class="flex justify-between items-center mb-6">
      <h4 class="font-bold">Paling laris</h4>
      <p class="text-xs">Lihat semua</p>
    </div>
    <div class="flex justify-between flex-wrap">
      <div class="w-[164px] border mb-4 rounded-xl overflow-hidden">
        <img class="h-[143px] object-cover"
          src="https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80"
          alt="" />
        <div class="mt-4 ml-4">
          <p>Nasi Goreng</p>
          <p class="pb-4">Rp. 10,000</p>
        </div>
      </div>
      <div class="w-[164px] border mb-4 rounded-xl overflow-hidden">
        <img class="h-[143px] object-cover"
          src="https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80"
          alt="" />
        <div class="mt-4 ml-4">
          <p>Nasi Goreng</p>
          <p class="pb-4">Rp. 10,000</p>
        </div>
      </div>
      <div class="w-[164px] border mb-4 rounded-xl overflow-hidden">
        <img class="h-[143px] object-cover"
          src="https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80"
          alt="" />
        <div class="mt-4 ml-4">
          <p>Nasi Goreng</p>
          <p class="pb-4">Rp. 10,000</p>
        </div>
      </div>
      <div class="w-[164px] border mb-4 rounded-xl overflow-hidden">
        <img class="h-[143px] object-cover"
          src="https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80"
          alt="" />
        <div class="mt-4 ml-4">
          <p>Nasi Goreng</p>
          <p class="pb-4">Rp. 10,000</p>
        </div>
      </div>
    </div>
  </div>
  @push('addon-script')
    <script>
      feather.replace()
    </script>
  @endpush
</x-guest-layout>
