<?php

use app\engine\App;

?>
<style>
    nav ul li:nth-child(1) a {
        border-bottom: none;
    }

    nav ul li:nth-child(3) a {
        border-bottom: 3px solid #ef5b70;
    }

    .messageComment {
        color: #f16d7f;
        font-size: 24px;
        font-weight: 900;
        text-transform: uppercase;
    }
</style>
<main class="about_us_page">
    <section class="comments">
        <p class="collection">MY ORDERS</p>
        <img src="/img/hot_deals/line-border-pink.png" alt="">
        <p class="heading">Orders</p>
        <p class="messageComment"><?= $messageOrder ?></p>
</section>
<section class="comments">
    <? foreach ($ordersList as $order) : ?>
        <div>
            <article class="comment">
                <address class="infoOrder">
                    <div>Номер заказа: <?= $order['id'] ?></div>
                    <div><?= $order['name'] ?></div>
                    <div><?= $order['email'] ?></div>
                    <p><?= $order['date'] ?></p>
                </address>
                <div class="infoOrder">
                    <div id="statusOrder">Статус заказа: <br> <?= $order['status'] ?></div>
                    <div>Адрес: <br> <?= $order['address'] ?></div>
                    <div>Телефон: <br> <?= $order['phone'] ?></div>
                    <div class="productsOrder">
                        Список товаров: <br>
                        <?=App::call()->ordersRepository->renderProductsByOrder($order);?>
                    </div>
                    <div>Cумма заказа: <?= $order['summ'] ?></div>
                </div>
            </article>
        </div>
    <? endforeach; ?>
</section>
</main>