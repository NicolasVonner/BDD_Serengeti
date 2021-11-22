let setLoginTag = (userId, path = "") => {
    let loginElement = document.getElementById("login");
    loginElement.innerHTML = "";
    console.log(userId);
    if (userId != null)
        setLoggedLiNav(userId, path);
    let userHTML = userId != null ?
    `<div class="div-login"><span style="color:white;">${userId}  </span><span class="glyphicon glyphicon-user icon-size"></span><a href="../../php/index/deconnection.php">Déconnection</a></div>` :
    `<a href="${path}connexion.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>`;
    loginElement.innerHTML = userHTML.trim();
};

let setLoggedLiNav = (userId, path) => {
    let navUl = document.getElementById("myNavbar").getElementsByTagName("ul")[0];
    console.log(navUl)
    let listOngletNav = [
        {href:`${path}animal.php`, label:"Animal"},
        {href:`${path}login.php`, label:"Login"}
    ];
    let listLiName = [...navUl.getElementsByTagName("li")].map((element)=>element.outerText);
    if (!listOngletNav.map((element)=>element.label).every((li)=>listLiName.includes(li)))
    {
        let html = "";
        listOngletNav.forEach((nav)=>{
            html += `<li><a href="${nav.href}">${nav.label}</a></li>`;
        });
        navUl.innerHTML += html.trim();
    }

};