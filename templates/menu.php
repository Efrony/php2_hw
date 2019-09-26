<nav>
    <ul>
        <li><a href="/">HOME</a></li>
        <li><a href="/catalog/">WOMEN CATALOG</a></li>
        <li><a href="/orders/">MY ORDERS</a></li>
        <li><a href="/comments/">ABOUT US</a></li>
        <?php if ($myEmail == 'admin@admin.com' or $myEmail == 'admin@admin.ru') : ?>
            <li><a href="/admin/">ADMIN</a></li>
        <?php endif ?>
    </ul>
</nav>