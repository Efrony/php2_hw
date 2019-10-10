window.onload = function () {
    const page = window.location.pathname
    if (page == '/catalog/') {
        showFromProduct = 8
        showCountProduct = 8
        $showMoreButton = document.getElementById('showMore')
        $showMoreButton.addEventListener('click', showMore)

        $addToCartButtons = document.getElementsByClassName('addToCart')
        for (let i = 0; i < $addToCartButtons.length; i++) {
            $addToCartButtons[i].addEventListener('click', addToCart)
        }
    } else if (page == '/catalog/product/') {
        $addToCartButtons = document.getElementsByClassName('addToCart')
        for (let i = 0; i < $addToCartButtons.length; i++) {
            $addToCartButtons[i].addEventListener('click', addToCart)
        }
    } else if (page == '/users/') {
        if (document.getElementById('registrationButton')) {
            $registrationButton = document.getElementById('registrationButton')
            $registrationButton.addEventListener('click', registration)
        }
    } else if (page == '/cart/') {
        $deleteToCartButtons = document.getElementsByClassName('deleteButton')
        for (let i = 0; i < $deleteToCartButtons.length; i++) {
            $deleteToCartButtons[i].addEventListener('click', deleteToCart)
        }
        if (document.getElementById('clearCart')) {
            $clearCart = document.getElementById('clearCart')
            $clearCart.addEventListener('click', clearCart)
        }
    } else if (page == '/admin/') {
        $changeStatusOrderButton = document.getElementsByClassName('changeStatusOrder')
        for (let i = 0; i < $changeStatusOrderButton.length; i++) {
            $changeStatusOrderButton[i].addEventListener('click', changeStatusOrder)
        }

    }
}

function showMore() {
    fetch('/api/showmore', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                showFromProduct: showFromProduct,
                showCountProduct: showCountProduct
            })
        })
        .then(response => {
            return response.text();
        })
        .then(text => {
            catalogField = document.getElementById('catalogField')
            catalogField.innerHTML += text
            showFromProduct += showCountProduct

            $addToCartButtons = document.getElementsByClassName('addToCart')
            for (let i = 0; i < $addToCartButtons.length; i++) {
                $addToCartButtons[i].addEventListener('click', addToCart)
            }
        })
}


function registration() {
    $registrForm = document.getElementById('registr')
    $name = $registrForm.name.value
    $email = $registrForm.email.value
    $password = $registrForm.password.value
    $phone = $registrForm.phone.value
    fetch('/api/registration', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                name: $name,
                email: $email,
                password: $password,
                phone: $phone,
            })
        })
        .then(response => response.json())
        .then(res => {
            $message = document.getElementById('messageRegistr')
            $message.innerHTML = res['message']
            $message.className = res['classValid']
        })
}

function addToCart(event) {
    id_product = event.target.dataset.id
    fetch('/api/addtocart', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                id_product: id_product,
            })
        })
        .then(response => response.json())
        .then(res => {
            document.getElementById('cartCount').innerHTML = res['countCart']
        })
}

function deleteToCart(event) {
    id_cart_item = event.target.dataset.id
    fetch('/api/deleteToCart', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                id_cart_item: id_cart_item,
            })
        })
        .then(response => response.json())
        .then(res => {
            cart_number = 'cart_number_' + res['id_deleted']
            deleted_item = document.getElementById(cart_number)
            deleted_item.remove()
            document.getElementById('cartCount').innerHTML = res['countCart']
            document.getElementById('grandTotal').innerHTML = res['summCart']
        })
}

function clearCart() {
    fetch('/api/clearCart')
        .then(response => response.json())
        .then(res => {
            if (res['countCart'] == 0) {
                window.location.reload()
                /*
                document.getElementById('cartCount').innerHTML = 0
                document.getElementById('grandTotal').innerHTML = 0

                $deletedItems = document.getElementsByClassName('productItem')
                for (let i = 0; i < $deletedItems.length; i++) {
                    $deletedItems[i].remove()
                }
                */
            }
        })
}

function changeStatusOrder(event){
    const id_order = event.target.dataset.id
    const status_order = document.getElementById('status_order_' + id_order).value

    if (status_order !== 'select_status') {
        fetch('/api/changeStatusOrder', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                id_order: id_order,
                status_order: status_order,
            })
        })
            .then(response => response.json())
            .then(res => {
                const status_field =  document.getElementById('status_field_' + res['id_order'])
                status_field.innerHTML = res['status_order']
                status_field.style.cssText = "color: #fff; background: #ef5b70";
            })
    }
}
