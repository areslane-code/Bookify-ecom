@extends('layout')

@section('main')
    <div class="my-32">
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
                                                    Adresse
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
                                                            class="text-sm text-gray-600 dark:text-gray-400 font-bitter">{{ $order->adresse }}</span>
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
