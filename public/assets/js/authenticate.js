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
        if (res.status) {
            location.href = "/content/" + type + "/" + id;
        } else {
            alert(res.message);
            return
        }
    }).catch(error => {
        console.log(error);
        alert(messages.INVALID);
    })
}

function setHidden() {
	const block = document.getElementById("#password-error");
	block.addClass('hidden');
}

// function authFetch(url, data) {
//     fetch(url, data)
//     .then
// }