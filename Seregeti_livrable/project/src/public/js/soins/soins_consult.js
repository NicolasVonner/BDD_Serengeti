import { checkField, disableAllField, displaySQLResult } from "../function/functions.js";

document.getElementById("checkCare").addEventListener("click",(event)=>{
    let consult = [...document.getElementById("consult").elements].slice(1);
    disableAllField(consult,event.target.checked);
});

window.envoyerFormulaireConsult = function envoyerFormulaireConsult()
{
    let consult = document.getElementById("consult-care");
    consult.innerHTML = "";
    let allInfo = document.getElementById("checkCare");
    let formulaire = allInfo.checked ? [...document.getElementById("consult").elements].slice(0,1) : [...document.getElementById("consult").elements].slice(1);


    if (checkField(formulaire) || allInfo.checked)
    {
        let arg = "";
        formulaire.forEach((element,index)=>{
            let value = element.type == "checkbox" ? element.checked : element.value;
            arg += index != formulaire.length-1 ? element.name + "=" + value + "&" : element.name + "=" + value;
        });

        fetch("http://localhost:8000/php/requete/soins/soins_consult.php?"+arg,{
            method: 'GET',
            mode: 'cors',
            cache: 'default' 
        })
        .then(resp=>resp.json())
        .then((result)=>{
            displaySQLResult(result,consult);
        });
    }
    else
    {
        let error = document.createElement("p");
        error.innerText = "Erreur: Des champs sont incomplets";
        error.style.color = "red";
        consult.appendChild(error);
    }
}