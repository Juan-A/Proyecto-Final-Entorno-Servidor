function verifySame(){
    let password = document.querySelector("#password").value
    let passwordConfirm = document.querySelector("#passwordConfirm").value
    if(password !== passwordConfirm){
        return false
    }
    return true
}

document.querySelector("#passwordConfirm").addEventListener("keyup",(evento, elemento) => {
    if(!verifySame()){
        document.querySelector("#regButton").disabled = true;
        document.querySelector(".errorMessage").hidden = false;
        document.querySelector(".errorMessage").innerHTML = "<i class='bx bx-error bx-flashing' ></i>"+"<span>Error, las contraseñas no coinciden.</span>";

    }else{
        document.querySelector("#regButton").disabled = false;
        document.querySelector(".errorMessage").hidden = true;
        document.querySelector(".errorMessage").innerText = "";

    }
})