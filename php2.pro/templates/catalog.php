<?php foreach ($productList as $itemProduct) : ?>
    <a href="/catalog/product/?id=<?= $itemProduct['id'] ?>">
        <figure class="productItem">
            <img src="/<?= (DIR_CATALOG .  $itemProduct['img_id']) . '.jpg'; ?>" alt="productFoto">
            <div class="shadowHover">
                <button onclick="return false" class="addToCart" data-id="<?= $itemProduct['id'] ?>">&ensp;Add to Cart</button>
            </div>
            <figcaption><?= $itemProduct['color'] . ' ' . $itemProduct['name']; ?>
                <p>$<?= $itemProduct['price']; ?></p>
                <i class="fa fa-eye" aria-hidden="true"></i><span class="raring"> <?= $itemProduct['rating'] ?></span>
            </figcaption>
        </figure>
    </a>
<?php endforeach; ?>