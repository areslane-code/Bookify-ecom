@props(['review'])

<div class="w-full p-4 md:w-1/3">
    <div class="h-full p-8 bg-blue-600 rounded">
        <span class="text-3xl text-gray-200 material-symbols-outlined">
            reviews
        </span>
        <p class="mb-6 leading-relaxed text-white">{{ $review->content }}</p>
        <div class="flex items-center text-white gap-x-2">
            @isset($review->user->lastname)
                <a>
                    <span class="text-sm font-medium title-font font-bitter">{{ $review->user->lastname }}</span>
                </a>
            @endisset
            @isset($review->user->firstname)
                <a>
                    <span class="text-sm font-medium title-font font-bitter">{{ $review->user->firstname }}</span>
                </a>
            @endisset
        </div>

    </div>
</div>
