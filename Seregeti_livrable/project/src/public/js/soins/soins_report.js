import { checkField } from "../function/functions.js";

function ajouterErreurText() {
    let error = document.createElement("p");
    error.innerText = "Error some Field are incomplete";
    error.style.color = "red";
    report.appendChild(error);
}

window.envoyerFormulaireReport = function envoyerFormulaireReport()
{
    let report = document.getElementById("report-care");
    report.innerHTML = "";
    let formulaire = [...document.getElementById("report").elements];

    if (checkField(formulaire,["commentaire"])) // si tous les champs sont bons alors on envoie la requête
    {
        const formData = new FormData();
        formulaire.forEach((element)=>{
            formData.append(element.name,element.value);
        });

        fetch("http://localhost:8000/php/requete/soins/enregistrer_soin.php?",{
            method: 'POST',
            mode: 'no-cors',
            cache: 'default',
            body: formData
        })
        .then(resp=>resp.text())
        .then((html)=>{
            if (html.includes("Le rapport a été envoyé à la BDD"))
            {
                formulaire.forEach((element)=>{
                    if (["text","datetime-local","textarea"].includes(element.type))
                    {
                        element.value = "";
                    }
                });
                let template = document.createElement('template');
                template.innerHTML = html.trim();
                report.appendChild(template.content.firstChild);
            }
            else
            {
                ajouterErreurText();
            }
            
        });
    }
    else
        ajouterErreurText();

}