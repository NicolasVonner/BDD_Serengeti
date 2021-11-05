import { checkField } from "../function/functions.js";

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
    let formulaire = [...document.getElementById("consult").elements];


    if (checkField(formulaire))
    {
        let arg = "";
        formulaire.forEach((element,index)=>{
            arg += index != formulaire.length-1 ? element.name + "=" + element.value + "&" : element.name + "=" + element.value;
        });

        fetch("http://localhost:8000/php/requete/observations/observations_consult.php?"+arg,{
            method: 'GET',
            mode: 'cors',
            cache: 'default' 
        })
        .then(resp=>resp.json())
        .then((html)=>{
            if (html.length > 0)
            {
                let arrayColumn = [formulaire[0].value == "Animal" ? "animal" : "vegetal","zone","nombre","date"];
                let column = document.createElement("div");
                column.className = "column-consult";
                let columnHTML = '<div><ul>';
                arrayColumn.forEach((nom,index)=> {
                    columnHTML += `<li><p>${nom}</p></li>`;
                });
                columnHTML += "</div>";
                column.innerHTML = columnHTML.trim();
                consult.appendChild(column);

                let table = document.createElement("div");
                if (html.length > 8)
                {
                    table.id = "consult-ressencement-scroll";
                    table.className = "consult-ressencement-scroll-padding";
                }
                table.innerHTML = '<ul>';
                html.forEach((rowData)=>{
                    let row = document.createElement("div");
                    row.className = "row-consult";
                    let rowHTML = '<ul>';
                    arrayColumn.forEach((nom)=>{
                        rowHTML += `<li><p>${rowData[nom]}</p></li>`;
                    });
                    row.innerHTML = rowHTML.trim();
                    table.appendChild(row);
                });
                consult.appendChild(table);
            }
            else
            {
                let error = document.createElement("p");
                error.innerText = "Aucunes données trouvées";
                consult.appendChild(error);
            }
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