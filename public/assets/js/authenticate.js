const form = document.querySelector("#authentication-form");

function checkPassword(type, id) {
    const formData = new FormData(form);
	const url = "/content/checkPassword" + "/" + type + "/" + id;
	fetch(url, {
        method: 'post',
        cache: 'no-cache',
        headers: {
            // 'Content-Type': 'mulipart/form-data;'
        },
		referrer: 'no-referrer',
        body: formData,
    }).then(res => {
        return res.json();
    }).then(json => {
            if (json.status) {
                location.href = "/content/" + type + "/" + id;
            } else {
                changeHidden();
            }
    }).catch(error => {
        console.log(error);
    })
}

function changeHidden() {
	const passError = document.querySelector("#password-error");
    passError.classList.toggle('hidden');
}
