  @extends('layout')

  @section('main')
      <div class="container px-5 py-24 mx-auto">
          <!--Product info card-->
          <div class="flex flex-wrap justify-start mx-auto md:justify-center lg:w-4/5">
              <img alt="Book-cover" class="object-cover object-center w-full max-w-xs rounded h-96 md:w-1/2"
                  src={{ asset(Storage::url($book->image)) }}>
              <div class="w-full mt-10 md:w-1/2 md:pl-10 lg:pl-20 md:mt-0">
                  <h1 class="mb-1 text-3xl font-semibold text-gray-900 font-bitter title-font">
                      {{ strtoupper($book->title) }}</h1>

                  <div class="mt-4">
                      <h5 class="font-medium text-black">Auteur:</h5>
                      <p class="leading-relaxed text-gray-600">{{ $book->author }}</p>
                  </div>

                  <div class="mt-4">
                      <h5 class="font-medium text-black">Description:</h5>
                      <p class="leading-relaxed text-gray-600">{{ $book->description }}</p>
                  </div>

                  <div class="flex flex-wrap items-center gap-2 mt-4">
                      <h5 class="font-medium text-black">Catégories:</h5>
                      @foreach ($book->categories as $category)
                          <span class="p-1 text-xs rounded-lg bg-slate-100"> {{ $category->name }}</span>
                      @endforeach
                  </div>

                  <button onClick="addBookToCart({{ $book }})"
                      class="flex items-center justify-center w-full px-4 py-3 mt-6 font-semibold text-white bg-blue-600 border border-transparent rounded-lg text-md gap-x-4 hover:bg-blue-700 font-raleway">
                      <div type="button" class="flex items-center justify-center gap-x-2">
                          Ajouter au<span class="material-symbols-outlined ">shopping_cart</span>
                      </div>
                      <span class="text-lg font-semibold font-bitter">{{ $book->price . ' ' . 'Da' }}</span>
                  </button>

              </div>
          </div>
          @if (!blank($similarBooks))
              <section class="max-w-3xl mx-auto mt-20">
                  <h3 class="text-xl font-bold text-start lg:text-2xl">Livres similaires:</h3>
                  <div class="flex flex-wrap items-center justify-center gap-8 mt-10 sm:justify-start xl:gap-10">
                      @foreach ($similarBooks as $similarBook)
                          <x-card :book="$similarBook" />
                      @endforeach
                  </div>
              </section>
          @endif
          <section class="max-w-3xl mx-auto mt-20">
              <h3 class="text-xl font-bold text-start lg:text-2xl">Avis des utilisateurs:</h3>
              @if (blank($reviews))
                  <p class="mt-4">Aucun avis est disponible pour ce livre pour le moment.</p>
              @else
                  <div class="flex flex-wrap items-stretch justify-center gap-8 mt-10 sm:justify-start xl:gap-10">
                      @foreach ($reviews as $review)
                          <x-review :review="$review" />
                      @endforeach
                  </div>
              @endif
          </section>

          @auth
              @can('isUser')
                  <section class="max-w-3xl mx-auto mt-20">
                      <form action="/book/{{ $book->id }}/create-review" method="POST">
                          @csrf
                          <label for="review_content" class="block mb-2 text-xl font-semibold text-start">Publier votre
                              avis</label>
                          <textarea name="review_content" id="review_content"
                              class="block w-full px-4 py-3 mt-4 text-sm border border-gray-500 rounded-lg sm:p-5 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                              rows="4" placeholder="Votre avis ..."></textarea>
                          <div class="flex justify-end">
                              <button class="w-full p-2 mt-4 text-white bg-blue-600 rounded hover:bg-blue-700 md:max-w-60"
                                  type="submit">Publier</button>
                          </div>

                      </form>
                  </section>
              @endcan
          @endauth
      </div>
  @endsection
