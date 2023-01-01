<div>
  <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8 relative" x-data="{ open: @entangle('showVoucher') }">
    <!-- Voucher modal -->
    <div x-show="open">
      <livewire:voucher-modal />
    </div>

    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl pb-4">Keranjang</h1>
    <section aria-labelledby="cart-heading" class="lg:col-span-7">
      <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

      <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
        @isset($userOrder)
          @foreach ($userOrder->menus as $menu)
            <livewire:card-checkout :menu="$menu" :key="$menu->id" />
          @endforeach
        @endisset
      </ul>
    </section>

    <!-- Voucher -->
    <section aria-labelledby="vouchers" @click="open = true">
      <div class="flex items-center justify-between bg-slate-100 mt-6 px-4 py-6 rounded-lg">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-gift">
            <polyline points="20 12 20 22 4 22 4 12"></polyline>
            <rect x="2" y="7" width="20" height="5"></rect>
            <line x1="12" y1="22" x2="12" y2="7"></line>
            <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
            <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
          </svg>
          <span class="ml-2 text-sm">
            @if ($selectedVoucher)
              Berhasil menggunakan {{ $selectedVoucher->name }}
            @else
              Pakai voucher
            @endif

          </span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-chevron-right">
          <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
      </div>
    </section>

    <!-- Order summary -->
    <section aria-labelledby="summary-heading"
      class="mt-6 bg-slate-100 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
      <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

      <dl class="mt-6 space-y-4">
        <div class="flex items-center justify-between">
          <dt class="text-sm text-gray-600">Subtotal</dt>
          <dd class="text-sm font-medium text-gray-900">Rp. {{ number_format($subtotal) }}</dd>
        </div>
        @if ($selectedVoucher)
          <div class="flex items-center justify-between">
            <dt class="text-sm text-gray-600">Discount</dt>
            <dd class="text-sm font-medium text-gray-900">- Rp. {{ number_format($selectedVoucher->discount ?? 0) }}</dd>
          </div>
        @endif
        <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
          <dt class="flex text-sm text-gray-600">
            <span>Tax estimate</span>
            <a href="#" class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
              <span class="sr-only">Learn more about how tax is calculated</span>
              <!-- Heroicon name: solid/question-mark-circle -->
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </dt>
          <dd class="text-sm font-medium text-gray-900">Rp. {{ number_format($tax) }}</dd>
        </div>

        <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
          <dt class="text-base font-extrabold text-gray-900">Order total</dt>
          <dd class="text-sm font-extrabold text-gray-900">Rp. {{ number_format($total) }}</dd>
        </div>
      </dl>

      <div class="mt-6">
        <button type="button"
          class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
          wire:click="checkout">Checkout</button>
      </div>
    </section>
  </div>
</div>
