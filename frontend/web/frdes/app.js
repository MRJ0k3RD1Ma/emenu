const category = document.querySelectorAll(".category-item");
const categoryWidth = () => {
  for (let i = 0; i < category.length; i++) {
    const element = category[i];
    const elWidth = element.scrollWidth.toString() + "px";
    element.style.height = elWidth;
  }
};
categoryWidth();
window.addEventListener("resize", () => categoryWidth());

const body = document.querySelector("body");
const darkSvg = document.getElementById('darkSvg')
const lightSvg = document.getElementById('lightSvg')


if (localStorage.getItem("darkMode") == "dark") {
  body.classList.add("dark");
  darkSvg.classList.remove("hidden");
  lightSvg.classList.add("hidden");
}

const darkMode = () => {
  let localStorageValue = localStorage.getItem("darkMode");
  if (localStorageValue == "dark") {
    localStorage.setItem("darkMode", "light");
    body.classList.remove("dark");
    darkSvg.classList.add("hidden");
    lightSvg.classList.remove("hidden");
  } else {
    localStorage.setItem("darkMode", "dark");
    body.classList.add("dark");
    darkSvg.classList.remove("hidden");
    lightSvg.classList.add("hidden");
  }
};
