@extends('layout')

@section('main')
    <div class="w-full max-w-2xl px-8 py-4 mx-auto my-20">
        <div class="bg-white border border-gray-300 shadow-sm mt-7 rounded-xl">
            <div class="p-4 sm:p-7">
                <h1 class="block text-2xl font-bold text-center text-gray-800 ">Modifier vos informations</h1>

                <div class="mt-5">
                    <!-- Form -->
                    <form action="/account/update-infos" method="POST">
                        @csrf
                        <div class="grid gap-y-4">
                            <!-- Last Name Form Group -->
                            <div>
                                <label for="nom" class="block mb-2 text-sm ">Nom</label>

                                <input value="{{ $user->lastname }}" type="text" id="nom" name="nom"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">

                                <!-- Display Error Message -->
                                @error('nom')
                                    <p class="mt-2 text-xs text-red-600 " id="nom-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Last Name Form Group -->

                            <!-- First Name Form Group -->
                            <div>
                                <label for="prenom" class="block mb-2 text-sm ">Prénom</label>
                                <div class="relative">
                                    <input value={{ $user->firstname }} type="text" id="prenom" name="prenom"
                                        class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
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
                                <label for="telephone" class="block mb-2 text-sm ">
                                    Téléphone</label>
                                <div class="relative">
                                    <input value={{ $user->phoneNumber }} type="tel" id="telephone" name="telephone"
                                        class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg font-bitter focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
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
                                    <input value={{ $user->email }} type="email" id="email" name="email"
                                        class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                                </div>
                                @error('email')
                                    <p class="mt-2 text-xs text-red-600 " id="email-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->
                            <button type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Modifier informations</button>
                    </form>
                    <!-- Form Group -->
                    <form action="/account/update-password" method="POST">
                        @csrf
                        <h1 class="block my-4 text-2xl font-bold text-center text-gray-800">Changer votre mot de passe</h1>
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block mb-2 text-sm ">Ancien mot de passe</label>
                            </div>

                            <input type="password" id="oldPassword" name="oldPassword"
                                class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                                required aria-describedby="password-error">

                            @error('password_incorrect')
                                <p class="mt-2 text-xs text-red-600 " id="email-error">
                                    {{ $message }}</p>
                            @enderror
                            @error('oldPassword')
                                <p class="mt-2 text-xs text-red-600 " id="email-error">{{ $message }}</p>
                            @enderror
                            <div class="flex items-center justify-between">
                                <label for="password" class="block mt-4 mb-2 text-sm ">Nouveau Mot de passe</label>
                            </div>

                            <input type="password" id="newPassword" name="newPassword"
                                class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                                required aria-describedby="password-error">

                            @error('newPassword')
                                <p class="mt-2 text-xs text-red-600 " id="email-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="inline-flex items-center justify-center w-full px-4 py-3 mt-4 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Modifier mot de passe</button>
                    </form>

                    <!-- End Form Group -->
                </div>

                <!-- End Form -->
            </div>
        </div>
    </div>
    </div>
@endsection
