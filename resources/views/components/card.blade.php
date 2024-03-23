@props(["user"])

<div class="bg-red-300 flex flex-col border shadow-sm rounded-xl p-4 md:p-5 dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
  <h3 class="text-lg font-bold text-gray-800 dark:text-white">
    {{$user->name}}
  </h3>
  <p class="mt-1 text-xs font-medium text-gray-500 uppercase dark:text-gray-500">
    {{$user->email}}
  </p>
  <p class="mt-2 text-gray-500 dark:text-gray-400">
   {{$user->password}}
  </p>
  <a class="inline-flex items-center mt-3 text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-1 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
    Card link
    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
  </a>
</div>

