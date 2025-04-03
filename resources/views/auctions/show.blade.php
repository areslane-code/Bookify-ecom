@extends('layout')

@section('main')
    <div class="container px-5 py-24 mx-auto">
        <!--Product info card-->
        <div class="flex flex-wrap justify-start mx-auto md:justify-center lg:w-4/5">
            <img alt="Book-cover" class="object-cover object-center w-full max-w-xs rounded h-96 md:w-1/2"
                src={{ asset(Storage::url($auction->book->image)) }}>
            <div class="w-full mt-10 md:w-1/2 md:pl-10 lg:pl-20 md:mt-0">
                <h1 class="mb-1 text-3xl font-semibold text-gray-900 font-bitter title-font">
                    {{ strtoupper($auction->book->title) }}</h1>

                <div class="mt-4">
                    <h5 class="font-medium text-black">Description:</h5>
                    <p class="leading-relaxed text-gray-600">{{ $auction->book->description }}</p>
                </div>

                <!-- Countdown Timer -->
                <div class="p-4 mt-4 bg-gray-100 rounded-lg">
                    <h5 class="mb-2 font-medium text-black">Fin d'enchére:</h5>
                    <div id="countdown-timer" class="text-2xl font-bold text-blue-600 font-bitter">
                        <!-- Timer will be displayed here -->
                    </div>
                </div>



                <form action="/auction/new-bid" method="POST" class="mt-4">
                    @csrf
                    {{-- book_id input --}}
                    <input type="hidden" name="bid_id" value="{{ $auction->id }}">

                    {{-- input of type number to put the auction amount --}}
                    <label for="bid_amount"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enchérissez</label>
                    <input type="number" id="bid_amount" name="bid_amount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 font-bitter text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Entrer votre prix" required min="{{ $auction->highest_bid + 1 }}"
                        value="{{ $auction->highest_bid + 1 }}" />


                    <button type="submit"
                        class="w-full px-5 py-3 mt-4 text-sm text-gray-100 transition bg-blue-700 rounded hover:bg-gray-600">
                        Encherir
                    </button>

                </form>
            </div>
        </div>
        <div class="flex justify-start mx-auto md:justify-center lg:w-4/5">
            {{-- List of bids --}}
            <div class="flex flex-wrap flex-1 gap-4 mt-8 rounded">
                @foreach ($bids as $bid)
                    <div class="w-full p-4 bg-gray-100">
                        <div class="flex justify-between">
                            <h4 class="text-sm font-semibold text-gray-900">
                                {{ $bid->user->lastname . ' ' . $bid->user->firstname }}</h4>
                            <h4 class="text-sm font-bold text-gray-900 font-bitter">{{ $bid->amount . 'DA' }}</h4>
                        </div>
                        <p class="text-sm text-gray-600">{{ $bid->user->email }}</p>
                    </div>
                @endforeach

                {{-- Pagination Links --}}
                <div class="w-full">
                    {{ $bids->links() }}
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript for Countdown Timer -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the auction end time from the server (you'll need to pass this from your controller)
            const auctionEndTime = new Date("{{ $auction->auction_final_date }}").getTime();

            // Update the countdown every second
            const countdownTimer = document.getElementById('countdown-timer');

            const timer = setInterval(function() {
                // Get current date and time
                const now = new Date().getTime();

                // Find the time remaining between now and the end time
                const timeRemaining = auctionEndTime - now;

                // If the auction has ended, stop the timer and display "Finished"
                if (timeRemaining <= 0) {
                    clearInterval(timer); // Stop the countdown
                    countdownTimer.innerHTML = "Términée";
                    return;
                }

                // Time calculations for days, hours, minutes, and seconds
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                // Display the result
                countdownTimer.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";

            }, 1000);
        });
    </script>
@endsection
