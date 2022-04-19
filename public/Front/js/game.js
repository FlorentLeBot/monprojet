const counterDisplay = document.querySelector("h3");
const divGame = document.querySelector(".play-game");
let counter = 0;

const bubbleMaker = () => {
  // création des bulles (span)
  const bubble = document.createElement("span");
  // taille du span entre 50px et 100px
  const size = Math.random() * 50 + 50 + "px";
  // ajouter la classe bubble au span
  bubble.classList.add("bubble");
  // injection du span dans la div 
  let inj = divGame.appendChild(bubble);
  console.log(inj);
  // ajouter la taille aux bulles
  bubble.style.height = size;
  bubble.style.width = size;
  // positionnement aléatoire au mininum à 50% en bas axe Y
  bubble.style.top = Math.random() * 100 + 100 + "%";
  // positionnement aléatoire axe X
  bubble.style.left = Math.random() * 100 + "%";
  // injection de la variable css --left pour donner une direction de droite/gauche de manière aléatoire
  const plusMinus = Math.random() > 0.5 ? 1 : -1;
  bubble.style.setProperty("--left", Math.random() * 100 * plusMinus + "%");
  // supprimer les bulles au bout de 8 secondes
  setTimeout(() => {
    bubble.remove();
  }, 8000);
  // supprimer une bulle au clic
  bubble.addEventListener("click", () => {
    // incrémentation du compter
    counter++;
    counterDisplay.textContent = counter;
    bubble.remove();
  });
};
// bubbleMaker();

setInterval(bubbleMaker, 2000);
