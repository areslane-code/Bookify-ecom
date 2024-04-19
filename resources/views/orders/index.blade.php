@extends('layout')

@section('main')
    <div class="relative">
        <!-- Table Section -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div
                            class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700">
                            <!-- Header -->
                            <div
                                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                        Mes commandes
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        vous pouvez modifier ou annuler votre commande en cliquant sur details.
                                    </p>
                                </div>
                            </div>
                            <!-- End Header -->
                            <!-- Table -->
                            <table class="min-w-full overflow-x-auto divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-slate-900">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-gray-200">
                                                    Numéro de commande
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-gray-200">
                                                    Prix Total
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-gray-200">
                                                    État
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-gray-200">
                                                    Quantité de livres
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-gray-200">
                                                    Date de commande
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-end"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <!-- order rows -->
                                    @foreach ($orders as $order)
                                        <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="font-mono text-sm text-blue-600 dark:text-blue-500">#{{ $order->id }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="text-sm text-gray-600 dark:text-gray-400 font-bitter">{{ $order->total_price . ' ' . 'DA' }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            Livrée
                                                        </span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="text-smtext-gray-600 dark:text-gray-400">{{ $order->total_quantity }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="text-xs text-gray-600 font-bitter dark:text-gray-400">{{ $order->created_at }}
                                                        </span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block">
                                                    <span class="px-6 py-1.5">
                                                        <span
                                                            class="inline-flex items-center justify-center gap-2 px-2 py-1 text-sm font-medium text-gray-700 align-middle transition-all bg-white border rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                            <svg class="flex-shrink-0 size-4"
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                                <path
                                                                    d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                            </svg>
                                                            Détails
                                                        </span>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="absolute z-10 transform -translate-x-1/2 top-10 left-1/2">
                                            <div class="hidden relative w-screen max-w-sm px-4 py-8 bg-gray-100 border border-gray-600 sm:px-6 lg:px-8"
                                                aria-modal="true" role="dialog" tabindex="-1">
                                                <button
                                                    class="absolute text-gray-600 transition end-4 top-4 hover:scale-110">
                                                    <span class="sr-only">Close cart</span>

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>

                                                <div class="mt-4 space-y-6">
                                                    <ul class="space-y-4">
                                                        <li class="flex items-center gap-4">
                                                            <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=830&q=80"
                                                                alt="" class="object-cover rounded size-16" />

                                                            <div>
                                                                <h3 class="text-sm text-gray-900">Basic Tee 6-Pack</h3>

                                                                <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                                    <div>
                                                                        <dt class="inline">Size:</dt>
                                                                        <dd class="inline">XXS</dd>
                                                                    </div>

                                                                    <div>
                                                                        <dt class="inline">Color:</dt>
                                                                        <dd class="inline">White</dd>
                                                                    </div>
                                                                </dl>
                                                            </div>

                                                            <div class="flex items-center justify-end flex-1 gap-2">
                                                                <form>
                                                                    <label for="Line1Qty" class="sr-only"> Quantity
                                                                    </label>

                                                                    <input type="number" min="1" value="1"
                                                                        id="Line1Qty"
                                                                        class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                                                </form>

                                                                <button
                                                                    class="text-gray-600 transition hover:text-red-600">
                                                                    <span class="sr-only">Remove item</span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-4 h-4">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </li>

                                                        <li class="flex items-center gap-4">
                                                            <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=830&q=80"
                                                                alt="" class="object-cover rounded size-16" />

                                                            <div>
                                                                <h3 class="text-sm text-gray-900">Basic Tee 6-Pack</h3>

                                                                <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                                    <div>
                                                                        <dt class="inline">Size:</dt>
                                                                        <dd class="inline">XXS</dd>
                                                                    </div>

                                                                    <div>
                                                                        <dt class="inline">Color:</dt>
                                                                        <dd class="inline">White</dd>
                                                                    </div>
                                                                </dl>
                                                            </div>

                                                            <div class="flex items-center justify-end flex-1 gap-2">
                                                                <form>
                                                                    <label for="Line2Qty" class="sr-only"> Quantity
                                                                    </label>

                                                                    <input type="number" min="1" value="1"
                                                                        id="Line2Qty"
                                                                        class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                                                </form>

                                                                <button
                                                                    class="text-gray-600 transition hover:text-red-600">
                                                                    <span class="sr-only">Remove item</span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-4 h-4">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </li>

                                                        <li class="flex items-center gap-4">
                                                            <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=830&q=80"
                                                                alt="" class="object-cover rounded size-16" />

                                                            <div>
                                                                <h3 class="text-sm text-gray-900">Basic Tee 6-Pack</h3>

                                                                <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                                    <div>
                                                                        <dt class="inline">Size:</dt>
                                                                        <dd class="inline">XXS</dd>
                                                                    </div>

                                                                    <div>
                                                                        <dt class="inline">Color:</dt>
                                                                        <dd class="inline">White</dd>
                                                                    </div>
                                                                </dl>
                                                            </div>

                                                            <div class="flex items-center justify-end flex-1 gap-2">
                                                                <form>
                                                                    <label for="Line3Qty" class="sr-only"> Quantity
                                                                    </label>

                                                                    <input type="number" min="1" value="1"
                                                                        id="Line3Qty"
                                                                        class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                                                </form>

                                                                <button
                                                                    class="text-gray-600 transition hover:text-red-600">
                                                                    <span class="sr-only">Remove item</span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-4 h-4">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                    <div class="space-y-4 text-center">
                                                        <a href="#"
                                                            class="block px-5 py-3 text-sm text-white transition bg-blue-600 border rounded hover:ring-1 hover:ring-gray-400">
                                                            Modifier
                                                        </a>

                                                        <a href="#"
                                                            class="block px-5 py-3 text-sm text-gray-100 transition bg-red-600 rounded hover:bg-red-700">
                                                            Annuler la commande
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Modal-->
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Table Section -->
    </div>
@endsection
