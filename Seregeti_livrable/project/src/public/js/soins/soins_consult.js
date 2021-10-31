import { checkField } from "../function/functions.js";


function createModal(text, id)
{
    let html = `

        <button type="button" class="button-comment" data-toggle="modal" data-target="#${id}">...</button>


        <div class="modal" id="${id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Commentaire</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        ${text}
                    </div>
                </div>
            </div>
        </div>
    `;
    return html.trim();
}


window.envoyerFormulaireConsult = function envoyerFormulaireConsult()
{
    let template = document.createElement('template');
    let consult = document.getElementById("consult-care");
    consult.innerHTML = "";
    let formulaire = [...document.getElementById("consult").elements];


    if (checkField(formulaire))
    {
        let arg = "";
        formulaire.forEach((element,index)=>{
            arg += index != formulaire.length-1 ? element.name + "=" + element.value + "&" : element.name + "=" + element.value;
        });

        fetch("http://localhost:8000/php/requete/soins/soins_effectue.php?"+arg,{
            method: 'GET',
            mode: 'cors',
            cache: 'default' 
        })
        .then(resp=>resp.json())
        .then((html)=>{
            if (html.length > 0)
            {
                let arrayColumn = ["dateS","codeA","typeS","commentaireS","nomZone","especeA","specialite"];
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
                    table.id = "consult-care-scroll";
                    table.className = "consult-care-scroll-padding";
                }
                table.innerHTML = '<ul>';
                html.forEach((rowData, index)=>{
                    let row = document.createElement("div");
                    row.className = "row-consult";
                    let rowHTML = '<ul>';
                    let rowContent = "";
                    arrayColumn.forEach((nom)=>{
                        if (nom == "commentaireS" && rowData[nom].length > 20)
                            rowContent = `<li>${createModal(rowData[nom],index)}</li>`;
                        else
                            rowContent = `<li><p>${rowData[nom]}</p></li>`;
                        rowHTML += rowContent;
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