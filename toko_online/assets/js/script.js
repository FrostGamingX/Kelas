document.addEventListener('DOMContentLoaded', function() {
    // Tambahkan event listener untuk tombol tambah ke keranjang
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            // Logika untuk menambahkan produk ke keranjang
            console.log('Produk dengan ID ' + productId + ' ditambahkan ke keranjang');
            // Tambahkan logika untuk menyimpan ke session storage atau local storage
        });
    });
});