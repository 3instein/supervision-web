<div>
  <div class="absolute top-1/2 left-0 w-full -translate-y-1/2 z-50">
    <div class="relative w-full h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">
            Voucher yang tersedia
          </h3>
          <button type="button" @click="open = false"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
            data-modal-toggle="staticModal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6">
          @foreach ($vouchers as $voucher)
            <div class="flex items-center justify-between">
              <div class="flex flex-col border-b border-gray-300 pb-4">
                <span class="font-bold text-lg">{{ $voucher->name }}</span>
                <p>{{ $voucher->description }}</p>
                <p class="text-sm text-gray-500">Discount : Rp. {{ number_format($voucher->discount) }}</p>
                <p class="text-sm text-gray-500">Minimum : Rp. {{ number_format($voucher->minimal) }}</p>
              </div>
              <button type="button" wire:click="selectVoucher({{ $voucher }})">Pilih</button>
            </div>
          @endforeach
        </div>
        <!-- Modal footer -->
        <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b">
          <button type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">Pakai
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
