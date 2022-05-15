const form = document.querySelector("#content-form");

function edit(id = false) {
    const formData = new FormData(form);
    let url = "/content/save"

    if(id) {
        url += "/" + id;
    }

    fetch(url, {
        method: 'post',
        cache: 'no-cache',
        headers: {
            // 'Content-Type': 'mulipart/form-data;'
        },
		referrer: 'no-referrer',
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
