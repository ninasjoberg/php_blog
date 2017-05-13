function request(url, options, callback) {
    return fetch(url, options)
        .then(data => data.text())
        .then(callback);
}


let commentForm = document.getElementById('comment-form');
if(commentForm){
    commentForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('../functions/addComment.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this) //format input-fields
        },() => location.reload())   
    });
}

let postForm = document.getElementById('post-form');
if(postForm){
    postForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('functions/addPost.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this) //format input-fields
        },() => location.reload())
    });
}

let editPostForm = document.getElementById('edit-blog-form');
if(editPostForm){
    editPostForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('../functions/updatePost.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this) //format input-fields
        },() =>  window.location = '../index.php')
    });
}

let deletePostForm = document.getElementById('deletePost');
if(deletePostForm){
    deletePostForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('functions/delete.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this) //format input-fields
        },() =>  location.reload())
    });
}

const back = document.getElementById('back');
if(back){
    back.addEventListener('click', redirect);

    function redirect(event) {
        window.location = '../index.php'
    }
}



