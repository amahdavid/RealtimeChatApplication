const searchBar = document.querySelector('.users .search input');
const searchBtn = document.querySelector('.users .search button');
const usersList = document.querySelector('.users .users_list');

searchBtn.onclick = () => {
    searchBar.classList.toggle('active');
    if (searchBar.classList.contains('active')) {
        searchBar.focus();
    } else {
        searchBar.blur();
    }    
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
                console.log(data);
            }
        }
    }
    // let formData = new FormData();
    // formData.append("search", searchBar.value);
    xhr.send();
}
, 600);