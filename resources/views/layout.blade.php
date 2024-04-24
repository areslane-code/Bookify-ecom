<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar />
    <Main>
        @yield('main')
    </Main>
    <x-footer />

</body>

</html>

<script>
    window.onload = function() {
        initializeCartCookie();
        document.getElementById("cart-items-number-1").innerText = getCartItemsCount();
        document.getElementById("cart-items-number-2").innerText = getCartItemsCount();
    };

    // Initialize Cart Cookie
    function initializeCartCookie() {
        if (!getCartCookie()) {
            // Calculate the expiration date 30 days from now
            const expirationDate = new Date();
            expirationDate.setDate(expirationDate.getDate() + 7);

            // Format the expiration date in the required format (UTC string)
            const expirationDateString = expirationDate.toUTCString();

            // Set the cart cookie with the expiration date
            document.cookie = `cart=[]; expires=${expirationDateString}; path=/`;
        }
    }

    // Get Cart Cookie
    function getCartCookie() {
        const cookies = document.cookie.split('; ');
        for (const cookie of cookies) {
            const [name, value] = cookie.split('=');
            if (name === 'cart') {
                return JSON.parse(decodeURIComponent(value));
            }
        }
        return null;
    }

    // Set Cart Cookie
    function setCartCookie(cart) {
        const expirationDateString = document.cookie.expirationDate;
        // Set the cart cookie with the same expiration date
        document.cookie = `cart=${encodeURIComponent(JSON.stringify(cart))}; expires=${expirationDateString}; path=/`;
    }

    // Add Item to Cart
    function addBookToCart(book) {
        let cart = getCartCookie() || [];
        if (!cart.includes(book.id)) {
            cart.push(book.id);
        } else {
            showNotification(`${book.title}" est déjà dans votre panier.`);
            return;
        }

        setCartCookie(cart);
        document.getElementById('cart-items-number-1').innerText = getCartItemsCount();
        document.getElementById('cart-items-number-2').innerText = getCartItemsCount();

        console.log(cart);
        showNotification(`${book.title} est ajouté au panier`);
    }

    // Remove Item from Cart
    function removeItemFromCart(index) {
        let cart = getCartCookie() || [];
        if (index >= 0 && index < cart.length) {
            cart.splice(index, 1);
            setCartCookie(cart);
        }
    }

    // Get Cart Items Count
    function getCartItemsCount() {
        let cart = getCartCookie() || [];
        console.log(cart)
        return cart.length;
    }

    // Clear Cart
    function clearCart() {
        document.cookie = "cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
    }

    // Function to show notification
    function showNotification(message) {
        let notification = document.getElementById('notification');
        let notificationMessage = document.getElementById('notification-message');
        notificationMessage.innerText = message;
        notification.style.display = 'flex';
        setTimeout(function() {
            notification.style.display = 'none';
        }, 1000); // Hide after 2 seconds
    }


    // Update Item Quantity
    // function updateItemQuantity(index, quantity) {
    //     let cart = getCartCookie() || [];
    //     if (index >= 0 && index < cart.length) {
    //         cart[index].quantity = quantity;
    //         setCartCookie(cart);
    //     }
    // }

    // Get Cart Total
    // function getCartTotal() {
    //     let cart = getCartCookie() || [];
    //     return cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    // }
</script>
