let jsonData = document.querySelector("[data-json]");
let slug = document.querySelector("[data-json-slug]");

if (jsonData) {
    let jsonObject = JSON.parse(jsonData.getAttribute("data-json"));
    let jsonSlug = slug.getAttribute("data-json-slug");
    let form = document.querySelector('.comment_form>form');

    let fromAction = form.getAttribute('action');


    const urlGetData = `http://127.0.0.1:8000/json/${jsonSlug}`;
    const urlAddComment = '{{url("personal.comment.add")}}';



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
            'Content-Type': 'application/json',
            'X-CSRF-Token': '{{ csrf_token() }}',
        };

        return fetch(url, {
            method: method,
            body: JSON.stringify(body),
            headers: headers
        }).then(response => {
            console.log(response)
            return response.json()
        });
    }

    const addComment = () => {
        saveRequest('POST', urlAddComment, body)
        .then((data) => console.log(data))
        .catch((error) => console.log(error));
        console.log(body);
    }

    addComment();

    // const getCommets = () => {
    //     sendRequest("GET", urlGetData)
    //     .then((data) => console.log(data.comments))
    //     .catch((error) => console.log(error));
    // }

    // getCommets();
}
