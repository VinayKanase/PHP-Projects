const form = document.querySelector(".login form");
const submitBtn = document.querySelector(".button input[type='submit']");
const errorText = document.querySelector(".error-txt");
form.addEventListener("submit", (e) => {
  e.preventDefault(); //Preventing from default form submision
});
submitBtn.addEventListener("click", () => {
  //Ajax
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "php/login.php", true);
  xhttp.onload = () => {
    if (xhttp.readyState === XMLHttpRequest.DONE) {
      if (xhttp.status === 200) {
        let data = xhttp.response;
        if (data == "success") {
          location.href = "users.php";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };
  //Getting form Data
  let formData = new FormData(form);
  xhttp.send(formData);
});
