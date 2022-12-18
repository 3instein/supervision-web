<div>
    <li class="flex py-6 sm:py-10">
        <div class="flex-shrink-0">
            <img src="{{ $menu->image }}"
                alt="{{ $menu->name }}"
                class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
        </div>

        <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
            <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                <div>
                    <div class="flex justify-between">
                        <h3 class="text-sm">
                            <label class="font-medium text-gray-700 hover:text-gray-800">
                                {{ $menu->name }}
                            </label>
                        </h3>
                    </div>
                    <p class="mt-1 text-sm font-medium text-gray-900">Rp. {{ number_format($menu->price ?? 0) }}</p>
                </div>

                <div class="mt-4 sm:mt-0 sm:pr-9">
                    <button class="text-xl mr-4" wire:click="decrement" type="button">-</button>
                    <input class="w-10 text-xs text-center border-gray-400 rounded" type="text" value="{{ $quantity }}"/>
                    <button class="text-xl ml-4" wire:click="increment" type="button">+</button>

                    <div class="absolute top-0 right-0">
                        <button type="button"
                            class="-m-2 p-2 inline-flex text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Remove</span>
                            <!-- Heroicon name: solid/x -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </li>
</div>
