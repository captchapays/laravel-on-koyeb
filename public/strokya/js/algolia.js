document.querySelector('#aa-search-input').addEventListener('keyup', function (event) {
    if (event.keyCode === 13) {
        window.location = window.location.origin + '/shop?search=' + this.value;
    }
})

document.querySelector('.mobile-header__search-button').addEventListener('click', function () {
    const search = document.querySelector('#bb-search-input').value;
    window.location = window.location.origin + '/shop?search=' + search;
});
