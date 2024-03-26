const form = document.querySelector('.login form');
const continueBtn = form.querySelector('.button input');
const errorText = form.querySelector('.error_text');

form.onsubmit = (e) => {
    e.preventDefault(); // preventing form from submitting
}

continueBtn.onclick = () => {
    // ajax
    console.log("clicked");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if (data == "success") {
                    location.href = "usersPage.php";
                    console.log("success");
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    // send the form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData); // sending the form data to php
}