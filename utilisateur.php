<?php
    include ("./sql/action.php");
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم اللاعبين</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="./style/style.cSs?v=2">
    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;
    background-image: linear-gradient(rgba(0, 0, 0, 0.778), rgba(37, 35, 35, 0.3)), url("./images/couts-stades-tottenham-stadium-scaled.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
.navber {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 30px;
    height: 60px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    background-color: rgb(139, 15, 15);
}
.Terrain {
    background-image: url('./images/stadium_background.webp');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 96%;
    height: 850px;
    margin: 30px 0 30px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.main {
    display: flex;
}

.Logo {
    display: flex;
    align-items: center;
    gap: 20px;
}

.links-bar {
    display: flex;
    align-items: center;
    gap: 40px;
}

.img-logo {
    width: 140px;
}

.container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 600px;
    margin: 30px 20px 30px 10px;
    display: flex;
    justify-content: center;
    flex-direction: column;
}

h1 {
    text-align: center;
    margin-bottom: 25px;
}

.form-group {
    width: 40%;
}

label {
    font-size: 16px;
    display: block;
    margin-bottom: 5px;
}

input, select {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

select {
    width: 100%;
}

.btn {
    width: 80%;
    padding: 10px;
    margin: 10px;
    background-color: #d40707;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#btn_GK,#btn_joueur{
    background-color: #eaff00;
    color: black;
}

button:hover {
    background-color: #6b1212;
}

#playerForm {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}
.del1{
    background-color: #d40707;
}
.Attaque div, .Defense div, .center div, .GK div {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px;
    width:100px;
    color: #ffffff;
}

.Attaque, .center, .Defense, .GK {
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 175px;
    margin: 40px 0;
}

.player-item{
    display: flex;
    justify-content: center;
    align-items: start;
    background-image: url("./images/png\ \(1\).png");
    background-repeat:no-repeat ;
    background-size: cover;
    background-position: center;
    width: 140px !important;
    height: 170px !important;
    text-align: center;
}

.info{
    margin-left: 32px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 140px !important;
    height: 170px !important;
    text-align: center;
}
.info1{
    display: flex;
    flex-direction: row;
    justify-content: space-between !important;
    align-items: end !important;
    height: 60px !important;
    width: 90%;
    color: white;
    font-weight: bolder;
}

.flag-club{
    display: flex;
    flex-direction: column;
    gap: 5px;
    width: auto !important;
    height: 30px !important;
    margin-bottom: 3px;
}

.action{
    display: flex;
    flex-direction: column;
    margin:0 0 60px 15px;
    height: 45px !important;
    justify-content: space-between !important;
    align-items: end;
}

.player-item:hover{
    transform: scale(1.1);
    filter: drop-shadow(0px 2px 10px rgb(255, 230, 0));
    border-radius: 30px;
}

.Joueurs_de_reserve {
    border-top: 2px solid #ccc;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
    align-items: center;
}

.footer {
    background-color: #333;
    color: white;
    padding: 20px 0 0 0;
    text-align: center;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-column {
    margin: 20px;
    flex: 1;
    min-width: 250px;
}

.footer-column h4 {
    font-size: 18px;
    color: #f1c40f;
}

.footer-bottom {
    margin-top: 20px;
    font-size: 12px;
    background-color: #2c3e50;
    padding: 10px 0;
}

.footer-bottom p {
    margin: 0;
}

strong{
    margin: 0px 0;
    width: 100px;
    font-size: 12px;
    color: #ffffff;
    height: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.information_joueur p{
    display: flex;
    flex-direction: column;
    margin: 1px;
    font-size: 8px;
    font-weight: bold;
    width: 30px;
}
.information_joueur{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    height: 45px !important;
    background-color: #7c7c7c79;
    border-radius: 10px;
    padding: 5px 0;
    width: 105px;
    color: #ffffff;
}
.photo_joueur{
    margin-top: 10px;
}

i{
    color: white;
}

.open{

    position: fixed;
    font-size: 20px;
    left: -1px;
    top: 10px;
    color: #19305C;
    z-index: 10;
}
.close{
    position: fixed;
    font-size: 20px;
    left: 238px;
    top: 10px;
    color: #19305C;
    z-index: 1;
}


/* Sidebar */
.sidebar {
    width: 241px;
    background-color: #19305C;
    color: white;
    /* padding: 20px; */
    height: 100vh;
    position: fixed;
    z-index: 1;
    top: 0;
}

.sidebar ul {
    list-style-type: none;
    padding: 10px;
}

.sidebar ul li {
    border: 1px solid;
    border-radius: 10px ;
    width: 80%;
    margin: 10px 0;
    padding: 15px ;
    
}

.sidebar ul  a {
    color: white;
    text-decoration: none;
    
    font-size: 18px;
}

.sidebar ul li:hover {
    background-color: #5483ca;
}

.logaout{
    position: absolute;
    background-color: #034078;
    color: #FEFCFB;
    font-weight: bold;
    border: none;
    width: 100%;
    margin:auto;
    padding: 15px;
    bottom: 0px;
    z-index: 20;
    cursor: pointer;
} 

    </style>
</head>
<body>
    <i class="fa-solid fa-square-caret-down fa-rotate-270 open"  onclick="burger_close()"></i>
    <i class="fa-solid fa-square-caret-down fa-rotate-90 close" style="display: none;"  onclick="burger_open()"></i>
    <div class="sidebar" style="display: none;">
        <ul>
            <a href="#"><li>Acceuil</li></a>
            <a href="#"><li>Affichage les joueur</li></a>
            <a href="#"><li>Administator</li></a>
            <a href="#"><li>Utilisator</li></a>
        </ul>
        <form action="#" method="post">
            <button submit class="logaout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
        </form>
    </div>
    <main>
        <div class="Terrain">
            <div class="Attaque">
                <div class="LW Attaq"> 
                    <div class="player-item" id="player_1">
                        <div class="info">
                            <div class="info1">
                                <div class="flag-club">
                                    <img class="flag" src="" alt="" style="width: 15px;">
                                    <img class="club" src="" alt="" style="width: 15px;">
                                </div>
                                <img class="photo_joueur" src="" alt="" width="50" height="50">
                                <span class="rating"></span>
                            </div>
                            <strong class="name">Lionel Messi</strong>
                            <div class="information_joueur">
                                <p class="pac">PAC<span class="pace"></span></p>
                                <p class="sho">SHO<span class="sho"></span></p>
                                <p class="pas">PAS<span class="pas"></span></p>
                                <p class="dri">DRI<span class="dri"></span></p>
                                <p class="def">DEF<span class="def"></span></p>
                                <p class="phy">PHY<span class="phy"></span></p>
                            </div>
                            <strong class="position_joueur">RW</strong>
                        </div>
                        <div class="action">
                            <i class="fa-solid fa-trash"></i>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>
                </div>
                <div class="CF attaq">
                    <div class="player-item" id="player_1">
                    <div class="info">
                        <div class="info1">
                            <div class="flag-club">
                                <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                            </div>
                            <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                            <span class="rating"></span>
                        </div>
                        <strong class="name">Lionel Messi</strong>
                        <div class="information_joueur">
                            <p class="pac">PAC<span class="pace"></span></p>
                            <p class="sho">SHO<span class="sho"></span></p>
                            <p class="pas">PAS<span class="pas"></span></p>
                            <p class="dri">DRI<span class="dri"></span></p>
                            <p class="def">DEF<span class="def"></span></p>
                            <p class="phy">PHY<span class="phy"></span></p>
                        </div>
                        <strong class="position_joueur">ST</strong>
                    </div>
                    <div class="action">
                        <i class="fa-solid fa-trash" ></i>
                        <i class="fa-solid fa-pen-to-square" ></i>
                    </div>
                </div>
            </div>
                <div class="RW attaq">
                    <div class="player-item" id="player_1">
                    <div class="info">
                        <div class="info1">
                            <div class="flag-club">
                                <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                            </div>
                            <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                            <span class="rating"></span>
                        </div>
                        <strong class="name">Lionel Messi</strong>
                        <div class="information_joueur">
                            <p class="pac">PAC<span class="pace"></span></p>
                            <p class="sho">SHO<span class="sho"></span></p>
                            <p class="pas">PAS<span class="pas"></span></p>
                            <p class="dri">DRI<span class="dri"></span></p>
                            <p class="def">DEF<span class="def"></span></p>
                            <p class="phy">PHY<span class="phy"></span></p>
                        </div>
                        <strong class="position_joueur">LW</strong>
                    </div>
                    <div class="action">
                        <i class="fa-solid fa-trash" ></i>
                        <i class="fa-solid fa-pen-to-square" ></i>
                    </div>
                </div>
            </div>
            </div>
            <div class="center">
            <div class="CM">
                <div class="player-item" id="player_1">
                    <div class="info">
                        <div class="info1">
                            <div class="flag-club">
                                <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                            </div>
                            <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                            <span class="rating"></span>
                        </div>
                        <strong class="name">Lionel Messi</strong>
                        <div class="information_joueur">
                            <p class="pac">PAC<span class="pace"></span></p>
                            <p class="sho">SHO<span class="sho"></span></p>
                            <p class="pas">PAS<span class="pas"></span></p>
                            <p class="dri">DRI<span class="dri"></span></p>
                            <p class="def">DEF<span class="def"></span></p>
                            <p class="phy">PHY<span class="phy"></span></p>
                        </div>
                        <strong class="position_joueur">CM</strong>
                    </div>
                    <div class="action">
                        <i class="fa-solid fa-trash" ></i>
                        <i class="fa-solid fa-pen-to-square" ></i>
                    </div>
                </div>
            </div>
            <div class="CM">
                <div class="player-item" id="player_1">
                    <div class="info">
                        <div class="info1">
                            <div class="flag-club">
                                <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                            </div>
                            <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                            <span class="rating"></span>
                        </div>
                        <strong class="name">Lionel Messi</strong>
                        <div class="information_joueur">
                            <p class="pac">PAC<span class="pace"></span></p>
                            <p class="sho">SHO<span class="sho"></span></p>
                            <p class="pas">PAS<span class="pas"></span></p>
                            <p class="dri">DRI<span class="dri"></span></p>
                            <p class="def">DEF<span class="def"></span></p>
                            <p class="phy">PHY<span class="phy"></span></p>
                        </div>
                        <strong class="position_joueur">CM</strong>
                    </div>
                    <div class="action">
                        <i class="fa-solid fa-trash" ></i>
                        <i class="fa-solid fa-pen-to-square" ></i>
                    </div>
                </div>
            </div>
            <div class="CM">
                <div class="player-item" id="player_1">
                    <div class="info">
                        <div class="info1">
                            <div class="flag-club">
                                <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                            </div>
                            <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                            <span class="rating"></span>
                        </div>
                        <strong class="name">Lionel Messi</strong>
                        <div class="information_joueur">
                            <p class="pac">PAC<span class="pace"></span></p>
                            <p class="sho">SHO<span class="sho"></span></p>
                            <p class="pas">PAS<span class="pas"></span></p>
                            <p class="dri">DRI<span class="dri"></span></p>
                            <p class="def">DEF<span class="def"></span></p>
                            <p class="phy">PHY<span class="phy"></span></p>
                        </div>
                        <strong class="position_joueur">CM</strong>
                    </div>
                    <div class="action">
                        <i class="fa-solid fa-trash" ></i>
                        <i class="fa-solid fa-pen-to-square" ></i>
                    </div>
                </div>
            </div>
            </div>
            <div class="Defense">
                <div class="LB">
                    <div class="player-item" id="player_1">
                        <div class="info">
                            <div class="info1">
                                <div class="flag-club">
                                    <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                    <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                                </div>
                                <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                                <span class="rating"></span>
                            </div>
                            <strong class="name">Lionel Messi</strong>
                            <div class="information_joueur">
                                <p class="pac">PAC<span class="pace"></span></p>
                                <p class="sho">SHO<span class="sho"></span></p>
                                <p class="pas">PAS<span class="pas"></span></p>
                                <p class="dri">DRI<span class="dri"></span></p>
                                <p class="def">DEF<span class="def"></span></p>
                                <p class="phy">PHY<span class="phy"></span></p>
                            </div>
                            <strong class="position_joueur">RB</strong>
                        </div>
                        <div class="action">
                            <i class="fa-solid fa-trash" ></i>
                            <i class="fa-solid fa-pen-to-square" ></i>
                        </div>
                    </div>
                </div>
                <div class="CB1">
                    <div class="player-item" id="player_1">
                        <div class="info">
                            <div class="info1">
                                <div class="flag-club">
                                    <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                    <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                                </div>
                                <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                                <span class="rating"></span>
                            </div>
                            <strong class="name">Lionel Messi</strong>
                            <div class="information_joueur">
                                <p class="pac">PAC<span class="pace"></span></p>
                                <p class="sho">SHO<span class="sho"></span></p>
                                <p class="pas">PAS<span class="pas"></span></p>
                                <p class="dri">DRI<span class="dri"></span></p>
                                <p class="def">DEF<span class="def"></span></p>
                                <p class="phy">PHY<span class="phy"></span></p>
                            </div>
                            <strong class="position_joueur">CB</strong>
                        </div>
                        <div class="action">
                            <i class="fa-solid fa-trash" ></i>
                            <i class="fa-solid fa-pen-to-square" ></i>
                        </div>
                    </div>
                </div>
                <div class="CB2">
                    <div class="player-item" id="player_1">
                        <div class="info">
                            <div class="info1">
                                <div class="flag-club">
                                    <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                    <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                                </div>
                                <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                                <span class="rating"></span>
                            </div>
                            <strong class="name">Lionel Messi</strong>
                            <div class="information_joueur">
                                <p class="pac">PAC<span class="pace"></span></p>
                                <p class="sho">SHO<span class="sho"></span></p>
                                <p class="pas">PAS<span class="pas"></span></p>
                                <p class="dri">DRI<span class="dri"></span></p>
                                <p class="def">DEF<span class="def"></span></p>
                                <p class="phy">PHY<span class="phy"></span></p>
                            </div>
                            <strong class="position_joueur">CB</strong>
                        </div>
                        <div class="action">
                            <i class="fa-solid fa-trash" ></i>
                            <i class="fa-solid fa-pen-to-square" ></i>
                        </div>
                    </div>
                </div>
                <div class="RB">
                    <div class="player-item" id="player_1">
                        <div class="info">
                            <div class="info1">
                                <div class="flag-club">
                                    <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                    <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                                </div>
                                <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                                <span class="rating"></span>
                            </div>
                            <strong class="name">Lionel Messi</strong>
                            <div class="information_joueur">
                                <p class="pac">PAC<span class="pace"></span></p>
                                <p class="sho">SHO<span class="sho"></span></p>
                                <p class="pas">PAS<span class="pas"></span></p>
                                <p class="dri">DRI<span class="dri"></span></p>
                                <p class="def">DEF<span class="def"></span></p>
                                <p class="phy">PHY<span class="phy"></span></p>
                            </div>
                            <strong class="position_joueur">LB</strong>
                        </div>
                        <div class="action">
                            <i class="fa-solid fa-trash" ></i>
                            <i class="fa-solid fa-pen-to-square" ></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="GK">
                <div class="player-item" id="player_1">
                    <div class="info">
                        <div class="info1">
                            <div class="flag-club">
                                <img class="flag" src="" alt="Flag of Argentina" style="width: 15px;">
                                <img class="club" src="" alt="Real Madrid Logo" style="width: 15px;">
                            </div>
                            <img class="photo_joueur" src="" alt="Player Photo" width="50" height="50">
                            <span class="rating"></span>
                        </div>
                        <strong class="name">Lionel Messi</strong>
                        <div class="information_joueur">
                            <p class="pac">PAC<span class="pace"></span></p>
                            <p class="sho">SHO<span class="sho"></span></p>
                            <p class="pas">PAS<span class="pas"></span></p>
                            <p class="dri">DRI<span class="dri"></span></p>
                            <p class="def">DEF<span class="def"></span></p>
                            <p class="phy">PHY<span class="phy"></span></p>
                        </div>
                        <strong class="position_joueur">GK</strong>
                    </div>
                    <div class="action">
                        <i class="fa-solid fa-trash" ></i>
                        <i class="fa-solid fa-pen-to-square" ></i>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script src="js/main.js"></script>
</body>
</html>


