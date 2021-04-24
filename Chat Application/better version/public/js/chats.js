const form = document.querySelector(".typing-area");
const inputField = document.querySelector("#message");
const sendBtn = document.querySelector(".typing-area button");
const chatBox = document.querySelector(".chat-box");

// console.log("Working");

form.addEventListener("submit", (e) => {
  e.preventDefault(); //Preventing from default form submision
});

sendBtn.addEventListener("click", () => {
  //Ajax
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "insert-chat.php", true);
  xhttp.onload = () => {
    if (xhttp.readyState === XMLHttpRequest.DONE) {
      if (xhttp.status === 200) {
        inputField.value = ""; //Clearing input text once added to database
        scrollToBottom();
      }
    }
  };
  //Getting form Data
  let formData = new FormData(form);
  xhttp.send(formData);
});
chatBox.addEventListener("mouseenter", () => {
  chatBox.classList.add("active");
});
chatBox.addEventListener("mouseleave", () => {
  chatBox.classList.remove("active");
});

setInterval(() => {
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "get-chat.php", true);
  xhttp.onload = () => {
    if (xhttp.readyState === XMLHttpRequest.DONE) {
      if (xhttp.status === 200) {
        let data = xhttp.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  let formData = new FormData(form);
  xhttp.send(formData);
}, 500);

function scrollToBottom() {
  // console.log(chatBox.scrollTo, chatBox.scrollHeight);
  chatBox.scrollTo = chatBox.scrollHeight;
}
