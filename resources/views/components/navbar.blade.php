<!-- ========== HEADER ========== -->
<header x-data="{open:false}"  class="sticky z-50 flex flex-wrap w-full py-3 text-sm bg-blue-600 sm:justify-start sm:flex-nowrap sm:py-0">
  <nav  class="relative max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8" aria-label="Global">
    <div class="flex items-center justify-between">
      <a class="flex-none text-xl font-bold text-white" href="#" aria-label="Brand">Bookify</a>
     
      <div class="flex items-center justify-center sm:hidden gap-x-4">
        <a class=" material-symbols-outlined text-md text-white/[.8] ahover:text-white " href="#">shopping_cart</a>
        <button x-on:click="open = ! open" type="button" class="flex items-center justify-center text-sm font-semibold text-white border rounded-lg hs-collapse-toggle size-9 gap-x-2 border-white/20 hover:border-white/40 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
          <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="flex-shrink-0 hidden hs-collapse-open:block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <!--Large devices-->
    <div   id="navbar-collapse-with-animation" class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:block">
      <div class="flex flex-col mt-5 gap-y-4 gap-x-0 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
        <a class="font-medium text-white sm:py-6" href="/" aria-current="page">Accueil</a>
        <a class="material-symbols-outlined text-md text-white/[.8] ahover:text-white " href="#">shopping_cart</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">Commandes</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">Avis</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">Compte</a>
        <a class="flex items-center gap-x-2 font-medium text-white/[.8] hover:text-white sm:border-s sm:border-white/[.3] sm:my-6 sm:ps-6" href="#">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          se connecter
        </a>
      </div>
    </div>
    <!--Small devices-->
      <div x-show="open"   id="navbar-collapse-with-animation" class="block overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:hidden">
      <div class="flex flex-col mt-5 gap-y-4 gap-x-0 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
        <a class="font-medium text-white sm:py-6" href="/" aria-current="page">Accueil</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">Commandes</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">Avis</a>
        <a class="font-medium text-white/[.8] hover:text-white sm:py-6" href="#">Compte</a>
        <a class="flex items-center gap-x-2 font-medium text-white/[.8] hover:text-white sm:border-s sm:border-white/[.3] sm:my-6 sm:ps-6" href="#">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          Se connecter
        </a>
      </div>
    </div>
  </nav>
</header>
<!-- ========== END HEADER ========== -->