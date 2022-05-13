const form = document.querySelector("#content-form");

function edit(id = false) {
    const formData = new FormData(form);
    let url = "/ajax/content/save"

    if(id) {
        url += "/" + id;
        formData.set('password', password_hash(formData.get('password'), PASSWORD_DEFAULT));
    }

    fetch(url, {
        method: 'POST',
        cache: 'no-cache',
        // headers: {
        //     'Content-Type': 'mulipart/form-data;'
        // },
        body: formData,
    }).then(res => {
        if (res.status) {
            location.href = "/home/main";
        } else {
            alert(res.message);
            return
        }
    }).catch(error => {
        console.log(error);
        alert(messages.INVALID);
    })
}
