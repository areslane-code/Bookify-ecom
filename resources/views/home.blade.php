@extends('layout')

@section('main')
    <!-- Hero -->
    <div
        class="relative overflow-hidden before:absolute before:top-0 before:start-1/2 before:bg-[url('https://preline.co/assets/svg/examples/squared-bg-element.svg')] before:bg-no-repeat before:bg-top before:size-full before:-z-[1] before:transform before:-translate-x-1/2 dark:before:bg-[url('https://preline.co/assets/svg/examples-dark/squared-bg-element.svg')]">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-10">
            <!-- Title -->
            <div class="max-w-xl mx-auto mt-5 text-center">
                <h1 class="block text-4xl font-bold text-gray-800 md:text-5xl lg:text-6xl dark:text-gray-200">
                    Découvrez l'univers infini des livres chez <br>BOOKIFY
                </h1>
            </div>
            <!-- End Title -->

            <div class="max-w-3xl mx-auto mt-5 text-center">
                <p class="text-lg text-gray-600 dark:text-gray-400">Explorez notre collection diverse, de la fiction à la
                    non-fiction. Trouvez le livre parfait pour chaque passion chez Bookify.</p>
            </div>

            <!-- Announcement Banner -->
            <div class="flex justify-center">
                <a class="inline-flex items-center p-2 px-3 mt-4 text-xs text-gray-600 transition bg-white border border-gray-200 rounded-full gap-x-2 hover:border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:hover:border-gray-600 dark:text-gray-400"
                    href="#">
                    Vous ne pouvez acheter que si vous avez un compte.
                </a>
            </div>
            <!-- End Announcement Banner -->

            @guest
                <!-- Buttons -->
                <div class="flex justify-center gap-3 mt-4">
                    <a class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-center text-white border border-transparent rounded-full gap-x-3 bg-gradient-to-tl from-blue-600 to-violet-600 hover:from-violet-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-800"
                        href="/signup">
                        Rejoignez Nous
                    </a>
                </div>
                <!-- End Buttons -->
            @endguest
        </div>
    </div>
    <!-- End Hero -->

    <!--Books section-->
    <section class="grid px-4 py-24 place-items-center">
        <!-- section title-->
        <h3 class="text-2xl font-bold text-center lg:text-3xl xl:text-5xl">Explorer Nos livres</h3>
        <div class="flex flex-wrap items-center justify-center w-full gap-8 mt-20 xl:gap-10">
            @foreach ($books as $book)
                <x-card :book="$book" />
            @endforeach
        </div>
    </section>
@endsection
