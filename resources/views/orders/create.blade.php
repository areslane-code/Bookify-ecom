@extends('layout')



@section('main')
    <section class="my-20">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:py-24 lg:px-8">
            <div class="max-w-3xl mx-auto">
                @if (isset($books) && !blank($books))
                    <header class="text-center">
                        <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Votre panier</h1>
                    </header>
                    <div action="" method="POST" class="mt-8">
                        <ul class="space-y-4">
                            @foreach ($books as $book)
                                <!-- Book-->
                                <li id="{{ $book->id }} " class="flex items-center gap-4">
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

                                    <div class="flex items-center justify-end flex-1 gap-2">
                                        <form>
                                            <label for="Line1Qty" class="sr-only"> Quantity </label>

                                            <input type="number" min="1" value="1" id="Line1Qty"
                                                class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                        </form>

                                        <form action="/orders/cart/delete-item/{{ $book->id }}" method="GET">
                                            @csrf
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

                        <div class="flex justify-end pt-8 mt-8 border-t border-gray-100">
                            <div class="w-screen max-w-lg space-y-4">
                                <dl class="space-y-0.5 text-sm text-gray-700">


                                    <div class="flex justify-between">
                                        <dt>Prix Totale</dt>
                                        <dd>£25</dd>
                                    </div>

                                    <div class="flex justify-between">
                                        <dt>Discount</dt>
                                        <dd>-£20</dd>
                                    </div>

                                    <div class="flex justify-between text-lg font-bold">
                                        <dt>Prix Finale</dt>
                                        <dd class="font-bitter">{{ $totalPrice }} DA</dd>
                                    </div>
                                </dl>



                                <div class="flex justify-end">
                                    <a href="#"
                                        class="block px-5 py-3 mt-4 text-sm text-gray-100 transition bg-blue-700 rounded hover:bg-gray-600">
                                        Commander
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </section>
@endsection
