addEventListener('keyup', () => {
    let input = document.getElementById('search').value;
    input = input.toLowerCase();
    let res = document.getElementsByClassName('table-results');

    for (i = 0; i < res.length; i++) {
        if (!res[i].innerHTML.toLowerCase().includes(input)) {
            res[i].style.display= "none";
        }
        else {
            res[i].style.display="list-item";
        }
    }
}




