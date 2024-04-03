@props(['book'])
<div id={{ $book->id }} class="w-40 transition duration-300 hover:scale-110">
    <a class="relative block w-full h-48 overflow-hidden rounded justify-self-center">
        <img alt="ecommerce" class="block object-cover object-center w-full h-full"
            src={{ asset(Storage::url($book->image)) }}>
    </a>
    <div class="mt-4">
        <h2 class="max-w-full text-lg font-medium text-gray-900 truncate title-font">{{ $book->title }}</h2>
        <h3 class="my-2 text-xs tracking-widest text-gray-500 title-font">{{ $book->author }}</h3>
        <p class="text-sm font-semibold font-bitter">{{ $book->price . ' ' . 'DA' }}</p>
    </div>
</div>

<script>
    document.getElementById({{ $book->id }}).addEventListener("click", function() {
        window.location.href = "/book/" + {{ $book->id }};
    });
</script>
