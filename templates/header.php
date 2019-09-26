<header>
    <div class="logoSearch">
        <div class="logo">
            <span class="styleBran">BRAN</span>
            <span class="styleD">D</span>
        </div>
        <div class="search">
            <button class="browse">Browse <i class="fas fa-caret-down"></i></button>
            <input type="search" placeholder="Search for Item...">
            <button type="button" class="searchButton"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <div class="my">

            <a class="authEmail" href="/users/"><?= $myEmail ?></a>

        <a class="cartButton" href="/cart/">
            <img src="/img/Forma_1.png" alt="basket">
            <div class="cartCount" id="cartCount"><?= $countCart ?></div>
        </a>
        <?php if ($isAuth): ?>
            <div class="myAccount">
                <a href="/users/">
                    My Account
                    <i class="fas fa-caret-down"></i>
                </a>
                <a class="myAccountExit" href="/users/exit">Exit</a>
            </div>
        <?php else : ?>
            <div class="myAccount">
                <a href="/users/">Sign in / Registration</a>
            </div>
        <?php endif ?>
    </div>
</header>