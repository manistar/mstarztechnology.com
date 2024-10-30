<!-- Start Footer Area -->
<div class="rn-footer-area rn-section-gap section-separator">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-area text-center">

                    <div class="logo">
                        <a href="index.html">
                            <img src="upload/<?= $profiles["footer_image"]; ?>" alt="logo">
                        </a>
                    </div>

                    <p class="description mt--30">© 2022. All rights reserved by <a target="_blank"
                            href="https://mstarztech.com">MSTARZ TECH.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer Area -->
<script>
    // JavaScript logic
    let cart = [];
    const cartModal = document.getElementById('cartModal');
    const cartCount = document.getElementById('cartCount');
    const cartItems = document.getElementById('cartItems');
    const cartIcon = document.getElementById('cart');
    const closeCartButton = document.getElementById('closeCart');

    // Function to add item to cart
    function addToCart(productId, productTitle, productPrice) {
        const item = {
            id: productId,
            title: productTitle,
            price: productPrice
        };

        // Add item to cart array
        cart.push(item);

        // Update cart count and modal display
        updateCart();
    }

    // Function to update cart display and count
    // function updateCart() {
    //     // Update cart count in header
    //     cartCount.innerText = cart.length;

    //     // Update the items in the modal
    //     cartItems.innerHTML = '';
    //     cart.forEach(item => {
    //         const li = document.createElement('li');
    //         li.textContent = `${item.title} - $${item.price}`;
    //         cartItems.appendChild(li);
    //     });
    // }


    // Initialize an empty array to simulate a cart
    let cart = [];

    // Function to update the cart count
    function updateCartCount() {
        document.getElementById('cartCount').innerText = cart.length;
    }

    // Add event listener to all "Add to Cart" buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            // Get the item details from the data attributes
            const itemId = this.getAttribute('data-id');
            const itemTitle = this.getAttribute('data-title');
            const itemPrice = this.getAttribute('data-price');

            // Add the item to the cart array
            cart.push({
                id: itemId,
                title: itemTitle,
                price: itemPrice
            });

            // Update the cart count in the header
            updateCartCount();

            // Optional: You can log the cart items to the console for debugging
            console.log(cart);
        });
    });



    // Add event listeners to "Add to Cart" buttons
    // document.querySelectorAll('.add-to-cart').forEach(button => {
    //     button.addEventListener('click', function() {
    //         const productId = this.getAttribute('data-id');
    //         const productTitle = this.getAttribute('data-title');
    //         const productPrice = this.getAttribute('data-price');

    //         addToCart(productId, productTitle, productPrice);
    //     });
    // });

    // Function to handle "Add to Cart" button
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function (event) {
            // Prevent default button behavior
            event.preventDefault();

            // Get product data from button attributes
            const productId = this.getAttribute('data-id');
            const productTitle = this.getAttribute('data-title');
            const productPrice = this.getAttribute('data-price');

            // Example: Add the product to the cart (you can replace this with your cart logic)
            console.log(`Product added to cart: ${productTitle}, ID: ${productId}, Price: ${productPrice}`);

            // You can update the cart count or show a modal here
            let cartCount = document.getElementById('cartCount');
            cartCount.innerText = parseInt(cartCount.innerText) + 1;

            alert(productTitle + ' has been added to your cart.');
        });
    })

    // Toggle cart modal display
    cartIcon.addEventListener('click', () => {
        cartModal.style.display = cartModal.style.display === 'none' ? 'block' : 'none';
    });

    // Close cart modal
    closeCartButton.addEventListener('click', () => {
        cartModal.style.display = 'none';
    });

    // Function to handle "Read More" toggle
   // Handle "Read More" button functionality
   document.querySelectorAll('.read-more-button').forEach(button => {
        button.addEventListener('click', function () {
            const description = this.previousElementSibling.querySelector('.more-text');
            description.style.display = description.style.display === 'none' ? 'inline' : 'none';
        });
    });

    // Handle Add to Cart functionality with AJAX
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            const formData = new FormData(this);
            const productId = this.querySelector('.add-to-cart').dataset.productId;

            fetch('passer', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('custommessage').innerText = data.message || 'Added to cart!';
                    console.log(`Product ID ${productId} added to cart.`);
                })
                .catch(error => console.error('Error:', error));
        });
    });
    button.addEventListener('click', function (event) {
        // Prevent the default behavior (page navigation or form submission)
        event.preventDefault();

        // Get the hidden part of the description
        const description = this.previousElementSibling.querySelector('.more-text');

        // Toggle the visibility of the full description
        if (description.style.display === "none" || description.style.display === "") {
            description.style.display = "inline"; // Show full description
            this.innerText = "Read Less"; // Change button text to "Read Less"
        } else {
            description.style.display = "none"; // Hide full description
            this.innerText = "Read More"; // Change button text back to "Read More"
        }
    });
});

</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/my.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="js/payment.js?n=11010"></script>

<!-- Modal Js -->
<script src="js/vendor.bundle.base.js"></script>

<!-- JS ============================================ -->
<script src="assets/js/vendor/jquery.js"></script>
<script src="assets/js/vendor/modernizer.min.js"></script>
<script src="assets/js/vendor/feather.min.js"></script>
<script src="assets/js/vendor/slick.min.js"></script>
<script src="assets/js/vendor/bootstrap.js"></script>
<script src="assets/js/vendor/text-type.js"></script>
<script src="assets/js/vendor/wow.js"></script>
<script src="assets/js/vendor/aos.js"></script>
<script src="assets/js/vendor/particles.js"></script>
<script src="assets/js/vendor/jquery-one-page-nav.js"></script>
<!-- main JS -->

<script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from rainbowit.net/html/inbio/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Sep 2022 06:54:06 GMT -->

</html>