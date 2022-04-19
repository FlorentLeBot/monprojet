let search = document.getElementById("address");

document.querySelector("#address").addEventListener("input", function () {
  
  let url = `https://api-adresse.data.gouv.fr/search/?q=${this.value}&limit=5`;

  fetch(url)
    .then((response) =>
      response.json().then((data) => {
        document.querySelector("#mes-adresses").innerHTML="";
        let affichage = document.createElement("ul");
        for (let address of data.features) {
          let li = document.createElement("li");
          li.innerText = address.properties.label;        
          li.addEventListener("click", () => {
            search.value = address.properties.label;
            document.querySelector("#mes-adresses").innerHTML="";
          });
          affichage.appendChild(li);
        }
        document.querySelector("#mes-adresses").appendChild(affichage);   
        
      })
    )
    .catch((err) => console.log("Erreur : " + err));
});