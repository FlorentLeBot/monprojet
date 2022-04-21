const mousemove = document.querySelector(".mousemove");
// AJOUTE UN EVENEMENT DE TYPE MOUVEMENT DE LA SOURIS SUR LA FENETRE
window.addEventListener("mousemove", (e) => {
  // JE RAJOUTE SUR L'AXE X LA VALEUR DE pageX en px
  mousemove.style.left = e.pageX + "px";
  // JE RAJOUTE SUR L'AXE Y LA VALEUR DE pageY en px
  mousemove.style.top = e.pageY + "px";
});

window.addEventListener("mousedown", () => {
  mousemove.style.transform = "scale(2) translate(-25%, -25%)";
  mousemove.style.border = "2px solid green";
});
window.addEventListener("mouseup", () => {
  mousemove.style.transform = "scale(1) translate(-50%, -50%)";
  mousemove.style.border = "2px solid blue";
});
// window.addEventListener("click", (e) => {
//   console.log(mousemove);
//    e.preventDefault();
//   console.log(e.target)
//   mousemove.style.display = "none";
//   e.target.click()

// });











