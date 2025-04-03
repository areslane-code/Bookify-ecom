@props(['auction'])
<div id={{ $auction->id }} class="w-40 transition duration-300 hover:scale-110">
    <a class="relative block w-full h-48 overflow-hidden rounded justify-self-center">
        <img alt="Couverture de livre" class="block object-cover object-center w-full h-full"
            src={{ asset('storage/' . $auction->book->image) }}>
    </a>
    <div class="mt-4">
        <h2 class="max-w-full text-lg font-medium text-gray-900 truncate title-font">{{ $auction->book->title }}</h2>
        <h3 class="my-2 text-xs tracking-widest text-gray-500 truncate title-font">{{ $auction->book->description }}</h3>
        <p class="text-sm font-bitter">dernier prix :{{ $auction->highest_bid . ' ' . 'DA' }}</p>
        <div class="mt-2 font-semibold text-red-400 font-bitter">Fin d'enchére le : {{ $auction->auction_final_date }}
        </div>
    </div>
</div>

<script>
    document.getElementById({{ $auction->id }}).addEventListener("click", function() {
        window.location.href = "/auction/" + {{ $auction->id }} + "/show";
    });
</script>
