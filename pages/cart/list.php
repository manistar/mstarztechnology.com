<?php //$script[] = "payment"?>
<style>
    /* General page styles */
    body {
        background-color: #1e1e1e;
        color: #e0e0e0;
        font-family: 'Roboto', sans-serif;
    }

    /* Container for main cart section */
    .main__content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Breadcrumb styles */
    .breadcrumb {
        background: none;
        margin-top: 50px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;
        padding: 0;
    }

    .breadcrumb__item {
        display: inline;
        color: #fff;
    }

    .breadcrumb__item a {
        color: #61dafb;
    }

    .breadcrumb__item--active {
        font-weight: bold;
        padding-left: 20px;
    }

    /* Cart Title */
    .main__title--page h2 {
        font-size: 36px;
        color: #61dafb;
        border-bottom: 3px solid #61dafb;
        display: inline-block;
    }

    /* Table Styles */
    .cart__table {
        width: 100%;
        margin-bottom: 20px;
        background-color: #282828;
        border-radius: 8px;
        overflow-x: auto;
    }

    .cart__table thead th {
        border-bottom: 2px solid #444;
        text-align: left;
        padding: 15px 10px;
        color: #a5a5a5;
        font-weight: normal;
    }

    .cart__table tbody td {
        padding: 15px 10px;
        color: #e0e0e0;
    }

    .cart__img img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
    }

    .cart__quantity {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .cart__quantity input {
        width: 50px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #444;
        color: #fff;
    }

    .cart__quantity button {
        background-color: #444;
        color: #61dafb;
        border: none;
        padding: 5px 8px;
        border-radius: 4px;
        cursor: pointer;
    }

    .cart__quantity button:hover {
        background-color: #555;
    }

    .cart__price {
        color: #fff;
        font-weight: bold;
    }

    .btn-danger {
        background-color: #ff4d4d;
        border: none;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #ff1a1a;
    }

    /* Cart Info */
    .cart__info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
    }

    .cart__total {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
    }

    .promo__input {
        background-color: #444;
        border: none;
        color: #fff;
    }

    .promo__btn {
        background-color: #61dafb;
        border: none;
        color: #fff;
        padding: 5px 15px;
        cursor: pointer;
    }

    .promo__btn:hover {
        background-color: #4da7d5;
    }

    /* Checkout Section */
    .checkout__title {
        font-size: 24px;
        color: #61dafb;
        margin-bottom: 20px;
    }

    .checkout input,
    .checkout select {
        background-color: #444;
        border: none;
        color: #fff;
        padding: 10px;
        width: 100%;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    #payBtn {
        background-color: #ff4d4d;
        border: none;
        padding: 10px 0;
        width: 100%;
        color: white;
        cursor: pointer;
    }

    #payBtn:hover {
        background-color: #ff1a1a;
    }

    .container {
        padding: 45px;
        border-radius: 10px;
        overflow: hidden;
        border: none;
        z-index: 1;
        background: var(--background-color-1);
        box-shadow: var(--shadow-1);
    }

    /* Media Query for Smaller Screens */
    @media (max-width: 768px) {
        .main__content {
            padding: 10px;
        }

        .cart__table-wrap {
            overflow-x: auto;
        }

        .row--grid {
            flex-direction: column;
        }

        .col-12 {
            width: 100%;
        }

        .col-lg-8,
        .col-lg-4 {
            width: 100%;
        }

        .cart__info {
            flex-direction: column;
            align-items: center;
        }

        .cart__quantity button {
            font-size: 12px;
        }

        .breadcrumb__item {
            font-size: 12px;
        }
    }

    /* Media Query for Very Small Screens */
    @media (max-width: 480px) {
        .cart__table tbody td {
            font-size: 14px;
            padding: 8px;
        }

        .cart__img img {
            width: 50px;
            height: 50px;
        }

        .checkout__title {
            font-size: 18px;
        }

        #payBtn {
            font-size: 16px;
        }
    }
</style>




