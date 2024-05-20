@php
    $cart = session('cart');
    $cart_length = 0;
    if (isset($cart)) {
        $cart_length = count($cart);
    }
@endphp
<!-- ========== HEADER ========== -->
<header class="relative">
    <div x-data="{ open: false }"
        class="sticky z-50 flex flex-wrap w-full py-3 text-sm bg-blue-600 sm:justify-start sm:flex-nowrap sm:py-0">
        <nav class="relative max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
            aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-bold text-white lg:text-3xl" href="/" aria-label="Brand">Bookify</a>

                <div class="flex items-center justify-center sm:hidden gap-x-4">

                    @can('isUser')
                        <div class="relative">
                            <a href="/orders/create"
                                class=" material-symbols-outlined text-md text-white/[.8] ahover:text-white ">
                                shopping_cart
                            </a>
                            <p class="absolute px-2 py-1 text-xs font-semibold text-blue-700 bg-white rounded-full bottom-4 right-6"
                                id="cart-items-number-1">{{ $cart_length }}</p>
                        </div>
                    @endcan

                    <button x-on:click="open = ! open" type="button"
                        class="flex items-center justify-center text-sm font-semibold text-white border rounded-lg hs-collapse-toggle size-9 gap-x-2 border-white/20 hover:border-white/40 disabled:opacity-50 disabled:pointer-events-none "
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <!--Large devices-->
            <div id="navbar-collapse-with-animation"
                class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:block">
                <div
                    class="flex flex-col mt-5 gap-y-4 gap-x-0 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                    <a class="font-medium text-white sm:py-6" href="/" aria-current="page">Accueil</a>

                    @can('isUser')
                        <div class="relative">
                            <a href="/orders/create"
                                class="material-symbols-outlined text-md text-white/[.8] ahover:text-white ">shopping_cart
                            </a>
                            <!--cart items number-->
                            <p class="absolute px-[0.5rem] py-[0.15rem] text-xs font-semibold text-blue-700 bg-white rounded-full bottom-4 right-6"
                                id="cart-items-number-2">{{ $cart_length }}</p>
                        </div>
                    @endcan
                    @can('isUser')
                        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="/orders">Commandes</a>
                        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="/coupons">Promos</a>
                        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="/reviews">Avis</a>
                        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="/account">Compte</a>
                    @endcan
                    @auth
                        <form action="/logout" action="POST">
                            <button type="submit"
                                class="flex items-center gap-x-2 font-medium text-white/[.8] hover:text-white sm:border-s sm:border-white/[.3] sm:my-6 sm:ps-6">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                se deconnecter
                            </button>
                        </form>
                    @else
                        <a class="flex items-center gap-x-2 font-medium text-white/[.8] hover:text-white sm:border-s sm:border-white/[.3] sm:my-6 sm:ps-6"
                            href="/login">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            se connecter
                        </a>
                    @endauth
                </div>

            </div>
            <!--Small devices-->
            <div x-show="open" id="navbar-collapse-with-animation"
                class="block overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:hidden">
                <div
                    class="flex flex-col mt-5 gap-y-4 gap-x-0 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                    <a class="font-medium text-white sm:py-6" href="/" aria-current="page">Accueil</a>
                    @can('isUser')
                        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="/orders">Commandes</a>
                        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="/coupons">Promos</a>
                        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="/reviews">Avis</a>
                        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="/account">Compte</a>
                    @endcan
                    @auth
                        <form action="/logout" action="POST">
                            <button type="submit"
                                class="flex items-center gap-x-2 font-medium text-white/[.8] hover:text-white sm:border-s sm:border-white/[.3] sm:my-6 sm:ps-6">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                se deconnecter
                            </button>
                        </form>
                    @else
                        <a class="flex items-center gap-x-2 font-medium text-white/[.8] hover:text-white sm:border-s sm:border-white/[.3] sm:my-6 sm:ps-6"
                            href="/login">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            Se connecter
                        </a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
    <div class="w-full px-4 pt-2 pb-4 bg-blue-600">
        <form action="/book" method="GET" class="flex rounded-lg shadow-sm 0 sm:w-1/2 sm:mx-auto">
            <button type="submit"
                class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-s-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none ">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </button>
            <input type="text" id="search" placeholder="Rechercher un livre" name="search"
                class="block w-full px-4 py-3 text-sm border-gray-200 shadow-sm lg:mx-auto rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
            <!-- End Select -->

        </form>
    </div>
</header>

<div id="notification" class="fixed hidden p-4 text-white bg-blue-500 rounded gap-x-2 top-10 md:top-40 right-5 w-60">
    <span class="material-symbols-outlined">
        done
    </span>
    <div id="notification-message"></div>
</div>

@php
    $message = session('message');
    if (isset($message)) {
        echo '<script>
            let notification = document.getElementById(\'notification\');
                    let notificationMessage = document.getElementById(\'notification-message\');
                            notificationMessage.innerText = "' . $message . '";; notification.style.display = \'flex\';
                            setTimeout(function() {
                                notification.style.display = \'none\';
                            }, 1000); // Hide after 1 seconds
        </script>';
    }
@endphp
<!-- ========== END HEADER ========== -->
