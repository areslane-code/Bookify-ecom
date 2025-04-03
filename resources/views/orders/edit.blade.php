@extends('layout')



@section('main')
    <div class="relative max-w-screen-xl px-4 py-8 mx-auto my-20 sm:px-6 sm:py-12 lg:py-24 lg:px-8" x-data="{ showCouponForm: false }">
        <div class="max-w-3xl mx-auto">
            @if (isset($books) && !blank($books))
                <header class="text-center">
                    <h1 class="mb-2 text-xl font-bold text-gray-900 sm:text-3xl">Details de votre commande</h1>
                    {{-- @if ($order->status_id !== 1)
                        <p class="p-2 mb-6 text-red-600 bg-red-100 rounded-md">Il n'est possible de modifier ni annuler une
                            commande que si
                            elle n'a
                            pas encore été confirmée.
                        </p>
                    @endif --}}
                </header>
                <!-- Print invoice-->
                <div class="flex justify-end ">
                    <form action="/order/print-invoice" method="POST">
                        @csrf
                        <input hidden type="text" name="order_id" value="{{ $order->id }}" id="hiddenId3">

                        <button type="submit"
                            class="block px-5 py-3 mt-4 text-sm text-gray-100 transition bg-blue-700 rounded hover:bg-red-900">
                            imprimer la facture
                        </button>

                    </form>
                </div>
                <form action="/order/update" method="POST" class="mt-4">
                    @csrf
                    <input hidden type="text" name="order_id" value="{{ $order->id }}" id="hiddenId">
                    <ul class="space-y-4">
                        @foreach ($books as $book)
                            <!-- Book-->
                            <li class="flex items-center gap-4">
                                <img src={{ Storage::url($book->image) }} alt=""
                                    class="object-cover rounded size-16" />
                                <div>
                                    <h3 class="text-sm text-gray-900">{{ $book->title }}</h3>

                                    <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                        <div>
                                            <dt class="inline">Auteur:</dt>
                                            <dd class="inline">{{ $book->author }}</dd>
                                        </div>

                                        <div>
                                            <dt class="inline">Prix:</dt>
                                            <dd class="inline font-semibold font-bitter">{{ $book->price }}</dd>
                                        </div>
                                    </dl>
                                </div>

                                <div class="flex items-center justify-end w-full gap-4">
                                    <input {{ $order->status_id !== 1 ? 'disabled' : '' }} type="number"
                                        name="quantityInput_{{ $book->id }}" value={{ $book->pivot->quantity }}
                                        id="quantityInput_{{ $book->id }}"
                                        class="w-16 p-1 text-sm font-semibold text-center text-gray-500 font-bitter" />

                                    {{-- Remove book submit --}}
                                    {{-- <button {{ $order->status_id !== 1 ? 'hidden' : '' }} type="submit"
                                        name="removeSubmit" value="{{ $book->id }}"
                                        class="text-gray-600 transition hover:text-red-600">
                                        <span class="sr-only">Remove item</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button> --}}

                                </div>
                            </li>
                        @endforeach
                    </ul>


                    {{-- Adresse input --}}
                    <div class="mt-8">
                        <label for="adresse" class="text-sm text-gray-600 ">Adresse de livraison: <span
                                class="text-xl text-red-600">*</span></label>
                        <input {{ $order->status_id !== 1 ? 'disabled' : '' }} name="adresse" value="{{ $adresse }}"
                            required type="Text" id="adresse" placeholder="Votre adresse ici"
                            class="w-full px-4 py-3 mt-2 text-sm text-gray-700 bg-white border border-gray-200 rounded-md font-bitter focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 disabled:bg-slate-200" />
                    </div>
                    {{-- End of Adresse input --}}
                    <div class="flex justify-end pt-8 mt-8 border-t border-gray-100">
                        <div class="w-screen max-w-lg space-y-4">
                            <dl class="space-y-2 text-sm text-gray-700 ">
                                <div class="flex justify-between text-lg font-bold">
                                    <dt>La somme totale</dt>
                                    <dd class="font-bitter">{{ $totalPrice }} DA</dd>
                                </div>
                                @if ($coupon_percentage)
                                    <div class="flex justify-between ">
                                        <dt>Pourcentage réduit</dt>
                                        <dd>- {{ $coupon_percentage }} %</dd>
                                    </div>
                                @endif

                                @if (isset($finalPrice))
                                    <div class="flex justify-between text-lg font-bold">
                                        <dt>Prix Final</dt>
                                        <dd class="font-bitter">{{ $finalPrice }} DA</dd>
                                    </div>
                                @endif
                            </dl>
                            <div class="flex justify-end">
                                @if ($order->status_id === 1)
                                    <button {{ $order->status_id !== 1 ? 'hidden' : '' }} type="submit"
                                        name="updateSubmit" value="updateSubmit"
                                        class="block px-5 py-3 mt-4 text-sm text-gray-100 transition bg-blue-700 rounded hover:bg-gray-600">
                                        Modifier l'adresse de la commande
                                    </button>
                                @endif
                            </div>

                        </div>
                    </div>
                </form>
                {{-- <div class="flex justify-end ">
                    <form action="/order/cancel" method="POST">
                        @csrf
                        <input hidden type="text" name="order_id" value="{{ $order->id }}" id="hiddenId2">
                        @if ($order->status_id === 1)
                            <button type="submit"
                                class="block px-5 py-3 mt-4 text-sm text-gray-100 transition bg-red-700 rounded hover:bg-red-900">
                                Supprimer la commande
                            </button>
                        @endif
                    </form>
                </div> --}}
        </div>
        @endif
    </div>
    </div>
@endsection