<br /><br /><br /><br />
<section class="main">
    <div class="container">
        <div class="main__content">
            <div class="row row--grid">

                <!-- Breadcrumb Section -->
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Cart</li>
                    </ul>
                </div>

                <!-- Cart Title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h2>Your Cart</h2>
                    </div>
                </div>

                <!-- Cart Table and Info Section -->
                <div class="col-12 col-lg-8">
                    <div class="cart">
                        <div class="cart__table-wrap">
                            <div class="cart__table-scroll">
                                <table class="cart__table table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Title</th>
                                            <th>No of Products</th>
                                            <th>Amount</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_cat = 0;
                                        if ($cart_data->rowCount() > 0) {
                                            foreach ($cart_data as $row) {
                                                $carting = $d->getall("products", "ID = ?", [$row['productID']]);
                                                if ($carting !== false) {
                                                    $total                                = substr($carting['amount'], 1) * $row['no_product'];
                                                    $total_cat += $total;
                                                    $add_cart["input_data"]['productID']  = $row['productID'];
                                                    $add_cart["input_data"]['no_product'] = $row['no_product'];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="cart__img">
                                                                <img src="upload/cart/<?= $carting['upload_image']; ?>"
                                                                    alt="Product Image">
                                                            </div>
                                                        </td>
                                                        <td><a
                                                                href="?p=product-details&ID=<?= $carting['ID'] ?>"><?= $carting['title']; ?></a>
                                                        </td>
                                                        <td>
                                                            <form action="passer" id="foo" onsubmit="return false">
                                                                <?php unset($add_cart['no_product']) ?>
                                                                <?= $c->create_form($add_cart); ?>
                                                                <div id="custommessage"></div>
                                                                <input type="hidden" name="add_to_cart" value="">
                                                                <input type="hidden" name="page" value="shop">
                                                                <!-- Minus & Plus-->
                                                                <div class="cart__quantity">
                                                                    <button type="submit" class="sub"
                                                                        onclick="changeQuantity(this, -1, '<?= $row['productID'] ?>')">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                    <input type="text" name="no_product"
                                                                    id="quantity-<?= $row['productID']; ?>" 
                                                                        value="<?= $row['no_product']; ?>"
                                                                        class="form-control text-center" onchange="updateTotal()"
                                                                        data-min="1">
                                                                    <button type="submit" class="add"
                                                                        onclick="changeQuantity(this, 1, '<?= $row['productID'] ?>')">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                </div>

                                                            </form>
                                                        </td>
                                                        <!-- <td><span
                                                                class="cart__price">$<?= number_format(substr($carting['amount'], 1)); ?></span>
                                                        </td>
                                                        <td><span class="cart__price">$<?= number_format($total); ?></span></td> -->

                                                        <td>
        <span class="cart__price unit-price" data-price="<?= substr($carting['amount'], 1); ?>">
            $<?= number_format(substr($carting['amount'], 1), 2); ?>
        </span>
    </td>
    <td>
        <span id="total-price-<?= $row['productID']; ?>" class="cart__price">
            $<?= number_format($total, 2); ?>
        </span>
    </td>

                                                        <td>
                                                            <button class="cart__delete">
                                                                <a href="?p=cart&pID=<?= $carting['ID']; ?>&products"
                                                                    class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    echo "<tr><td colspan='6' class='text-center'>Product not found for ID: " . htmlspecialchars($row['productID']) . "</td></tr>";
                                                }
                                            }
                                        } else {
                                            echo "<tr><td colspan='6' class='text-center'>No items in the cart</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Cart Info Section -->
                        <div class="cart__info">
                            <div class="cart__total">
                                <p>Total: <span>$<?= number_format($total_cat); ?></span></p>
                                <!-- <span>$<?= number_format($total_cat); ?></span> -->
                            </div>
                            <!-- <form action="#" class="cart__promo">
                                <input type="text" class="promo__input form-control" placeholder="Promo code">
                                <button type="button" class="promo__btn">Apply</button>
                            </form> -->
                        </div>
                    </div>
                </div>

                <!-- Checkout Section -->
                <div class="col-12 col-lg-4">
                    <div class="checkout">
                        <h4 class="checkout__title">Checkout</h4>
                        <?= $c->create_form($checkout); ?>
                        <script src="https://checkout.flutterwave.com/v3.js"></script>
                        <button type="submit" class="payment__btn" id="payBtn" value="submit">Checkout</button>
                        <!-- <button type="submit" class="btn btn-success btn-block" id="payBtn">Checkout</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Function to change the quantity value
function changeQuantity(button, change, id) {
    const inputField = button.parentElement.querySelector('input[name="no_product"]');
    let currentValue = parseInt(inputField.value) || 0;
    const minValue = parseInt(inputField.getAttribute('data-min')) || 1;

    // Calculate new value (prevent going below the minimum)
    let newValue = currentValue + change;
    newValue = Math.max(minValue, newValue);

    // Update input field value
    inputField.value = newValue;

    // Optionally update the total (if required)
    updateTotal(id);
}

// Dummy function to demonstrate total update (you can customize it as needed)
function updateTotal() {
    console.log('Total updated based on new quantity');
    // Implement your logic here (like recalculating product totals or the grand total)
}
// 
// Function to update the total price when quantity changes
function updateTotal(productID) {
    const quantityInput = document.getElementById(`quantity-${productID}`);
    const quantity = parseInt(quantityInput.value) || 0;

    // Get the unit price from the HTML element
    const unitPriceElement = quantityInput.closest('tr').querySelector('.unit-price');
    const unitPrice = parseFloat(unitPriceElement.getAttribute('data-price'));
    // console.log(unitPrice);
    // Calculate the new total for the product
    const totalPrice = (unitPrice * quantity).toFixed(2);

    // Update the total price in the table
    const totalPriceElement = document.getElementById(`total-price-${productID}`);
    totalPriceElement.innerText = `$${totalPrice}`;
}
</script>