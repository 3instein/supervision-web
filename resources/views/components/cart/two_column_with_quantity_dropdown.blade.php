<div class="bg-white">
    <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Cart Page</h1>
        <form class="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
            <section aria-labelledby="cart-heading" class="lg:col-span-7">
                <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                    <li class="flex py-6 sm:py-10">
                        <div class="flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1615484477112-677decb29c57?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3280&q=80"
                                alt="Lemon tea."
                                class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
                        </div>

                        <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                            <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                <div>
                                    <div class="flex justify-between">
                                        <h3 class="text-sm">
                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">
                                                Lemon Tea
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="mt-1 flex text-sm">
                                        <p class="text-gray-500">Small</p>
                                        <p class="ml-4 pl-4 border-l border-gray-200 text-gray-500">Large</p>
                                    </div>
                                    <p class="mt-1 text-sm font-medium text-gray-900">6k</p>
                                </div>

                                <div class="mt-4 sm:mt-0 sm:pr-9">
                                    <label for="quantity-0" class="sr-only">Quantity, Lemon Tea</label>
                                    <select id="quantity-0" name="quantity-0"
                                        class="max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>

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

                            <p class="mt-4 flex text-sm text-gray-700 space-x-2">
                                <!-- Heroicon name: solid/check -->
                                <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Available</span>
                            </p>
                        </div>
                    </li>

                    <li class="flex py-6 sm:py-10">
                        <div class="flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1575921813892-45744beb775f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1011&q=80"
                                alt="Lasagna." class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
                        </div>

                        <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                            <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                <div>
                                    <div class="flex justify-between">
                                        <h3 class="text-sm">
                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">
                                                Lasagna
                                            </a>
                                        </h3>
                                    </div>
                                    <p class="mt-1 text-sm font-medium text-gray-900">39k</p>
                                </div>

                                <div class="mt-4 sm:mt-0 sm:pr-9">
                                    <label for="quantity-1" class="sr-only">Quantity, Lasagna</label>
                                    <select id="quantity-1" name="quantity-1"
                                        class="max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>

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

                            <p class="mt-4 flex text-sm text-gray-700 space-x-2">
                                <!-- Heroicon name: solid/check -->
                                <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Available</span>
                            </p>
                        </div>
                    </li>
                </ul>
            </section>

            <!-- Order summary -->
            <section aria-labelledby="summary-heading"
                class="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

                <dl class="mt-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <dt class="text-sm text-gray-600">Subtotal</dt>
                        <dd class="text-sm font-medium text-gray-900">45k</dd>
                    </div>
                    <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                        <dt class="flex text-sm text-gray-600">
                            <span>Tax estimate</span>
                            <a href="#" class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Learn more about how tax is calculated</span>
                                <!-- Heroicon name: solid/question-mark-circle -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </dt>
                        <dd class="text-sm font-medium text-gray-900">11k</dd>
                    </div>
                    <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                        <dt class="text-base font-medium text-gray-900">Order total</dt>
                        <dd class="text-base font-medium text-gray-900">56k</dd>
                    </div>
                </dl>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Checkout</button>
                </div>
            </section>
        </form>
    </div>
</div>
