window.onload = function () {
    const page = window.location.pathname
    if (page == '/catalog/') {
        showFromProduct = 8
        showCountProduct = 8
        $showMoreButton = document.getElementById('showMore')
        $showMoreButton.addEventListener('click', showMore)
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