
export const disableAllField = (formElement, isDesabled) => {
    var i = 0;
    var limit = formElement.length
    formElement.forEach((field)=>{
        i ++;
        if( i != limit){
            field.disabled = isDesabled;
            console.log(formElement.length);
        }      
    });
}

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

export const displaySQLResult = (result, parentDiv) => {
    if (result.length > 0)
    {
        let column = document.createElement("div");
        column.className = "column-consult";
        let columnHTML = '<div><ul>';
        Object.keys(result[0]).forEach((nom)=> {
            columnHTML += `<li><p>${nom}</p></li>`;
        });
        columnHTML += "</div>";
        column.innerHTML = columnHTML.trim();
        parentDiv.appendChild(column);

        let table = document.createElement("div");
        if (result.length > 8)
        {
            table.id = "consult-ressencement-scroll";
            table.className = "consult-ressencement-scroll-padding";
        }
        table.innerHTML = '<ul>';
        result.forEach((rowData, index)=>{
            let row = document.createElement("div");
            row.className = "row-consult";
            let rowHTML = '<ul>';
            let rowContent = "";
            Object.keys(rowData).forEach((nom)=>{
                if (nom.includes("commentaire") && rowData[nom].length > 20)
                    rowContent = `<li>${createModal(rowData[nom],index)}</li>`;
                else
                    rowContent = `<li><p>${rowData[nom]}</p></li>`;
                rowHTML += rowContent;
            });
            row.innerHTML = rowHTML.trim();
            table.appendChild(row);
        });
        parentDiv.appendChild(table);
    }
    else
    {
        let error = document.createElement("p");
        error.innerText = "Aucunes données trouvées";
        parentDiv.appendChild(error);
    }
}
