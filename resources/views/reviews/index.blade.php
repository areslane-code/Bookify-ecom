@extends('layout')

@section('main')
    <div class="flex flex-wrap items-stretch justify-center gap-4 px-4 py-24">
        @if (!blank($userReviews))
            @foreach ($userReviews as $review)
                <div x-data="{ isVisible: false }" class ="relative max-w-xs p-4 shadow-md bg-slate-50 md:w-1/3">
                    <div class="h-full max-w-xs p-8 rounded">
                        <img class="object-cover h-32 w-28" src={{ asset(Storage::url($review->book->image)) }}
                            alt="">
                        <h3 class="mt-4 font-semibold text-black leading-relaxe">{{ $review->book->title }}</h3>
                        <div x-show="!isVisible" class="flex items-center my-4 space-x-2 text-yellow-400">
                            <span class="text-xl font-bold">{{ $review->rating }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-5 h-5 text-xs fill-current">
                                <path
                                    d="M494,198.671a40.536,40.536,0,0,0-32.174-27.592L345.917,152.242,292.185,47.828a40.7,40.7,0,0,0-72.37,0L166.083,152.242,50.176,171.079a40.7,40.7,0,0,0-22.364,68.827l82.7,83.368-17.9,116.055a40.672,40.672,0,0,0,58.548,42.538L256,428.977l104.843,52.89a40.69,40.69,0,0,0,58.548-42.538l-17.9-116.055,82.7-83.368A40.538,40.538,0,0,0,494,198.671Zm-32.53,18.7L367.4,312.2l20.364,132.01a8.671,8.671,0,0,1-12.509,9.088L256,393.136,136.744,453.3a8.671,8.671,0,0,1-12.509-9.088L144.6,312.2,50.531,217.37a8.7,8.7,0,0,1,4.778-14.706L187.15,181.238,248.269,62.471a8.694,8.694,0,0,1,15.462,0L324.85,181.238l131.841,21.426A8.7,8.7,0,0,1,461.469,217.37Z">
                                </path>
                            </svg>
                        </div>
                        <p x-show="!isVisible" class="mt-4 text-black leading-relaxe">{{ $review->content }}
                        </p>
                        <!--Edit text area-->
                        <form action="/reviews/{{ $review->id }}/update" method="POST" class="mt-6">
                            @csrf
                            <!-- Rating -->
                            <div x-show="isVisible" class="flex flex-row-reverse items-center justify-end my-4">
                                <input id="hs-ratings-readonly-1" type="radio"
                                    class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                    name="rating" value="5" {{ $review->rating === 5 ? 'checked' : '' }}>
                                <label for="hs-ratings-readonly-1"
                                    class="text-gray-300 pointer-events-none peer-checked:text-yellow-400 ">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                        </path>
                                    </svg>
                                </label>
                                <input id="hs-ratings-readonly-2" type="radio"
                                    class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                    name="rating" value="4" {{ $review->rating === 4 ? 'checked' : '' }}>
                                <label for="hs-ratings-readonly-2"
                                    class="text-gray-300 pointer-events-none peer-checked:text-yellow-400 ">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                        </path>
                                    </svg>
                                </label>
                                <input id="hs-ratings-readonly-3" type="radio"
                                    class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                    name="rating" value="3" {{ $review->rating === 3 ? 'checked' : '' }}>
                                <label for="hs-ratings-readonly-3"
                                    class="text-gray-300 pointer-events-none peer-checked:text-yellow-400 ">
                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                        </path>
                                    </svg>
                                </label>
                                <input id="hs-ratings-readonly-4" type="radio"
                                    class="text-transparent bg-transparent border-0 appearance-none cursor-pointer peer -ms-5 size-5 checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                                    name="rating" value="2" {{ $review->rating === 2 ? 'checked' : '' }}>
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
                                    name="rating" value="1" {{ $review->rating === 1 ? 'checked' : '' }}>
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
                            <textarea x-show="isVisible" name="review_modified" id="review_modified"
                                class="block w-full px-4 text-sm border border-gray-500 rounded-lg text-start sm:p-5 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                rows="4">{{ $review->content }}</textarea>
                            <button @click=" isVisible = !isVisible" x-show="isVisible" type="submit"
                                href="/reviews/{{ $review->id }}/update"
                                class="absolute text-blue-600 top-10 right-12 material-symbols-outlined">
                                save
                            </button>
                        </form>
                    </div>
                    <!--edit and delete buttons-->
                    <form action="/reviews/{{ $review->id }}/delete" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="absolute text-red-600 top-10 right-3 material-symbols-outlined">
                            delete
                        </button>
                    </form>
                    <button @click=" isVisible = !isVisible" x-show="!isVisible"
                        class="absolute text-blue-600 right-3 top-20 md:top-10 md:right-12 material-symbols-outlined">
                        edit
                    </button>
                </div>
            @endforeach
        @else
            <p class="my-32 text-4xl font-medium text-center">vous n'avez publier aucun commentaire !</p>
        @endif
    </div>
@endsection
