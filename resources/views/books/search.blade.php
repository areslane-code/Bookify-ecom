  <!--Books section-->
  @extends('layout')

  @section('main')
      <div class="grid px-4 py-24 place-items-center">
          <!-- section title-->
          <h3 class="text-2xl font-bold text-center lg:text-3xl xl:text-5xl">Résultat de la recherche:</h3>
          <div class="flex flex-wrap items-center justify-center w-full gap-8 mt-10 xl:gap-10">
              @if ($books->isEmpty())
                  <div class="mb-8">
                      <p class="text-xl text-center text-black lg:text-2xl">
                          Oups, aucun résultat ne correspond à votre recherche
                      </p>
                      <img class="mx-auto mt-8 w-80" src={{ Storage::url('search.svg') }}>
                  </div>
              @else
                  @foreach ($books as $book)
                      <x-card :book="$book" />
                  @endforeach
              @endif
          </div>
      </div>
  @endsection
