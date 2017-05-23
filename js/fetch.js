
function request(url, options, callback) {
    return fetch(url, options)
        .then(data => data.json())
        .then((data) => {
            console.log(data.id)
            if(data.status !== 200) {
                throw new Error(data.message);
            }
            return data;
        })
        .then(callback)
        .catch((err) => {
            alert(err.message);
        });
}


let commentForm = document.getElementById('comment-form');
if(commentForm){
    commentForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('functions/addComment.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this), //format input-fields
            credentials: 'include', //to access session from php (send session cookie with fetch)
        },(data) => { //callback
            const comList = document.getElementById('comment-list');
            const newComment = renderComment(data);
            comList.insertBefore(newComment, comList.firstChild);
            commentForm.reset();
        })
    });
}


let deletePostForms = document.getElementsByClassName('deletePost');
for(let deleteForm of deletePostForms){
    deletePost(deleteForm);
}

function deletePost(deleteForm){
    deleteForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('../functions/delete.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this), //format input-fields
            credentials: 'include', //to access session from php (send session cookie with fetch)
        },(data) =>  { //callback
            console.log(data.id);
            const deletePostItem = document.getElementById(data.id);
            const parent = deletePostItem.parentElement;
            parent.removeChild(deletePostItem);
        })
    });
}    


let postForm = document.getElementById('post-form');
if(postForm){
    postForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('../functions/addPost.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this), //format input-fields
            credentials: 'include', //to access session from php (send session cookie with fetch)
        },(data) => { //callback
            console.log(data.id);
            const blogList = document.getElementById('blogPost-list');
            const newPost = renderPost(data);
            blogList.insertBefore(newPost, blogList.firstChild);
            postForm.reset();
        })
    });
}


let editPostForm = document.getElementById('edit-blog-form');
if(editPostForm){
    editPostForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('../functions/updatePost.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this), //format input-fields
            credentials: 'include',
        },() =>  window.location = '../views/createPostView.php')
    });
}


const back = document.getElementById('back');
if(back){
    back.addEventListener('click', redirect);

    function redirect(event) {
        window.location = '../views/createPostView.php'
    }
}


let likeForm = document.getElementById('like-form');
if(likeForm){
    likeForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('functions/addLike.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this), //format input-fields
            credentials: 'include', //to access session from php (send session cookie with fetch)
        },() =>  { //callback
            location.reload();
        })
    });
}


let dislikeForm = document.getElementById('dislike-form');
if(dislikeForm){
    dislikeForm.addEventListener('submit', function (event) {
        event.preventDefault(); //Prevent form from submitting
        request('functions/addDislike.php', { //Do post request to php
            method: 'POST',
            body: new FormData(this), //format input-fields
            credentials: 'include', //to access session from php (send session cookie with fetch)
        },() =>  { //callback
            location.reload();
        })
    });
}


function renderComment(commentData) {
    const li = document.createElement('li');
    li.appendChild(createPtag(commentData.text));
    li.appendChild(createPtag(commentData.name));
    li.appendChild(createPtag(commentData.created));
    const hr = document.createElement('hr');
    li.appendChild(hr);
    return li;
}

function renderPost(postData){
    const li = document.createElement('li');
    li.setAttribute("id", postData.id);
    console.log(postData.id);

    const heading = createHeading(postData.title, 'h2');
    const body = createPtag(postData.body);
    const mainDiv = createDiv('blog-post', [heading, body]);
    li.appendChild(mainDiv);

    const created = createPtag('Created: ' + postData.created);
    const updated = createPtag('Updated: ' + '');
    const postedBy = createPtag('Posted by: ' + postData.author);
    const metaDiv = createDiv('blog-post-meta', [created, updated, postedBy]);
    li.appendChild(metaDiv);

    const deleteInputOne = createInput('hidden', postData.id, 'id');
    const deleteInputTwo = createInput('submit', 'delete');
    const deleteForm = createForm('../functions/delete.php', 'POST', 'deletePost', [deleteInputOne, deleteInputTwo]);
    deletePost(deleteForm);
    li.appendChild(deleteForm);

    const editInputOne = createInput('hidden', postData.id, 'id');
    const editInputTwo = createInput('submit', 'edit');
    const editForm = createForm('../views/editPostView.php', 'POST', 'editPost', [editInputOne, editInputTwo]);
    li.appendChild(editForm);

    return li;
}

function createDiv(className, children){
     const div = document.createElement('div');
     div.setAttribute("class", className);
     children.forEach(function(child) {
        div.appendChild(child);
     });
     return div;
}

function createForm(action, method, className, children){
    const form = document.createElement('form');
    form.setAttribute("action", action);
    form.setAttribute("method", method);
    form.setAttribute("class", className);
    children.forEach(function(child) {
        form.appendChild(child);
     });
     return form;
}

function createInput(type, value, name){
    const input = document.createElement('input');
    input.setAttribute("type", type);
    input.setAttribute("value", value);
    input.setAttribute("name", name);
    return input;
}

function createPtag(text){
     const pTag = document.createElement('p');
     const textNode = document.createTextNode(text);
     pTag.appendChild(textNode);
     return pTag;
}

function createHeading(text, h){
    const hTag = document.createElement(h);
    const textNode = document.createTextNode(text);
    hTag.appendChild(textNode);
    return hTag;
}

