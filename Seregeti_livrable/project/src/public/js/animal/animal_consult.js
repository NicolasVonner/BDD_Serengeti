import { checkField, disableAllField, displaySQLResult } from "../function/functions.js";

/*var parentDOM = document.getElementById('consult-parent');
var test1=parentDOM.getElementById('test1');*/

document.getElementById("checkAnim").addEventListener("click",(event)=>{
    let consult = [...document.getElementById("consult").elements].slice(1);
    disableAllField(consult,event.target.checked);
});
