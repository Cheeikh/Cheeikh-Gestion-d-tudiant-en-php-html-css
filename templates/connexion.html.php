<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    transition: 1s;
}

body {
    height: 100vh;
    background-color: rgb(245, 244, 244);
    display: flex;
    flex-wrap: wrap;
}

form {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

body:has(.sliding:checked) .side_bar {
    transform: translateX(-300px);
}

body:has(.sliding:checked) .top_bar {
    position: absolute;
    width: 90%;
    right: 5%;
}

body:has(.sliding:checked) .down_bar {
    position: absolute;
    width: 90%;
    left: 5%;
}

body:has(.sliding:checked) .promotion_bar {
    position: absolute;
    width: 90%;
    left: 5%;
}

body:has(.sliding:checked) .promo_list {
    position: absolute;
    width: 90%;
    left: 5%;
}

body:has(.sliding:checked) .titre {
    position: absolute;
    left: 5%;
}

body:has(.sliding:checked) .titre_desc {
    right: 5%;
}



.sliding {
    position: absolute;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border: none;
}

input {
    width: 100%;
    height: 100%;
    background-color: transparent;
    border-color: transparent;
    font-size: 1vw;
    color: gray;
}

button {
    background-color: transparent;
}

input:focus {
    outline: none;
}

label {
    position: absolute;

}

input:focus+.fa-star {
    opacity: 0;
}

a {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 2;
    cursor: pointer;
}






.side_bar {
    position: relative;
    background-color: white;
    height: 100%;
    width: 16%;
    transition: 1s;
    display: flex;
}

.logo {
    height: 6%;
    width: 60%;
    margin: 15px 0 0 15px;
    background-image: url("../img/Logo-Sonatel-Academy.png");
    background-size: contain;
    background-repeat: no-repeat;
}


.menu_title {
    position: absolute;
    top: 10%;
    left: 14%;
    display: flex;
    color: rgb(167, 166, 166);
    font-size: 1vw;
}

.trait {
    position: absolute;
    width: 1vw;
    height: 0.1vw;
    align-items: center;
    background-color: rgb(167, 166, 166);
    top: 50%;
    left: -50%;
}

.menu_contain {
    position: absolute;
    top: 13.5%;
    margin-left: 3%;
    width: 85%;
    height: 39%;
    display: flex;
    flex-direction: column;
}

.item {

    width: 100%;
    font-size: 0.8vw;
    font-weight: 200;
    margin-left: 6%;
    cursor: pointer;
    flex: 1;
    border-radius: 0.5vw;
    display: flex;
    align-items: center;
    padding-left: 10%;

}

.item:hover {
    color: white;
    background-color: rgb(52, 174, 128);
}

.fa-chart-simple {
    transform: rotate(-90deg);


}

.fa {
    margin-right: 7%;
    opacity: 0.6;
}




.top_bar {
    background-color: white;
    width: 82%;
    height: 8%;
    right: 1%;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    transition: 1s;
    position: absolute;
    display: flex;
}

.menu1 {
    position: absolute;
    align-self: center;
    left: 1.1%;
    cursor: pointer;

}

.bi-list {
    font-size: 2vw;
    cursor: pointer;
}

.menu2 {
    position: absolute;
    align-self: center;
    left: 5%;
    width: 2.3vw;
    height: 2.3vw;

    border-radius: 50%;
    background-color: rgb(245, 244, 244);
    cursor: pointer;
}

.search_bar {
    position: absolute;
    align-self: center;
    left: 10%;
    width: 22%;
    height: 50%;

    border-radius: 1.5vw;
    background-color: rgb(245, 244, 244);
    display: flex;
}

.fa-magnifying-glass {
    font-size: 1.2vw;
    color: rgb(80, 183, 137);
    position: absolute;
    right: 5%;
    align-self: center;
    cursor: pointer;
}

.date {
    position: absolute;
    padding: 0.5%;
    right: 15%;
    width: 11%;
    height: 52%;
    border: 0.2vw solid rgb(245, 244, 244);
    align-self: center;
    display: flex;
    color: rgb(80, 183, 137);
    align-items: center;
    font-size: 0.9vw;
    justify-content: space-around;
    font-weight: bold;
    cursor: pointer;
}

.pp {
    position: absolute;
    align-self: center;
    right: 10.5%;
    width: 2.7vw;
    height: 2.7vw;

    border-radius: 50%;
    background-color: rgb(230, 229, 229);
    cursor: pointer;
}

.username {
    position: absolute;
    color: rgb(80, 183, 137);
    font-size: 0.9vw;
    font-weight: 500;
    right: 2%;
    top: 24%;
    cursor: pointer;
}

.username_statut {
    position: absolute;
    display: flex;
    color: rgb(0, 0, 0);
    font-size: 0.9vw;
    font-weight: 500;
    right: 2.5%;
    top: 50%;
    cursor: pointer;
}

.more {
    margin-left: 0.2vw;
    rotate: -90deg;
    position: absolute;
    right: -16%;
    font-size: 1.2vw;
    font-weight: 900;
    color: gray;
    cursor: pointer;
}




.titre {
    position: absolute;
    font-size: 1.2vw;
    font-weight: 900;
    width: 10%;
    height: 3%;
    top: 12.5%;
    left: 17.2%;
}

.titre_desc {
    position: absolute;
    display: flex;
    width: 8.5%;
    height: 3%;
    top: 12.5%;
    right: 1%;

    justify-content: space-between;
    font-size: 0.8vw;
    align-items: center;
    font-weight: 300;
}

.point {
    width: 0.4vw;
    height: 0.4vw;
    border-radius: 50%;
    background-color: rgb(187, 181, 181);
}





.promotion_bar {
    position: relative;
    width: 82%;
    height: 45%;
    position: absolute;
    top: 18%;
    left: 17%;
    border-radius: 15px;
    background-color: white;
    transition: 1s;
}

.step1 {
    position: absolute;
    width: 2.6vw;
    height: 2.6vw;
    border-radius: 50%;
    background-color: rgb(52, 174, 128);
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 1.3vw;
    z-index: 2;
    font-weight: 900;
    top: 9%;
    left: 3%;
}

.step2 {
    position: absolute;

    width: 2.6vw;
    height: 2.6vw;
    border-radius: 50%;
    background-color: rgb(214, 235, 235);
    display: flex;
    justify-content: center;
    align-items: center;
    color: rgb(52, 174, 128);
    font-size: 1.3vw;
    bottom: 6%;
    left: 3%;
    font-weight: 900;
}

.step_link {
    position: absolute;
    width: 0;
    height: 70%;
    border: 1px solid rgb(35, 31, 31);
    margin: 0 0 4% 4.5%;
    top: 19%;
    opacity: 0.1;

}

.current_step {
    position: absolute;
    font-size: 1vw;
    font-weight: 600;
    width: 10%;
    height: 3%;
    top: 11%;
    left: 7%;
}

.next_step {
    position: absolute;
    font-size: 1vw;
    font-weight: 600;
    width: 10%;
    height: 3%;
    bottom: 11%;
    left: 7%;
}

.libelle {
    position: absolute;
    top: 21%;
    left: 7.2%;
    display: flex;
    color: rgb(91, 87, 87);
    font-size: 1vw;
    font-weight: 500;
}

.libelle_contain {
    position: absolute;
    border: 2px solid rgb(192, 190, 190);
    width: 91%;
    height: 13%;
    top: 29%;
    left: 7.2%;
    border-radius: 0.6vw;
}

.date_start {
    position: absolute;
    top: 47%;
    left: 7.2%;
    display: flex;
    color: rgb(91, 87, 87);
    font-size: 1vw;
    font-weight: 500;
}

.date_end {
    position: absolute;
    top: 47%;
    left: 53.4%;
    display: flex;
    color: rgb(91, 87, 87);
    font-size: 1vw;
    font-weight: 500;
}

.date_start_contain {
    position: absolute;
    border: 2px solid rgb(192, 190, 190);
    width: 45%;
    height: 13%;
    top: 55%;
    left: 7.2%;
    border-radius: 0.6vw;
}

.date_end_contain {
    position: absolute;
    border: 2px solid rgb(192, 190, 190);
    width: 45%;
    height: 13%;
    top: 55%;
    left: 53.4%;
    border-radius: 0.6vw;

}

.add_button {
    position: absolute;
    width: 12%;
    height: 9.5%;
    background-color: rgb(18, 18, 169);
    bottom: 19%;
    left: 7.2%;
    border-radius: 0.2vw;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 0.7vw;
    font-weight: 700;
    color: white;
    cursor: pointer;
}

.create_button {
    position: absolute;
    width: 10%;
    height: 9.5%;
    background-color: rgb(19, 134, 90);
    bottom: 19%;
    right: 1.5%;
    border-radius: 0.2vw;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 0.7vw;
    font-weight: 700;
    color: white;
    cursor: pointer;
}






.down_bar {
    position: absolute;
    bottom: 0;
    left: 17%;
    width: 82%;
    height: 8%;

    border-radius: 15px 15px 0 0;
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    color: gray;
    font-size: 0.8vw;
    transition: 1s;
}

.setting {
    position: absolute;
    bottom: 4%;
    right: 0.4%;
    width: 3vw;
    height: 3vw;
    border-radius: 50%;
    background-color: rgb(52, 174, 128);
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 1.3vw;
    font-weight: 900;
    cursor: pointer;
}

.connexion {
    width: 30%;
    height: 60%;
    position: relative;
}

.login_contain {
    position: absolute;
    top: 17%;
    height: 55%;
    width: 100%;
    border-radius: 0.6vw;
    background-color: white;
    display: flex;
}

.login_required {
    width: 93%;
    height: 17%;
    background-color: rgb(255, 219, 219);
    color: rgb(144, 104, 104);
    margin: 0 auto;
    margin-top: 4%;
    border-radius: 0.3vw;
    border: 1px solid rgb(201, 167, 167);
    display: flex;
    padding-left: 2%;
    align-items: center;
    font-size: 0.8vw;
}

.login_username_contain {
    position: absolute;
    border: 2px solid rgb(192, 190, 190);
    width: 93%;
    height: 11%;
    top: 39.5%;
    left: 3.5%;
    border-radius: 0.6vw;
}

.login_password_contain {
    position: absolute;
    border: 2px solid rgb(192, 190, 190);
    width: 93%;
    height: 11%;
    top: 59%;
    left: 3.5%;
    border-radius: 0.6vw;
}

.login_button {
    position: absolute;
    bottom: 5%;
    width: 100%;
    height: 11%;
    border-radius: 0.6vw;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    background-color: rgb(52, 174, 128);
    font-size: 1vw;
    font-weight: 500;
    cursor: pointer;
}

.promo_list {
    position: relative;
    width: 82%;
    height: 40%;
    position: absolute;
    top: 18%;
    left: 17%;
    border-radius: 15px;
    background-color: white;
    display: flex;
    justify-content: center;

}

.promo_list_contain {
    position: relative;
    width: 96%;
    margin-top: 3.5%;
    height: 70%;
    box-shadow: 5px 4px 10px rgb(223, 222, 222);
    display: flex;
}

.promo_list_title {
    position: absolute;
    font-size: 1vw;
    font-weight: 800;
    width: 20%;
    height: 3%;
    top: 8%;
    margin-left: 1.5%;
    margin-right: 0.5%;
}

.promo_list_number {
    position: absolute;
    top: 7%;
    left: 16%;
    color: rgb(52, 174, 128);
    font-size: 1vw;
    font-weight: bold;
}

.new_button {
    position: absolute;
    width: 10%;
    height: 15%;
    background-color: rgb(19, 134, 90);
    top: 8%;
    right: 1.5%;
    border-radius: 0.2vw;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 0.vw;
    font-weight: bolder;
    color: white;
    cursor: pointer;
}

.category_contain {
    width: 95%;
    height: 20%;
    position: absolute;
    left: 2.5%;
    top: 30%;
    border-radius: 0.3vw;
    background-color: rgb(236, 242, 242);
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.cat {
    font-size: 0.8vw;
}

.referentiel_picture1 {
    background: url("../img/classroom.jpg") no-repeat;
    background-size: contain;
    border: 1px solid black;
    position: absolute;
    width: 75%;
    height: 40%;
    top: 20%;
}

.apprenant_contain {
    position: absolute;
    width: 81.8%;
    height: 73%;

    top: 18%;
    left: 17.3%;
    /* overflow: scroll; */
}

.apprenant_top {
    width: 100%;
    height: 11.5%;

    background-color: white;

    position: absolute;
}

.apprenant_mid {
    width: 100%;
    height: 85%;
    border-radius: 0.5vw;
    background-color: white;

    position: absolute;
    top: 15%;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    padding-top: 60px;
}

/* Affichage du popup */
.modal:target {
    display: block;
}

/* Affichage du modal lorsque la cible est sélectionnée */
/* Conteneur du popup */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    /* Ajustement de la largeur pour les écrans larges */
    max-width: 1200px;
    /* Limitation de la largeur maximale */
    position: relative;
}

/* Styles de l'en-tête du modal */
.head {
    padding: 1%;
    position: absolute;
    top: 0;
    left: 0;
    justify-content: space-between;
    align-items: center;
    background: #f8f8f8;
    width: 100%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    text-decoration: none;
}

/* style du bouton pour fermer */
.close:hover,
.close:focus {
    color: black;
    cursor: pointer;
}


/* Styles des liens */
a {
    text-decoration: none;
}

/* Styles des sections du popup */
.section {
    position: relative;
    margin-top: 5%;
    /* Espacement supérieur */
}

/* Styles des boutons */
.btn {
    background-color: #038e89;
    color: white;
    padding: 6%;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}


/* Styles pour la première ligne de contenu */
.line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 5% 0;
    /* Espacement supérieur et inférieur */
}

