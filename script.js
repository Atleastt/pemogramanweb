
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
  });