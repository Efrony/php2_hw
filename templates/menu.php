<nav>
    <ul>
        <li><a href="/">HOME</a></li>
        <li><a href="/catalog/">WOMEN CATALOG</a></li>
        <li><a href="/orders/">MY ORDERS</a></li>
        <li><a href="/comments/">ABOUT US</a></li>
        <?php if ($isAdmin) : ?>
            <li><a href="/admin/">ADMIN</a></li>
        <?php endif ?>
    </ul>
</nav>