window.onload = () => {
  document.body.classList.add("loaded_hiding");
  setTimeout(() => {
    document.body.classList.add("loaded");
    document.body.classList.remove("loaded_hiding");
  }, 500);
};

document.addEventListener("DOMContentLoaded", () => {
  const showMoreButtons = document.querySelectorAll(".show-more-button");

  showMoreButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const featuresDiv = button.parentNode.querySelector(".features");
      featuresDiv.classList.toggle("show");

      if (featuresDiv.classList.contains("show")) {
        button.textContent = "Show less";
      } else {
        button.textContent = "Show more";
      }
    });
  });
});
