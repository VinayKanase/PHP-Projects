const searchBar = document.getElementById("search");
const searchBtn = document.getElementById("searchbtn");
const searchIcon = document.querySelector("#searchbtn i");
const usersList = document.querySelector(".users .users-list");

searchBtn.addEventListener("click", () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value = "";
  // console.log();
  if (searchIcon.classList[1] === "fa-search") {
    searchIcon.classList.remove("fa-search");
    searchIcon.classList.add("fa-close");
  } else if (searchIcon.classList[1] === "fa-close") {
    searchIcon.classList.remove("fa-close");
    searchIcon.classList.add("fa-search");
  }
});

searchBar.onkeyup = () => {
  let searchText = searchBar.value;

  if (searchText != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "php/search.php", true);
  xhttp.onload = () => {
    if (xhttp.readyState === XMLHttpRequest.DONE) {
      if (xhttp.status === 200) {
        let data = xhttp.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("searchText=" + searchText);
};

setInterval(() => {
  let xhttp = new XMLHttpRequest();
  xhttp.open("GET", "php/users.php", true);
  xhttp.onload = () => {
    if (xhttp.readyState === XMLHttpRequest.DONE) {
      if (xhttp.status === 200) {
        let data = xhttp.response;
        if (!searchBar.classList.contains("active")) {
          usersList.innerHTML = data;
        }
      }
    }
  };
  xhttp.send();
}, 500);
