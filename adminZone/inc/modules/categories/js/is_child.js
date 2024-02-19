supSelector = document.querySelector("#supCategory")
isSub = document.querySelector("#is_subcat")
console.log(isSub.value)
if(isSub.value === "0"){
    supSelector.hidden = true;
}

isSub.addEventListener("change", (ev) =>{
    if(isSub.value === "0"){
        supSelector.hidden = true;
    }else{
        supSelector.hidden = false;
    }
})