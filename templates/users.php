<style>
    nav ul li:nth-child(1) a {
        border-bottom: none;
    }
</style>
<main class="register">
    <section>
        <div class="welcome">
            <p class="collection">MY ACCOUNT</p> <img src="/img/hot_deals/line-border-pink.png" alt="">
            <p class="heading">WELCOME</p>
        </div>
    </section>
    <?php if ($isAuth) : ?>
        <section>Добро Пожаловать!</section>
    <?php else : ?>
        <section>
            <form action="/users/registration/" method="post" onclick="return false" name="registr" id="registr" class="data-1">
                <h5>register</h5>
                <p class="point">register and save time!</p>
                <p class="about">Register with us for future convenience</p>
                <p class="about"> >> Fast and easy checkout</p>
                <p class="about aboutLast"> >> Easy access to your order history and status</p>
                <p class="point inp"> NAME <span class="red">*</span></p>
                <input type="text" name="name">
                <p class="point inp">EMAIL ADDRESS<span class="red">*</span></p>
                <input type="email" name="email">
                <p class="point inp"> PASSWORD <span class="red">*</span></p>
                <input type="password" name="password">
                <p class="point inp">PHONE</p>
                <input type="text" name="phone">
                <p><span class="red">* Required Fileds</span></p>
                <p id="messageRegistr"></p>
                <input type="submit" name="register" id ="registrationButton" value="register">
            </form>
            <form action="/users/login/" method='post' id="login" class="data-2" name="loginForm" >
                <h5>sign in</h5>
                <p class="point">Already registed?</p>
                <p class="about">Please log in below</p>
                <p class="point inp"> EMAIL ADDRESS <span class="red">*</span></p>
                <input type="email" name="login" required value="<?=$_POST['login']?>" placeholder="admin@admin.com">
                <p class="point inp"> PASSWORD <span class="red">*</span></p>
                <input type="password" name="password" required value="<?=$_POST['password']?>">
                <div class="point">
                    <p class="point inp">Remember me:</p>
                    <input type="radio" name='remember' id="ch-1" value="yes" checked>
                    <label for="ch-1">Yes</label><br>
                    <input type="radio" name='remember' id="ch-2" value="no">
                    <label for="ch-2">No</label>
                </div>
                <p><span class="red">* Required Fileds</span></p>
                <p id="messageLogin" class="invalidForm"><?=$_GET['loginmessage']?></p>
                <input type="submit" name="loginButton" value="LOG IN">
            </form>
        </section>
    <?php endif ?>
</main>