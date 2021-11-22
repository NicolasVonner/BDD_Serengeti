let setLoginTag = (userId, connexionPath = "connexion.php") => {
    let loginElement = document.getElementById("login");
    loginElement.innerHTML = "";
    console.log(userId);
    let userHTML = userId != null ?
    `<div class="div-login"><span style="color:white;">${userId}  </span><span class="glyphicon glyphicon-user icon-size"></span><a href="../../php/index/deconnection.php">Déconnection</a></div>` :
    `<a href=${connexionPath}><span class="glyphicon glyphicon-log-in"></span> Login</a>`;
    loginElement.innerHTML = userHTML.trim();
};