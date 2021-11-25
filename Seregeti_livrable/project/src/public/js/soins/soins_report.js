import { checkField, addErrorText } from "../function/functions.js";


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
            console.log(element.name + " " + element.value) //on affiche les elements du formulaire que lon vas send
        });

        fetch("http://localhost:8000/php/requete/soins/soins_report.php?",{
            method: 'POST',
            mode: 'no-cors',
            cache: 'default',
            body: formData
        })
        .then(resp=>resp.text())
        .then((html)=>{
            console.log(html)
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
                addErrorText(report,"Error some field are invalid");
            }
            
        });
    }
    else
        addErrorText(report,"Error some Field are incomplete");

}