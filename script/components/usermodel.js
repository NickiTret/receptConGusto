// const { comment } = require("postcss");

// let jsonData = document.querySelector("[data-json]");
// let postData = document.querySelector("[data-json-post]");

// if (jsonData) {
//     const jsonObject = JSON.parse(jsonData.getAttribute("data-json")); //get comments json
//     const jsonPost = JSON.parse(postData.getAttribute("data-json-post"));
//     const form = document.querySelector(".comment_form>form");
//     const submitForm = form.querySelector("button.btn");
//     const fromAction = form.getAttribute("action");

//     const urlGetData = `http://127.0.0.1:8000/json/${jsonPost.slug}`; // для получения коментов
//     const urlAddComment = fromAction;

//     async function sendRequest(method, url, body = null) {
//         return fetch(url).then((response) => {
//             return response.json();
//         });
//     }

//     async function saveRequest(method, url, body = null) {
//         const headers = {
//             "Content-Type": "application/json",
//             "X-CSRF-Token": document
//                 .querySelector('meta[name="csrf-token"]')
//                 .getAttribute("content"),
//         };

//         return fetch(url, {
//             method: method,
//             body: JSON.stringify(body),
//             headers: headers,
//         }).then((response) => {
//             console.log(body);
//             return response.json();
//         });
//     }

//     const body = {
//         message: "message",
//     };

//     const addComment = () => {
//         const body = {
//             message: document.querySelector('textarea[name="message"]').value,
//         };
//         saveRequest("POST", urlAddComment, body)
//             .then((data) => console.log(data))
//             .catch((error) => console.log(error));
//         document.querySelector('textarea[name="message"]').value = "";
//     };

//     submitForm.addEventListener("click", (e) => {
//         e.preventDefault();
//         addComment();
//         getCommets();
//     });

//     const getCommets = () => {
//         sendRequest("GET", urlGetData)
//             .then((data) => {
//                 const commentsBox = document.querySelector(".comments");
//                 const commentItem = document.createElement("div");
//                 commentItem.classList.add("comment");
//                 commentItem.classList.add("cleatfix");
//                 const lastComment = data.comments[data.comments.length - 1];
//                 commentItem.innerHTML = `
//                 <div class="user-block">
//                     <img class="img-circle img-bordered-sm" src="/assets/${data.users_data.avatar}" alt="User Image">
//                     <span class="username">
//                         ${data.users_data.name}
//                         <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
//                     </span>
//                     <span class="description">{!! $comment->created_at->format('d.m.Y, H:i') !!}</span>
//                 </div>
//                 <p>
//                     ${data.massage}
//                 </p>
//                 <p>
//                     Ваш коментраии на модерации
//                 </p>
//             </div>

//                 `;
//                 commentsBox.appendChild(commentItem);
//                 console.log(lastComment);

//                 // Array.from(comments).forEach((comment) => {});
//             })
//             .catch((error) => console.log(error));
//     };

//     getCommets();
// }
