<?php
use app\engine\App;
?>
<style>
    nav ul li:nth-child(1) a {
        border-bottom: none;
    }

    nav ul li:nth-child(5) a {
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

    <?php if ($isAdmin) : ?>
    <section class="comments">
        <p class="collection">ADMIN</p>
        <img src="/img/hot_deals/line-border-pink.png" alt="">
        <p class="heading">Order management</p>
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
                    <div>Статус заказа: <p id="status_field_<?=$order['id']?>"><?= $order['status'] ?></p></div>
                    <div>Адрес: <br> <?= $order['address'] ?></div>
                    <div>Телефон: <br> <?= $order['phone'] ?></div>
                    <div class="productsOrder">
                        Список товаров: <br>
                        <?= App::call()->ordersRepository->renderProductsByOrder($order);?>
                    </div>
                    <div>Cумма заказа: <?= $order['summ'] ?></div>
                </div>
                <div class="buttons">
                    <div>
                        <select id="status_order_<?=$order['id']?>">
                            <option selected disabled value="select_status">Выберите статус</option>
                            <option value="Не подтверждён">Не подтверждён</option>
                            <option value="Подтверждён">Подтверждён</option>
                            <option value="В обработке">В обработке</option>
                            <option value="Отменён">Отменён</option>
                        </select>
                        <a onclick="return false" href="#" class="changeStatusOrder" data-id="<?=$order['id']?>" >Изменить статус</a>
                    </div>
                </div>
            </article>
        </div>
    <? endforeach; ?>
</section>
    <?php endif ?>
</main>
