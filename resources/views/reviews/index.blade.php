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
                        <p x-show="!isVisible" class="mt-4 text-black leading-relaxe">{{ $review->content }}
                        </p>
                        <!--Edit text area-->
                        <form action="/reviews/{{ $review->id }}/update" method="POST" class="mt-6">
                            @csrf
                            <textarea x-show="isVisible" name="review_modified" id="review_modified"
                                class="block w-full px-4 text-sm border border-gray-500 rounded-lg sm:p-5 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                                rows="4" placeholder="Votre avis ..."></textarea>
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
