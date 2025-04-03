@extends('layout')



@section('main')
    <div class="relative max-w-screen-xl px-4 py-8 mx-auto my-20 sm:px-6 sm:py-12 lg:py-24 lg:px-8" x-data="{ showCouponForm: false }">
        <div class="max-w-3xl mx-auto">
            @if (isset($books) && !blank($books))
                <header class="text-center">
                    <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Votre panier</h1>
                </header>
                <div class="mt-8">
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

                                <div class="flex items-center justify-end flex-1 gap-4">
                                    <p class="text-xs text-center text-gray-500 font-bitter">
                                        {{ $book->order_quantity }}
                                    </p>

                                    <form action="/orders/cart/delete-item/{{ $book->id }}" method="GET">
                                        <button type="submit" class="text-gray-600 transition hover:text-red-600">
                                            <span class="sr-only">Remove item</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <form action="/order/pay" method="POST" class="mt-4">
                        @csrf
                        {{-- Adresse input --}}
                        <div class="mt-8">
                            <label for="adresse" class="text-sm text-gray-600 ">Adresse de livraison: <span
                                    class="text-xl text-red-600">*</span></label>
                            <input required type="Text" name="adresse" id="adresse" placeholder="Votre adresse ici"
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

                                {{-- <div class="flex justify-end">
                                    <button type="submit"
                                        class="block px-5 py-3 mt-4 text-sm text-gray-100 transition bg-blue-700 rounded hover:bg-gray-600">
                                        Commander : payment a la livraison
                                    </button>
                                </div> --}}
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="block px-5 py-3 mt-4 text-sm text-gray-100 transition bg-blue-700 rounded hover:bg-gray-600">
                                        Commander
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- coupon form --}}
                <p class="text-xs text-left text-gray-500">
                    Vous possédez un code de promo?
                    Insérez le ici.
                </p>
                <form @if (session('coupon') === null) action="/check-coupon" @else action="/cancel-coupon" @endif
                    method="POST" class="mt-2">
                    @csrf
                    <div class="flex flex-wrap items-center justify-between p-2 bg-blue-50 sm:flex-nowrap">
                        <input type="Text" name="coupon" id="coupon" placeholder="CodeDePromo"
                            @if (session('coupon') !== null) disabled value={{ session('coupon')->code }} @endif
                            class="w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md sm:max-w-xs font-bitter focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 disabled:bg-slate-200" />

                        @if (session('coupon') === null)
                            <button type="submit"
                                class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-green-600 rounded-md sm:mt-0 sm:w-fit hover:bg-green-700 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                Appliquer
                            </button>
                        @else
                            @method('DELETE')
                            <button type="submit"
                                class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-red-600 rounded-md sm:mt-0 sm:w-fit hover:bg-red-700 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                Annuler
                            </button>
                        @endif
                    </div>
                    @error('coupon')
                        <div class="mt-2 text-sm text-red-700">{{ $message }}
                        </div>
                    @enderror

                </form>
                @if (session('coupon_message') !== null)
                    <div class="p-3 mt-4 text-center text-white rounded "
                        style="background-color: {{ session('coupon_message_color') }}">
                        {{ session('coupon_message') }}
                    </div>
                @endif
            @else
                <h3 class="mb-8 text-xl font-semibold text-center sm:text-2xl lg:text-3xl">Votre panier ne contient
                    aucun article.
                    <br> Ajoutez
                    des
                    livres pour continuer votre achat.
                </h3>
                <img src={{ Storage::url('empty_cart.svg') }} alt="empty cart image" class="mx-auto max-h-60">
            @endif
        </div>
    </div>
@endsection
