// const readMoreBtn = document.querySelectorAll(".read-more-btn");
// const text = document.querySelectorAll(".text");
// const triangle=document.querySelectorAll(".text-container");


// readMoreBtn.forEach((button, index) => {
//   button.addEventListener("click", (e) => {
//     text[index].classList.toggle("show-more");
//     if (button.innerText === "Read More") {
//       button.innerText = "Read Less";
//       button.style.backgroundColor = "rgb(145, 233, 204)";
//     } else {
//       button.innerText = "Read More";
//       button.style.backgroundColor = "rgb(201, 188, 234)";
      

//     }
//   });
// });
document.getElementById('test').addEventListener("click", (e) => {
    var statisticsDiv = document.getElementById('statisticsDiv');
    statisticsDiv.classList.toggle('show');
})
