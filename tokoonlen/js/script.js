document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('button');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            alert('Product added to cart!');
        });
    });
});

// Fungsi untuk mengisi formulir pembaruan produk
function populateUpdateForm(id, name, description, price, image) {
    document.getElementById('updateId').value = id;
    document.getElementById('updateName').value = name;
    document.getElementById('updateDescription').value = description;
    document.getElementById('updatePrice').value = price;
    document.getElementById('updateImage').value = image;
    document.getElementById('updateForm').style.display = 'block';
}