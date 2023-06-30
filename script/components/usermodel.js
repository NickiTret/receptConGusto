let jsonData = document.querySelector("[data-json]");
let slug = document.querySelector("[data-json-slug]");

// if (jsonData) {
//     let jsonObject = JSON.parse(jsonData.getAttribute("data-json"));
//     const urlGetData = `http://127.0.0.1:8000/recept/${jsonObject[0].post_id}`;
//     console.log(urlGetData);
// }

if (jsonData) {
    let jsonObject = JSON.parse(jsonData.getAttribute("data-json"));
    let jsonSlug = slug.getAttribute("data-json-slug");

    // console.log(postId)

    console.log(jsonSlug)

    const urlGetData = `http://127.0.0.1:8000/json/${jsonSlug}`;
    const urlAddComment = `http://127.0.0.1:8000/comment/${jsonSlug}`;



    const body = {
        message: 'message'
    };

    async function sendRequest(method, url, body = null) {
        return fetch(url).then(response => {
            return response.json()
        });
    }

    async function saveRequest(method, url, body = null) {
        const headers = {
            'Content-Type': 'application/json'
        };

        return fetch(url, {
            method: method,
            body: JSON.stringify(body),
            // headers: headers
        }).then(response => {
            return response.json()
        });
    }

    const addComment = () => {
        saveRequest('POST', urlGetData, body)
        .then((data) => console.log(data))
        .catch((error) => console.log(error));
    }

    addComment();

    const getCommets = () => {
        sendRequest("GET", urlGetData)
        .then((data) => console.log(data.comments))
        .catch((error) => console.log(error));
    }

    getCommets();
}
