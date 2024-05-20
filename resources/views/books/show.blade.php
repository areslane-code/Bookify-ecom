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

                  <form action="/cart/add" method="POST" class="mt-4">
                      @csrf
                      {{-- book_id input --}}
                      <input type="hidden" name="book_id" value="{{ $book->id }}">
                      <div class="max-w-sm space-y-3">
                          <div class="relative">
                              @php

                                  $cart = Session::get('cart');
                                  if (isset($cart)) {
                                      $key = false;
                                      foreach ($cart as $cartKey => $cartValue) {
                                          if ($cartKey == $book->id) {
                                              $key = true;
                                              break;
                                          }
                                      }
                                  }
                                  $quantity = isset($cart) && isset($cart[$book->id]) ? $cart[$book->id] : 1;
                              @endphp

                              {{-- book quantity input --}}
                              <input type="number" value="{{ $quantity }}" min="1"
                                  class="block w-full px-4 py-3 text-sm text-gray-500 bg-gray-100 border-transparent rounded-lg font-bitter peer ps-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                                  placeholder="Quantité" name="book_quantity">
                              <div
                                  class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                  <svg class="flex-shrink-0 text-gray-500 size-4 " fill="none" viewBox="0 0 24 24"
                                      stroke-width="1.5" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />

                                  </svg>
                              </div>
                          </div>

                          @if (!isset($key) || $key === false)
                              <button type="submit"
                                  class="flex items-center justify-center w-full px-4 py-3 mt-6 font-semibold text-white bg-blue-600 border border-transparent rounded-lg text-md gap-x-4 hover:bg-blue-700 font-raleway">
                                  <div type="button" class="flex items-center justify-center gap-x-2">
                                      Ajouter au<span class="material-symbols-outlined ">shopping_cart</span>
                                  </div>
                                  <span class="text-lg font-semibold font-bitter">{{ $book->price . ' ' . 'Da' }}</span>
                              </button>
                          @else
                              <button type="submit"
                                  class="flex items-center justify-center w-full px-4 py-3 mt-6 font-semibold text-white bg-blue-600 border border-transparent rounded-lg text-md gap-x-4 hover:bg-blue-700 font-raleway">
                                  <div type="button" class="flex items-center justify-center gap-x-2">
                                      Modifier la quantité dans le panier<span
                                          class="material-symbols-outlined ">shopping_cart</span>
                                  </div>
                              </button>
                          @endif

                          @if ($book->quantity <= 0)
                              <p class="p-2 mt-2 text-xs text-blue-600 bg-blue-100 rounded text-start ">Bien que ce
                                  livre
                                  soit
                                  actuellement
                                  en rupture
                                  de
                                  stock, vous avez la possibilité de
                                  l'ajouter à votre panier dès maintenant. Cependant, veuillez noter que les délais de
                                  livraison risquent d'être plus longs que d'habitude.</p>
                          @endif

                  </form>
              </div>
          </div>
          @if (!blank($similarBooks))
              <section class="w-full max-w-3xl mx-auto mt-20 ">
                  <h3 class="text-xl font-bold text-start lg:text-2xl">Livres similaires:</h3>
                  <div class="flex flex-wrap items-center justify-center gap-8 mt-10 sm:justify-start xl:gap-10">
                      @foreach ($similarBooks as $similarBook)
                          <x-card :book="$similarBook" />
                      @endforeach
                  </div>
              </section>
          @endif


          @auth
              @can('isUser')
                  <section class="w-full max-w-3xl mx-auto mt-20">
                      <form action="/book/{{ $book->id }}/create-review" method="POST">
                          @csrf

                          <label for="review_content" class="block mb-2 text-xl font-semibold text-start">Publier votre
                              avis</label>


                          <!-- Rating -->
                          <div class="flex flex-row-reverse items-center justify-end my-4">
                              <input id="hs-ratings-readonly-1" type="radio"
                                  class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                  name="rating" value="5">
                              <label for="hs-ratings-readonly-1"
                                  class="text-gray-300 pointer-events-none peer-checked:text-yellow-400 ">
                                  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" viewBox="0 0 16 16">
                                      <path
                                          d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                      </path>
                                  </svg>
                              </label>
                              <input id="hs-ratings-readonly-2" type="radio"
                                  class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                  name="rating" value="4">
                              <label for="hs-ratings-readonly-2"
                                  class="text-gray-300 pointer-events-none peer-checked:text-yellow-400 ">
                                  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" viewBox="0 0 16 16">
                                      <path
                                          d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                      </path>
                                  </svg>
                              </label>
                              <input id="hs-ratings-readonly-3" type="radio"
                                  class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                  name="rating" value="3">
                              <label for="hs-ratings-readonly-3"
                                  class="text-gray-300 pointer-events-none peer-checked:text-yellow-400 ">
                                  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                      fill="currentColor" viewBox="0 0 16 16">
                                      <path
                                          d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                      </path>
                                  </svg>
                              </label>
                              <input id="hs-ratings-readonly-4" type="radio"
                                  class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                  name="rating" value="2">
                              <label for="hs-ratings-readonly-4"
                                  class="text-gray-300 pointer-events-none peer-checked:text-yellow-400 ">
                                  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                      height="16" fill="currentColor" viewBox="0 0 16 16">
                                      <path
                                          d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                      </path>
                                  </svg>
                              </label>
                              <input id="hs-ratings-readonly-5" type="radio"
                                  class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                  name="rating" value="1" checked>
                              <label for="hs-ratings-readonly-5"
                                  class="text-gray-300 pointer-events-none peer-checked:text-yellow-400 ">
                                  <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                      height="16" fill="currentColor" viewBox="0 0 16 16">
                                      <path
                                          d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                      </path>
                                  </svg>
                              </label>
                          </div>
                          <!-- End Rating -->

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

          <section class="w-full max-w-3xl mx-auto mt-20">
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
              <div class="mt-8">
                  {{ $reviews->links() }}

              </div>
          </section>
      </div>
  @endsection
