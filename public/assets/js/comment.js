const form = document.querySelector("#comment-form");

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
        return res.json();
    }).then(json => {
            if (json.status) {
                location.href = "#";
            }
    }).catch(error => {
        console.log(error);
    })
}
