<?php if ($countCart == 0) : ?>
    <div class="newArrivalsBlock">

        <div class="newArrivals">
            <?php if (isset($_GET['orderMessage'])) : ?>
                <p>Ваш заказ оформлен! Номер заказа №<?=$_GET['orderMessage']?></p>
            <?php else : ?>
                <p>the cart is empty...</p>
            <?php endif ?>
            <nav>add <span>product</span> to cart</nav>
        </div>
    </div>
<?php else : ?>
    <main class="cart_page">
        <div>
            <div>
                <div class="cart">
                    <div class="hat">
                        <div>Product Details </div>
                        <div>unite Price</div>
                        <div>Quantity</div>
                        <div>shipping</div>
                        <div>Subtotal</div>
                        <div>ACTION</div>
                    </div>
                    <div class="productCart" id="productCart">
                        <?php foreach ($cartList as $cartItem) : ?>
                            <div class="productItem" id="cart_number_<?= $cartItem['id_cart_item'] ?>">
                                <figure>
                                    <a href="#"><img src="/<?= (DIR_CATALOG .  $cartItem['img_id']) . '.jpg'; ?>"></a>
                                    <figcaption><?= $cartItem['name'] ?>
                                        <p><b>Color:</b><?= $cartItem['color'] ?>
                                            <br><b>Size:</b> Xll</p>
                                    </figcaption>
                                </figure>
                                <div class="unitePrice">$ <?= $cartItem['price'] ?></div>
                                <div class="quantity">
                                    <input type="text" value="<?= $cartItem['quantity'] ?>" class="countInput">
                                </div>
                                <div class="shipping">FREE</div>
                                <div class="subtotal">$ <?= $cartItem['price'] * $cartItem['quantity'] ?></div>
                                <div class="action"> <a href="#"><img onclick="return false" class="deleteButton" id="deleteButton" data-id="<?= $cartItem['id_cart_item'] ?>" src="/img/cart/delete.png" alt="del"></a></div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="buttonCart">
                <a href="#" onclick="return false">
                    <div id="clearCart" class="clearCart">cLEAR SHOPPING CART</div>
                </a>
                <a href="/catalog/">
                    <div class="continueCart">cONTINUE sHOPPING</div>
                </a>
            </div>
        </div>
        <form action="/orders/sendOrder" method='post' class="inputBlock">
            <div class="shippingAdress"><span>Shipping Adress</span>
                <div class="column">
                    <input type="text" id="country" list="countrys" name="country" placeholder="Bangladesh">
                    <datalist id="countrys">
                        <option value="Russia">Russia</option>
                        <option value="USA">USA</option>
                        <option value="Italy">Italy</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="France">France</option>
                    </datalist>
                    <input type="text" placeholder="City" id="state" name="state">
                    <input type="text" id="zip" name="zip" placeholder="Street">
                    <input class="columnButton" type="submit" onclick="return false" value="Map">
                </div>

            </div>
            <div class="couponDiscount"><span>personal data</span>
                <p>Enter your name and phone</p>
                <div class="column">
                    <input type="text" placeholder="Name" id="state1" name="name">
                    <input type="text" placeholder="Phone" id="state1" name="phone">
                    <input class="columnButton" type="submit" onclick="return false" value="Apply coupon">
                </div>
            </div>
            <div class="grandTotal">
                <div class="price" id="priceTotal">
                    <p>GRAND TOTAL $
                        <span id="grandTotal">
                            &nbsp;&nbsp;&nbsp; <?= $summCart ?>
                        </span>
                    </p>
                </div>
                <br>
                <p id="messageLogin" class="invalidForm"><?= $_GET['phonemessage'] ?></p>
                <input id="sendOrder" type="submit" value="SEND ORDER" name="sendOrder">
            </div>
        </form>
    </main>
<?php endif ?>