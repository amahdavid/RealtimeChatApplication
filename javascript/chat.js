const form = document.querySelector('.typing-area');
const inputField = form.querySelector('.input-field');
const sendBtn = form.querySelector('button');
const chatBox = document.querySelector('.chat_box');

form.onsubmit = (e) => {
    e.preventDefault();
}

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/insertChat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; // Clear the input field
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/getChat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                // console.log("sent");
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
, 500);