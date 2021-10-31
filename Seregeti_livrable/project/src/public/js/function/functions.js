export function checkField(arrayField, excludeField = [""]) 
{
    let isEveryFieldFilled = true;

    arrayField.filter((element)=>!excludeField.includes(element.name)).forEach((element)=>{
        if (element.value.match(new RegExp("^ *$"))) // si un champ est vide ou contient uniquement des espaces alors
        {
            isEveryFieldFilled = false;
            element.style.borderColor = "red"; // on met la bordure du champ en rouge
        }
        else
        {
            element.style.borderColor = "initial"; // on met la bordure du champ en son état normal
        }
    });

    return isEveryFieldFilled;
}