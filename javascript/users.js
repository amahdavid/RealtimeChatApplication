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

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    let xhr = new XMLHttpRequest();
    if (searchTerm != "") {
        searchBar.classList.add('active');
    } else {
        searchBar.classList.remove('active');
    }
    xhr.open("POST", "../php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchBar.classList.contains('active')) {
                    usersList.innerHTML = data;
                }
            }   
        }
    }
    xhr.send();
}
, 600);