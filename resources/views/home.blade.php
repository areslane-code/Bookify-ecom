@extends('layout')

@section('main')
    <!-- Announcements section -->

    <div id="announcements-container" class="mt-6">

        <div id="announcement-display" class="mb-4">
            <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
                <div
                    class="bg-blue-600 bg-[url('https://preline.co/assets/svg/examples/abstract-1.svg')] bg-no-repeat bg-cover bg-center p-4 rounded-lg text-center">
                    <div class="">
                        <h2 class="mb-4 text-2xl font-bold text-white">Nouvelles Annonces</h2>
                        <p id="announcement-title" class="inline-block mt-2 text-xl font-semibold text-white"></p>
                        <p id="announcement-content" class="inline-block mt-2 text-white"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero -->
    <div
        class="relative overflow-hidden before:absolute before:top-0 before:start-1/2 before:bg-[url('https://preline.co/assets/svg/examples/squared-bg-element.svg')] before:bg-no-repeat before:bg-top before:size-full before:-z-[1] before:transform before:-translate-x-1/2 ">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-10">
            <!-- Title -->
            <div class="max-w-xl mx-auto mt-5 text-center">
                <h1 class="block text-4xl font-bold text-gray-800 md:text-5xl lg:text-6xl ">
                    Découvrez l'univers infini des livres chez <br>BOOKIFY
                </h1>
            </div>
            <!-- End Title -->

            <div class="max-w-3xl mx-auto mt-5 text-center">
                <p class="text-lg text-gray-600 ">Explorez notre collection diverse, de la fiction à la
                    non-fiction. Trouvez le livre parfait pour chaque passion chez Bookify.</p>
            </div>

            <!-- Announcement Banner -->
            <div class="flex justify-center">
                <a class="inline-flex items-center p-2 px-3 mt-4 text-xs text-gray-600 transition bg-white border border-gray-200 rounded-full gap-x-2 hover:border-gray-300 "
                    href="#">
                    Vous ne pouvez acheter que si vous avez un compte.
                </a>
            </div>
            <!-- End Announcement Banner -->

            @guest
                <!-- Buttons -->
                <div class="flex justify-center gap-3 mt-4">
                    <a class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-center text-white border border-transparent rounded-full gap-x-3 bg-gradient-to-tl from-blue-600 to-violet-600 hover:from-violet-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white "
                        href="/signup">
                        Rejoignez Nous
                    </a>
                </div>
                <!-- End Buttons -->
            @endguest
        </div>
    </div>



    <!-- End Hero -->

    <!--Books section-->
    <section class="grid px-4 py-24 place-items-center">
        <!-- section title-->
        <h3 class="text-2xl font-bold text-center lg:text-3xl xl:text-5xl">Explorer Nos livres</h3>
        <div class="flex flex-wrap items-center justify-center w-full gap-8 mt-20 xl:gap-10">
            @foreach ($books as $book)
                <x-card :book="$book" />
            @endforeach
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const announcementTitle = document.getElementById('announcement-title');
            const announcementContent = document.getElementById('announcement-content');

            // Fetch announcements from the Laravel API
            fetch('http://localhost:8080/api/announcements')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Get the three most recent announcements (sorted by `created_at` descending)
                    const recentAnnouncements = data
                        .sort((a, b) => new Date(b.created_at) - new Date(a.created_at)) // Sort by date
                        .slice(0, 3); // Take the first 3

                    if (recentAnnouncements.length === 0) {
                        announcementTitle.textContent = 'No announcements available.';
                        announcementContent.textContent = '';
                        return;
                    }

                    // Function to display announcements in a loop
                    let currentIndex = 0;

                    function displayNextAnnouncement() {
                        const currentAnnouncement = recentAnnouncements[currentIndex];

                        // Update the DOM with the current announcement
                        announcementTitle.textContent = currentAnnouncement.title;
                        announcementContent.textContent = currentAnnouncement.content;

                        // Move to the next announcement (loop back to the start if necessary)
                        currentIndex = (currentIndex + 1) % recentAnnouncements.length;
                    }

                    // Display the first announcement immediately
                    displayNextAnnouncement();

                    // Change announcements every 5 seconds (5000 milliseconds)
                    setInterval(displayNextAnnouncement, 5000);
                })
                .catch(error => {
                    console.error('There was a problem fetching the announcements:', error);
                    announcementTitle.textContent = 'Failed to load announcements.';
                    announcementContent.textContent = 'Please try again later.';
                });
        });
    </script>
@endsection
