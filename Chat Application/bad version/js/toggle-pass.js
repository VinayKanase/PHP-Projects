const passinp = document.getElementById("password");
const eye = document.getElementById("eye");

eye.addEventListener("click", () => {
  if (passinp.type === "password") {
    passinp.type = "text";
    // fa-eye-slash
    eye.classList.remove("fa-eye");
    eye.classList.add("fa-eye-slash");
  } else if (passinp.type === "text") {
    passinp.type = "password";
    eye.classList.remove("fa-eye-slash");
    eye.classList.add("fa-eye");
  }
});
