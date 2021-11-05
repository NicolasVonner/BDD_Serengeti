import { checkField, addErrorText } from "../function/functions.js";

let typeRessencementReport = document.getElementById("typeRessencementReport");

typeRessencementReport.addEventListener('change',(event)=>{
    let titleReport = document.getElementById("title-report-espece");
    if (event.target.value == "Animal")
        titleReport.innerHTML = "Ressencer un nouvelle Animal";
    else
        titleReport.innerHTML = "Ressencer un nouveau Végétal";

});

window.envoyerFormulaireReport = function envoyerFormulaireReport()
{
    let report = document.getElementById("report-ressencement");
    report.innerHTML = "";
    let formulaire = [...document.getElementById("report").elements];

    if (checkField(formulaire)) // si tous les champs sont bons alors on envoie la requête
    {
        const formData = new FormData();
        formulaire.forEach((element)=>{
            formData.append(element.name,element.value);
        });

        fetch("http://localhost:8000/php/requete/observations/observations_report.php?",{
            method: 'POST',
            mode: 'no-cors',
            cache: 'default',
            body: formData
        })
        .then(resp=>resp.text())
        .then((html)=>{
            console.log(html);
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
                addErrorText(report,"Error some Field are invalid");
            }
            
        });
    }
    else
        addErrorText(report,"Error some Field are incomplete");

}