/* Styles pour les éléments de la première ligne de contenu */
.line :nth-child(1) {
    background: #038e89;
    height: 50px;
    color: white;
    width: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 100%;
    margin-right: 1%;
}

.line :nth-child(3) {
    width: 48%;
    /* Largeur réduite pour les écrans plus petits */
    height: 1px;
    background: #aaa;
}

.line :nth-child(4) {
    text-align: center;
    height: 50px;
    border-radius: 100%;
    font-weight: bold;
    width: 4%;
    margin-right: auto;
}

.line :nth-child(5) {
    margin-left: 1%;
}

/* Styles pour le groupe d'entrées */
.input-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 10px;
}

.input-group>div {
    width: 49%;
    margin-bottom: 10px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
}

/* Styles pour le bouton "Annuler" */
.cancel-btn {
    padding: 10px 15px;
    width: 30%;
    background: #f0edf4;
    color: black;
    justify-content: center;
    align-items: center;
    display: flex;

}

/* Styles pour les champs d'entrée */
.input-group input[type="text"],
.input-group input[type="email"],
.input-group input[type="file"],
.input-group input[type="date"],
.input-group select {
    width: calc(100% - 20px);
    /* Largeur ajustée avec marge */
    height: 141%;
    margin-top: 12%;
    /* padding: 12px 10px; */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn:hover {
    opacity: 0.8;
}

/* Nouveaux styles pour le conteneur des boutons */
.btn-container {
    position: absolute;
    bottom: 10%;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    width: 35%;
    max-width: 600px;
}

/* Styles pour l'icône de champ date */
.date-input-container {
    position: relative;
}

[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
}

.date-input-container input[type="date"]::-webkit-calendar-picker-indicator {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    width: 30px;
    height: 100%;
    padding: 0;
    margin: 0;
    background-color: transparent;
    /* Fond transparent pour masquer l'icône par défaut */
}

.date-input-container input[type="date"]+.fa-calendar-day {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    right: 5%;
    top: 60%;
    height: 40%;
    /* Largeur ajustée de l'icône */
    width: 5%;
    /* Largeur ajustée de l'icône */
    transform: translateY(-50%);
    background-color: #038e89;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

/* styles pour les boutons sur les petits écrans */
@media screen and (max-width: 480px) {
    .modal-content {
        width: 90%;
        margin: 5% auto;
    }

    .input-group>div {
        width: 100%;
    }

    .line {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .line :nth-child(1) {
        margin-right: 0;
        margin-bottom: 5%;
    }

    .line :nth-child(3) {
        width: 70%;
        margin-bottom: 5%;
    }

    .line :nth-child(4) {
        width: 80%;
        margin-right: 0;
        margin-bottom: 5%;
    }

    .btn-container {
        width: 100%;
        max-width: 600px;
    }

    .btn-container .btn {
        margin-bottom: 5px;
        width: 100%;
    }
}

.button_sidebar {
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: left;
}
</style>
<body>
<form action="../login_process.php" method="post">

<div class="connexion">
    <div class="logo1" style="transform: scale(2);left: 35%;position: absolute;;"></div>
    <div class="login_contain">
        <div class="login_required">Email et Mot de Passe Requis</div>
    </div>
    <label for="" style="position: absolute;top: 32.7%;left: 3.5%;">Email Address
        <i class="fa-solid fa-star"
            style="color: #cc020d;position: absolute;top: 32%;right: -12%; font-size: 0.4vw;"></i>
    </label>
    <div class="login_username_contain">
        <input type="email" placeholder="Enter email adress" name="username" style="margin-left: 3%;">
        <i class="fa-solid fa-star"
            style="color: #cc020d;position: absolute;top: 40%;left: 35%; font-size: 0.4vw;"></i>
    </div>
    <label for="" style="position: absolute;top: 53%;left: 3.5%;">Password</label>
    <div class="login_password_contain">
        <input type="password" name="password" placeholder="Enter your password" style="margin-left: 3%;">
        <i class="fa-solid fa-star"
            style="color: #cc020d;position: absolute;top: 40%;left: 38%; font-size: 0.4vw;"></i>
        <i class="fa-solid fa-eye-slash"
            style="position: absolute;right: 4%;top: 30%;font-size: 1.1vw;cursor: pointer;"></i>
    </div>
    <div class="remember_check">
        <input type="checkbox" name="" id=""
            style="position: absolute; width: 3.5%; height: 3.5%; bottom: 20%;accent-color: #74992e;">
        <div style="position: absolute;bottom: 20%; left: 5%; opacity: 0.5;">Remember me</div>
    </div>
    <div class="password_forget"
        style="position: absolute;color: rgb(52, 174, 128);bottom: 20%;right: 2%;cursor: pointer;">Mot de passe
        Oublié ?
    </div>
    <div class="login_button">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_POST["connect"])) {
            if ($_POST["connect"] == "clic") {
                echo "le bouton a ete cliquer";
            } else {
                echo '   aucune action';
            }
        }

        ?>
        <button type="submit"
            style="text-decoration: none;color: white;width: 100%;height: 100%;display: flex;justify-content: center;align-items: center;">Log
            in
        </button>
</form>
</div>
</div>
</body>
</html>