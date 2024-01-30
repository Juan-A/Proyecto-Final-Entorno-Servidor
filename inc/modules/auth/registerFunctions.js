function verifySame(){
    let password = document.querySelector("#password").value
    let passwordConfirm = document.querySelector("#passwordConfirm").value
    if(password !== passwordConfirm){
        return false
    }
    return true
}
function userIsValid(){
    let user = document.querySelector("#username").value;
    if(user.length <= 3 ){
        return false
    }
    return true

}

document.querySelector("#passwordConfirm").addEventListener("keyup",(event, elemento) => {
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
document.querySelector("#username").addEventListener("keyup",(event, element) => {
    if(!userIsValid()){
        document.querySelector("#regButton").disabled = true;
        document.querySelector(".errorMessage").hidden = false;
        document.querySelector(".errorMessage").innerHTML = "<i class='bx bx-error bx-flashing' ></i>"+"<span>Error, el usuario es demasiado corto.</span>";

    }else{
        //User is taken will be implemented on this block later.
        
        document.querySelector("#regButton").disabled = false;
        document.querySelector(".errorMessage").hidden = true;
        document.querySelector(".errorMessage").innerText = "";

    }
})