  @extends('layout')

  @section('main')
      <!--Books section-->
      <section class="grid px-4 py-24 place-items-center">
          <!-- section title-->
          @if ($auctions->count() > 0)
              <h3 class="text-2xl font-bold text-center lg:text-3xl xl:text-5xl">Nos Enchéres</h3>
              <div class="flex flex-wrap items-center justify-center w-full gap-8 mt-20 xl:gap-10">
                  @foreach ($auctions as $auction)
                      <x-auction-card :auction="$auction" />
                  @endforeach
              </div>
          @else
              <div>
                  <img class="w-full max-w-sm mx-auto" src={{ asset(Storage::url('not_found.svg')) }}
                      alt="Liste de commande vide">
                  <p class="mt-6 text-xl text-center md:text-2xl lg:text-3xl">Il y'a pas d'enchéres
                      <br> pour le moment
                  </p>
              </div>
          @endif
      </section>
  @endsection
