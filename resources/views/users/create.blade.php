@extends('layout')

@section('main')
    <div class="w-full max-w-lg px-8 py-4 mx-auto my-20">
        <div class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 ">Créer un compte</h1>
                    <p class="mt-2 text-sm text-gray-600 ">
                        Vous avez déja un compte?
                        <a class="font-medium text-blue-600 decoration-2 hover:underline" href="/login">
                            se connecter
                        </a>
                    </p>
                </div>

                <div class="mt-5">
                    <!-- Form -->
                    <form action="/signup-check" method="POST">
                        @csrf
                        <div class="grid gap-y-4">
                            <!-- Last Name Form Group -->
                            <div>
                                <label for="nom" class="block mb-2 text-sm ">Nom</label>
                                <div class="relative">
                                    <input type="text" id="nom" name="nom"
                                        class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                                        required>
                                    <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                        <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                            viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- Display Error Message -->
                                @error('nom')
                                    <p class="mt-2 text-xs text-red-600 " id="nom-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Last Name Form Group -->

                            <!-- First Name Form Group -->
                            <div>
                                <label for="prenom" class="block mb-2 text-sm ">Prenom</label>
                                <div class="relative">
                                    <input type="text" id="prenom" name="prenom"
                                        class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                                        required>
                                    <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                        <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                            viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- Display Error Message -->
                                <!-- You can replace 'prenom' with the appropriate variable for error handling -->
                                @error('prenom')
                                    <p class="mt-2 text-xs text-red-600 " id="prenom-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End First Name Form Group -->

                            <!-- Phone Number Form Group -->
                            <div>
                                <label for="telephone" class="block mb-2 text-sm ">Numéro de
                                    téléphone</label>
                                <div class="relative">
                                    <input type="tel" id="telephone" name="telephone"
                                        class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                                        required>
                                    <div class="absolute inset-y-0 hidden pointer-events-none end-0 pe-3">
                                        <svg class="text-red-500 size-5" width="16" height="16" fill="currentColor"
                                            viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- Display Error Message -->
                                <!-- You can replace 'telephone' with the appropriate variable for error handling -->
                                @error('telephone')
                                    <p class="mt-2 text-xs text-red-600 " id="telephone-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Phone Number Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="email" class="block mb-2 text-sm ">Email</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
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
                                    <label for="password" class="block mb-2 text-sm ">Mot de passe</label>
                                </div>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
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
                                Créer mon compte</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
@endsection
