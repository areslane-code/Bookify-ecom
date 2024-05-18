@extends('layout')

@section('main')
    <div class="my-32">
        <!-- Table Section -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <!-- End Header -->
            @if (!blank($orders))
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl ">
                                <!-- Header -->
                                <div
                                    class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center ">
                                    <div>
                                        <h2 class="text-xl font-semibold text-gray-800 ">
                                            Mes commandes
                                        </h2>
                                        <p class="text-sm text-gray-600 ">
                                            vous pouvez modifier ou annuler votre commande en cliquant sur details.
                                        </p>
                                    </div>
                                </div>
                                <!-- Table -->
                                <table class="min-w-full overflow-x-auto divide-y divide-gray-200 ">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span
                                                        class="text-xs font-semibold tracking-wide text-gray-800 uppercase ">
                                                        Numéro de commande
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span
                                                        class="text-xs font-semibold tracking-wide text-gray-800 uppercase ">
                                                        Prix Total
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span
                                                        class="text-xs font-semibold tracking-wide text-gray-800 uppercase ">
                                                        État
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span
                                                        class="text-xs font-semibold tracking-wide text-gray-800 uppercase ">
                                                        Adresse
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span
                                                        class="text-xs font-semibold tracking-wide text-gray-800 uppercase ">
                                                        Date de commande
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-end"></th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 ">
                                        <!-- order rows -->
                                        @foreach ($orders as $order)
                                            <tr class="bg-white hover:bg-gray-50 ">
                                                <td class="size-px whitespace-nowrap">
                                                    <button type="button" class="block"
                                                        data-hs-overlay="#hs-ai-invoice-modal">
                                                        <span class="block px-6 py-2">
                                                            <span
                                                                class="text-sm text-blue-600 font-bitter ">#{{ $order->id }}</span>
                                                        </span>
                                                    </button>
                                                </td>
                                                <td class="size-px whitespace-nowrap">
                                                    <button type="button" class="block"
                                                        data-hs-overlay="#hs-ai-invoice-modal">
                                                        <span class="block px-6 py-2">
                                                            <span
                                                                class="text-sm text-gray-600 font-bitter ">{{ $order->total_price . ' ' . 'DA' }}</span>
                                                        </span>
                                                    </button>
                                                </td>
                                                <td class="size-px whitespace-nowrap">
                                                    <span class="block px-6 py-2">
                                                        @if (isset($order->status))
                                                            @switch($order->status_id)
                                                                @case(1)
                                                                    <span
                                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="lucide lucide-loader">
                                                                            <path d="M12 2v4" />
                                                                            <path d="m16.2 7.8 2.9-2.9" />
                                                                            <path d="M18 12h4" />
                                                                            <path d="m16.2 16.2 2.9 2.9" />
                                                                            <path d="M12 18v4" />
                                                                            <path d="m4.9 19.1 2.9-2.9" />
                                                                            <path d="M2 12h4" />
                                                                            <path d="m4.9 4.9 2.9 2.9" />
                                                                        </svg>
                                                                        {{ $order->status->status }}
                                                                    </span>
                                                                @break

                                                                @case(5)
                                                                    <span
                                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="lucide lucide-circle-check">
                                                                            <circle cx="12" cy="12" r="10" />
                                                                            <path d="m9 12 2 2 4-4" />
                                                                        </svg>
                                                                        {{ $order->status->status }}
                                                                    </span>
                                                                @break

                                                                @case(6)
                                                                    <span
                                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="lucide lucide-undo-2">
                                                                            <path d="M9 14 4 9l5-5" />
                                                                            <path
                                                                                d="M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5v0a5.5 5.5 0 0 1-5.5 5.5H11" />
                                                                        </svg>
                                                                        {{ $order->status->status }}
                                                                    </span>
                                                                @break

                                                                @case(7)
                                                                    <span
                                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full ">
                                                                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                                        </svg>
                                                                        {{ $order->status->status }}
                                                                    </span>
                                                                @break

                                                                @default
                                                                    <span
                                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full ">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="lucide lucide-check">
                                                                            <path d="M20 6 9 17l-5-5" />
                                                                        </svg>
                                                                        {{ $order->status->status }}
                                                                    </span>
                                                            @endswitch
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="size-px whitespace-nowrap">


                                                    <span class="block px-6 py-2">
                                                        <span class="text-sm text-gray-600 ">{{ $order->adresse }}</span>
                                                    </span>

                                                </td>
                                                <td class="size-px whitespace-nowrap">

                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="text-xs text-gray-600 font-bitter ">{{ $order->created_at }}
                                                        </span>
                                                    </span>

                                                </td>
                                                <td class="size-px whitespace-nowrap">
                                                    <button type="button" class="block"
                                                        onclick="redirectToEdit({{ $order->id }})">
                                                        <span class="px-6 py-1.5">
                                                            <span
                                                                class="inline-flex items-center justify-center gap-2 px-2 py-1 text-sm font-medium text-gray-700 align-middle transition-all bg-white border rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 ">
                                                                <svg class="flex-shrink-0 size-4"
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    viewBox="0 0 16 16">
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
                            @else
                                <div>
                                    <img class="w-full max-w-sm mx-auto" src={{ asset(Storage::url('empty.svg')) }}
                                        alt="Liste de commande vide">
                                    <p class="mt-6 text-xl text-center md:text-2xl lg:text-3xl">Vous n'avez pas de commande
                                        <br> pour le moment
                                    </p>
                                </div>
            @endif

        </div>
    </div>
    </div>
    </div>
    <!-- End Card -->
    </div>
    <!-- End Table Section -->
    </div>

    <script>
        function redirectToEdit(id) {
            location.href = `http://127.0.0.1:8000/order/edit/${id}`;
        }
    </script>
@endsection
