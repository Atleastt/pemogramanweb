
document.addEventListener("DOMContentLoaded", function () {
    var isiparagraf = document.querySelector("#civicParagraph");
    var tampilan = localStorage.getItem("tampilan");
  
    if (tampilan === "true") {
      isiparagraf.style.display = "block";
    } else {
      isiparagraf.style.display = "none";
    }
  
    document.getElementById("desc").addEventListener("click", function (event) {
      event.preventDefault();
      if (
        isiparagraf.style.display === "none" ||
        isiparagraf.style.display === ""
      ) {
        isiparagraf.style.display = "block";
        localStorage.setItem("tampilan", "true");
      } else {
        isiparagraf.style.display = "none";
        localStorage.setItem("tampilan", "false");
      }
    });
  document.addEventListener("DOMContentLoaded", function () {
    var isiparagraf = document.querySelector("#civicParagraph");
    var tampilan = localStorage.getItem("tampilan");
  
    if (tampilan === "true") {
        isiparagraf.style.display = "block";
    } else {
        isiparagraf.style.display = "none";
    }
  
    document.getElementById("desc").addEventListener("click", function (event) {
        event.preventDefault();
        if (
            isiparagraf.style.display === "none" ||
            isiparagraf.style.display === ""
        ) {
            isiparagraf.style.display = "block";
            localStorage.setItem("tampilan", "true");
        } else {
            isiparagraf.style.display = "none";
            localStorage.setItem("tampilan", "false");
        }
    });

        var comments = [];
    
        function submitComment() {
          var email = document.getElementById("email").value;
          var commentText = document.getElementById("komentar").value;
    
          var comment = {
            email: email,
            text: commentText,
          };
          comments.push(comment);
    
          displayComments();
    
          document.getElementById("email").value = "";
          document.getElementById("komentar").value = "";
        }
    
        function displayComments() {
          var kotakKomentar = document.getElementById("kotak-komentar");
          kotakKomentar.innerHTML = "";
    
          for (var i = 0; i < comments.length; i++) {
            var div = document.createElement("div");
            var emailElem = document.createElement("p");
            var textElem = document.createElement("p");
    
            emailElem.innerHTML = "<b>" + comments[i].email + "</b>";
            textElem.innerHTML = comments[i].text;
    
            div.appendChild(emailElem);
            div.appendChild(textElem);
            kotakKomentar.appendChild(div);
          }
        }
    });