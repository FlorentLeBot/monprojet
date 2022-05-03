// let links = document.querySelectorAll(".bloc-link");
// // console.log("hello");
// console.log(links);

// // links.forEach(link => {
//   links.addEventListener('click', function () {
//     links.forEach(lk => lk.classList.remove('active'));
//     this.classList.add(' active');
//   });
// // });

navbar = document.querySelector('.bloc-links').querySelectorAll('.bloc-link');
let links = localStorage.setItem('.bloc-links', 'block-link');
console.log(links);
// if (sessionStorage.getItem("autosave")) {
//     // Restauration du contenu du champ
//     navbar.value = sessionStorage.getItem("autosave");
//   }
  
//   // Écoute des changements de valeur du champ
//   navbar.addEventListener("change", function() {
//     // Enregistrement de la saisie utilisateur dans le stockage de session
//     sessionStorage.setItem("autosave", navbar.value);
//   });

// console.log(navbar);
navbar.forEach(element => {
    element.addEventListener('click', function(){
        navbar.forEach(nav=>nav.classList.remove('active'));
        this.classList.add('active')
    });
});