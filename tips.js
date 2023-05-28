(function () {
  let tips = Array.from(document.querySelectorAll(".tip"));
  let index = 0;
  tips[0].style.display = "block";

  setInterval(function () {
    tips[index].style.display = "none";
    index = (index + 1) % tips.length;
    tips[index].style.display = "block";
  }, 15000); // Change tip every 5 seconds
})();
