function burger_open() {
    const sidebar = document.getElementsByClassName("sidebar")[0];
    const close = document.getElementsByClassName("close")[0];
    const open = document.getElementsByClassName("open")[0];
    const dash = document.getElementById("page-content-wrapper");
    sidebar.style.display = "none";
    open.style.display = "block";
    close.style.display = "none";
    dash.style.marginLeft = "0px";
}

function burger_close() {
    const sidebar = document.getElementsByClassName("sidebar")[0];
    const close = document.getElementsByClassName("close")[0];
    const open = document.getElementsByClassName("open")[0];
    const dash = document.getElementById("page-content-wrapper");
    sidebar.style.display = "block";
    open.style.display = "none";
    close.style.display = "block";
    dash.style.marginLeft = "235px";
}

let form = document.getElementById("position");

form.addEventListener("change", () => {
    let joueur = document.getElementsByClassName("joueur");
    let GK = document.getElementsByClassName("GK");
    if (form.value !== "GK") {
        for (let i = 0; i < joueur.length; i++) {
            joueur[i].style.display = "grid";
        }
        for (let i = 0; i < GK.length; i++) {
            GK[i].style.display = "none";
        }
    } else {
        for (let i = 0; i < joueur.length; i++) {
            joueur[i].style.display = "none";
        }
        for (let i = 0; i < GK.length; i++) {
            GK[i].style.display = "grid";
        }
    }
});


