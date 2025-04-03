@extends('layout')

@section('main')
    <div class="container px-5 py-24 mx-auto">
        <!--Product info card-->
        <div class="flex flex-wrap justify-start mx-auto md:justify-center lg:w-4/5">
            <img alt="Book-cover" class="object-cover object-center w-full max-w-xs rounded h-96 md:w-1/2"
                src={{ asset(Storage::url($auction->book->image)) }}>
            <div class="w-full mt-10 md:w-1/2 md:pl-10 lg:pl-20 md:mt-0">
                <h1 class="mb-1 text-3xl font-semibold text-gray-900 font-bitter title-font">
                    {{ strtoupper($auction->book->title) }}</h1>

                <div class="mt-4">
                    <h5 class="font-medium text-black">Auteur:</h5>
                    <p class="leading-relaxed text-gray-600">{{ $auction->book->author }}</p>
                </div>

                <div class="mt-4">
                    <h5 class="font-medium text-black">Description:</h5>
                    <p class="leading-relaxed text-gray-600">{{ $auction->book->description }}</p>
                </div>

                <div class="mt-4">
                    <h5 class="font-medium text-black">Prix:</h5>
                    <p class="text-xl font-bold leading-relaxed text-gray-600 font-bitter ">
                        {{ $auction->winning_price . ' ' . 'Da' }}
                    </p>
                </div>

                <form action="/auction/pay" method="POST" class="mt-4">
                    @csrf
                    {{-- auction_id input --}}
                    <input type="hidden" name="auction_id" value="{{ $auction->id }}">

                    {{-- address input --}}
                    <div class="mt-8">
                        <label for="adresse" class="text-sm text-gray-600 ">Adresse de livraison: <span
                                class="text-xl text-red-600">*</span></label>
                        <input required type="Text" name="adresse" id="adresse"
                            placeholder="Entrez votre adresse de livraison ici"
                            class="w-full px-4 py-3 mt-2 text-sm text-gray-700 bg-white border border-gray-400 rounded-md font-bitter focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 disabled:bg-slate-200" />

                    </div>

                    <button type="submit" class="w-full p-2 mt-4 font-semibold text-white bg-blue-700 rounded">
                        Commander
                    </button>
                </form>
            </div>
        </div>
    @endsection
