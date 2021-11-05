export const checkField = (arrayField, excludeField = [""])  => {
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

export const addErrorText = (reportElement, text) => {
    let error = document.createElement("p");
    error.innerText = text;
    error.style.color = "red";
    reportElement.appendChild(error);
}

export const createModal = (text, id) => {
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
