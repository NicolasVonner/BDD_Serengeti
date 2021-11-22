import { checkField, displaySQLResult } from "../function/functions.js";

window.envoyerFormulaireUpdate = function envoyerFormulaireUpdate() {
    let update = document.getElementById("updated-vaccin");
    update.innerHTML = "";
    let formulaire = [...document.getElementById("update").elements];
    console.log(formulaire);

    if (checkField(formulaire))
    {
        const formData = new FormData();
        formulaire.forEach((element)=>{
            console.log(element.name + " " + element.value)
            formData.append(element.name,element.value);
        });

        fetch("http://localhost:8000/php/requete/vaccins/vaccins_update.php?",{
            method: 'POST',
            mode: 'no-cors',
            cache: 'default',
            body: formData
        })
        .then(resp=>resp.json())
        .then((result)=>{
            console.log(result);
            displaySQLResult(result,update);
        });
    }
}