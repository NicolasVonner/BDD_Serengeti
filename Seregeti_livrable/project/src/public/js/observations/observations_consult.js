import { checkField, disableAllField, displaySQLResult } from "../function/functions.js";

document.getElementById("checkObservation").addEventListener("click",(event)=>{
    let consult = [...document.getElementById("consult").elements].slice(1);
    disableAllField(consult,event.target.checked);
});

document.getElementById("typeRessencementConsult").addEventListener("change",(event)=>{
    let titleReport = document.getElementById("title-consult-espece");
    if (event.target.value == "Animal")
        titleReport.innerHTML = "Consulter un Animal";
    else
        titleReport.innerHTML = "Consulter un Végétal";
});


window.envoyerFormulaireConsult = function envoyerFormulaireConsult()
{
    let consult = document.getElementById("consult-ressencement");
    consult.innerHTML = "";
    let allInfo = document.getElementById("checkObservation");
    let formulaire = allInfo.checked ? [...document.getElementById("consult").elements].slice(0,2) : [...document.getElementById("consult").elements].slice(1);
    console.log(formulaire);


    if (checkField(formulaire) || allInfo.checked)
    {
        let arg = "";
        formulaire.forEach((element,index)=>{
            let value = element.type == "checkbox" ? element.checked : element.value;
            arg += index != formulaire.length-1 ? element.name + "=" + value + "&" : element.name + "=" + value;
        });

        fetch("http://localhost:8000/php/requete/observations/observations_consult.php?"+arg,{
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