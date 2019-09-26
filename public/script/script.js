window.onload = function () {
    const page = window.location.pathname
    if (page == '/catalog/') {
        showFromProduct = 8
        showCountProduct = 8
        $showMoreButton = document.getElementById('showMore')
        $showMoreButton.addEventListener('click', showMore)
    } else if (page == '/users/') {
        if (document.getElementById('registrationButton')) {
            $registrationButton = document.getElementById('registrationButton')
            $registrationButton.addEventListener('click', registration)
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