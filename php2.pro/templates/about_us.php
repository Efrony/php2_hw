<style>
    nav ul li:nth-child(1) a {
        border-bottom: none;
    }

    nav ul li:nth-child(4) a {
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
        <p class="collection">ABOUT US</p>
        <img src="/img/hot_deals/line-border-pink.png" alt="">
        <p class="heading">comments about all products</p>
        <p class="messageComment"><?= $messageComment ?></p>
    </section>
    <section class="comments">
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
</main>