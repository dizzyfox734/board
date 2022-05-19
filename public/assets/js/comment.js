const form = document.querySelector("#comment-form");
const pass = document.querySelector("#commentPass-form");

function saveComment(contentId) {
    const formData = new FormData(form);
    const url = "/comment/save/" + contentId;

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
            location.reload();
        } else {
            alert(res.message);
            return
        }
    }).catch(error => {
        console.log(error);
        alert(messages.INVALID);
    })
}

function deleteComment(contentId) {
    const btn = document.querySelector("#delete-check");
    btn.setAttribute("onClick", `checkPassword(${contentId})`);
    changeHidden();
}

function checkPassword(id) {
    const formData = new FormData(pass);
	const url = "/comment/checkPassword" + "/" + id;
	fetch(url, {
        method: 'post',
        cache: 'no-cache',
        headers: {
        },
		referrer: 'no-referrer',
        body: formData,
    }).then(res => {
        return res.json();
    }).then(json => {
            if (json.status) {
                location.href = "/comment/delete/" + id;
            } else {
                window.location.reload();
            }
    }).catch(error => {
        console.log(error);
    })
}

function changeHidden() {
	const passError = document.querySelector("#password-error");
    window.scrollTo(0, 0);
    passError.classList.toggle('hidden');
}
