function tvshow(e) {
    let x = e.target.parentElement.id;
    let t =  e.target.parentElement.parentElement;
    console.log(x);
    let preurl =`/${x}`;
    let url = window.location.pathname+preurl;
    fetch(url, {
        method: 'DELETE', // or 'PUT'
        headers: {
            'X-CSRF-TOKEN': document.getElementsByTagName("meta")["csrf-token"].getAttribute("content"),
        },
        data: {
            "id": x,
        }

    }).then(
        setInterval(function () {
            if (!t.style.opacity) {
                t.style.opacity = 1;
            }
            if (t.style.opacity > 0) {
                t.style.opacity -= 0.1;
            }
        }, 50)
    )
        .catch(error => console.error('Error:', error));

}


