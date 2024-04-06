  @extends('layout')

  @section('main')
      <div class="w-full max-w-lg px-8 py-4 mx-auto mt-12">
          <div class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl">
              <div class="p-4 sm:p-7">
                  <div class="text-center">
                      <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Se connecter</h1>
                      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                          Vous n'avez pas un compte?
                          <a class="font-medium text-blue-600 decoration-2 hover:underline" href="/singup">
                              créer le ici
                          </a>
                      </p>
                  </div>

                  <div class="mt-5">
                      <!-- Form -->
                      <form action="/login" method="POST">
                          @csrf
                          <div class="grid gap-y-4">
                              <!-- Form Group -->
                              <div>
                                  <label for="email" class="block mb-2 text-sm dark:text-white">Email</label>
                                  <div class="relative">
                                      <input type="email" id="email" name="email"
                                          class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                          required>
                                      <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                          <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                              viewBox="0 0 16 16" aria-hidden="true">
                                              <path
                                                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                          </svg>
                                      </div>
                                  </div>
                                  @error('email')
                                      <p class="mt-2 text-xs text-red-600 " id="email-error">{{ $message }}</p>
                                  @enderror
                              </div>
                              <!-- End Form Group -->

                              <!-- Form Group -->
                              <div>
                                  <div class="flex items-center justify-between">
                                      <label for="password" class="block mb-2 text-sm dark:text-white">Mot de passe</label>
                                  </div>
                                  <div class="relative">
                                      <input type="password" id="password" name="password"
                                          class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                          required aria-describedby="password-error">
                                      <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                          <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                              viewBox="0 0 16 16" aria-hidden="true">
                                              <path
                                                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                          </svg>
                                      </div>
                                  </div>
                                  @error('password')
                                      <p class="mt-2 text-xs text-red-600 " id="email-error">{{ $message }}</p>
                                  @enderror
                              </div>
                              <!-- End Form Group -->
                              <button type="submit"
                                  class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                  Se connecter</button>
                          </div>
                          @if ($errors->has('role'))
                              <p class="mt-4 text-sm text-center text-red-600">
                                  {{ $errors->first('role') }}
                              </p>
                          @endif
                      </form>
                      <!-- End Form -->
                  </div>
              </div>
          </div>
      </div>
  @endsection
