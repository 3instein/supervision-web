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
            @if (Auth::user()->points >= $voucher->tier->points)
              <div class="flex items-center justify-between border-b border-gray-300 pb-4">
                <div class="flex flex-col">
                  <span class="font-bold text-lg">{{ $voucher->name }}</span>
                  <p>{{ $voucher->description }}</p>
                  <p>{{ $voucher->tier->name }}</p>
                  <p class="text-sm text-gray-500">Discount : Rp. {{ number_format($voucher->discount) }}</p>
                  <p class="text-sm text-gray-500">Minimum : Rp. {{ number_format($voucher->minimal) }}</p>
                </div>
                @if ($selectedVoucher)
                  @if ($selectedVoucher->id == $voucher->id)
                    <button type="button" wire:click="removeVoucher" @click="open = false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-check-circle">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                      </svg>
                    </button>
                  @endif
                @else
                  <button type="button" wire:click="selectVoucher({{ $voucher }})" @click="open = false">
                    Pilih
                  </button>
                @endif
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
