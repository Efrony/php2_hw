<style>
    .messageComment {
        color: #f16d7f;
        font-size: 24px;
        font-weight: 900;
        text-transform: uppercase;
    }

    nav ul li:nth-child(1) a {
        border-bottom: none;
    }

</style>
<div class="newArrivalsBlock">
    <div class="newArrivals">
        <p>New Arrivals</p>
        <nav> Home / Men / <span>New Arrivals</span> </nav>
    </div>
</div>
<main class="product_page">
    <div class="bcgBlock"></div>
    <div class="content">
        <div class="contentBcg"><img src="/<?= DIR_CATALOG .  $productItem->img_id . '.jpg' ?>" alt="fotoProduct">
            <i class="fa fa-eye" aria-hidden="true"></i><span class="raring"> <?=$productItem->rating?></span>
            <i class="fas fa-comment"></i><span class="raring"> <?= count($commentsList); ?></span>
            <aside>
                <p class="collection">WOMEN COLLECTION</p> <img src="img/hot_deals/line-border-pink.png" alt="">
                <p class="heading">Moschino Cheap And Chic</p>
                <p class="discr"> <?= $productItem->discription?></p>
                <p class="material"> <span>MATERIAL: </span> COTTON &emsp;&emsp;&emsp; <span>DESIGNER:
                    </span>
                    BINBURHAN </p>
                <p class="price">$<?= $productItem->price?></p>
                <form action="#">
                    <div class="characteristic">
                        <div class="color">
                            <p>CHOOSE COLOR</p>
                            <select name="colors">
                                <option value="" selected>Red</option>
                                <option value="black" disabled>Black</option>
                                <option value="blue">Blue</option>
                                <option value="green">Green</option>
                                <option value="gray">Gray</option>
                            </select>
                        </div>
                        <div class="size">
                            <p>CHOOSE SIZE</p>
                            <select name="sizes">
                                <option value="">XS</option>
                                <option value="s" disabled>S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl" selected>XXL</option>
                            </select>
                        </div>
                        <div class="quantity">
                            <p>QUANTITY</p>
                            <input type="text" value="2" name="quantitys">
                        </div>
                    </div>
                    <button type="button" class="addToCart" data-id="<?=$productItem->id?>">&ensp;Add to Cart</button>
                </form>
            </aside>
        </div>
        <section class="comments">
            <p class="collection"></p><img src="/img/hot_deals/line-border-pink.png" alt="">
            <p class="heading">comments</p>
            <p class="messageComment"><?= $messageComment ?></p>
            <? foreach ($commentsList as $comment) : ?>
                <div>
                    <article class="comment">
                        <?= $comment['text'] ?>
                        <br>
                        <address>
                            <?= $comment['name'] ?>
                            <p><?= $comment['date'] ?></p>
                        </address>
                        <div class="buttons">
                            <a href="?action=edit&message=edit&id=<?= $comment['id'] ?>">Редактировать</a>
                            <a href="?action=delete&id=<?= $comment['id'] ?>">Удалить</a>
                        </div>
                    </article>
                </div>
            <? endforeach; ?>
        </section>
        <section>
            <form action="?action=<?= $_GET['action'] ?>" method="post" class="data-1">
                <h5>write a comment</h5>
                <p class="point inp">NAME <span class="red">*</span></p>
                <input type="text" name="nameComment" required value="<?= $selectedComment['name'] ?>">
                <p class="point inp">EMAIL ADDRESS <span class="red">*</span></p>
                <input type="email" name="emailComment" required value="<?= $selectedComment['email'] ?>">
                <p class="point inp">COMMENT<span class="red">*</span></p>
                <textarea class="areaComment" name="textComment" id="" cols="30" rows="5" required><?= $selectedComment['text'] ?></textarea>
                <p><span class="red">* Required Fileds</span></p>
                <input type="submit" name="sendComment" value="SEND COMMENT">
                <input hidden type="text" name="id_comment" value="<?= $selectedComment['id'] ?>">
            </form>
        </section>
        <div class="likeAlso">you may like also</div>
        <div class="product" id="product">
            <?=$catalog ?>
        </div>
    </div>
</main>