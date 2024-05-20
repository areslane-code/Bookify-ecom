  @extends('layout')

  @section('main')
      @if (isset($coupons) && !blank($coupons))
          {
          <div class="grid w-full max-w-xl gap-2 p-4 mx-auto my-8 font-bitter ">
              @foreach ($coupons as $coupon)
                  <div class="flex flex-col w-full bg-white border shadow-sm rounded-xl bg">
                      <div class="p-4 md:p-5">
                          <h3 class="text-lg font-bold text-gray-800">
                              {{ $coupon->code }}
                          </h3>
                          <p class="mt-2 text-gray-500 ">
                              Pourcentage de réduction : {{ $coupon->percentage . '%' }}
                          </p>
                          <p
                              class="inline-flex items-center mt-4 text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-1 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none ">
                              Date d'expiration : {{ $coupon->expires_at }}
                          </p>
                          <p class="mt-2">
                              État :
                              @php
                                  if ($coupon->used_before === true) {
                                      echo '<span class="p-1 text-sm text-red-600 bg-red-100 rounded"> Non disponible : déja utilisé </span>';
                                  } else {
                                      echo '<span class="p-1 text-sm text-green-600 bg-green-100 rounded" > Disponible  </span>';
                                  }
                              @endphp
                          </p>
                      </div>
                  </div>
              @endforeach
          </div>
          }
      @else
          <div class="grid w-full max-w-xl gap-2 p-4 mx-auto my-8 text-xl lg:text-2xl font-bitter ">
              Aucun code de promotion n'est disponible pour le moment
          </div>
      @endif

  @endsection
