export function addToCart(book) {
    let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    cartItems.push(book);
    localStorage.setItem("cart", JSON.stringify(cartItems));
    logCart(); // show cart on the console
}

export function getBooks() {
    return JSON.parse(localStorage.getItem("cart")) || [];
}

export function deleteCart() {
    localStorage.removeItem("cart");
}
