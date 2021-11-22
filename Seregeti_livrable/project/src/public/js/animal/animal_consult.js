import { checkField, disableAllField, displaySQLResult } from "../function/functions.js";

document.getElementById("checkCare").addEventListener("click",(event)=>{
    let consult = [...document.getElementById("consult").elements].slice(1);
    disableAllField(consult,event.target.checked);
});
