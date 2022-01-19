const btn = document.getElementById("back-to-top");
const nav = document.getElementById("nav");
const navbarIcon = document.querySelector(".burger-menu");

navbarIcon.addEventListener("click", () => {
  nav.classList.toggle("hide");
});

window.addEventListener("scroll", () => {
  if (window.scrollY > 200) {
    btn.classList.add("show");
  } else {
    btn.classList.remove("show");
  }
});

window.addEventListener("scroll", () => {
  if (window.scrollY > 100) {
    nav.style.top = 0;
    navbarIcon.classList.add("show");
  }
});
