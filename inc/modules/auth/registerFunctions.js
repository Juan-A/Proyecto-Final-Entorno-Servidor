// Este archivo contiene funciones que se encargan de verificar que los datos introducidos por el usuario en el formulario de registro son correctos.

const regButton = document.querySelector("#regButton")

function verifySame(){
    let password = document.querySelector("#password").value
    let passwordConfirm = document.querySelector("#passwordConfirm").value
    if(password !== passwordConfirm){
        return false
    }
    return true
}
//Esta función se encarga de verificar que el usuario introducido tiene una longitud mayor a 3 caracteres.
function userIsValid(){
    let user = document.querySelector("#username").value;
    if(user.length <= 3 ){
        return false
    }
    return true

}

//Deshabito por defecto el botón de registro.
regButton.disabled=true

document.querySelector("#passwordConfirm").addEventListener("keyup",(event, elemento) => {
    if(!verifySame()){
        regButton.disabled = true;
        document.querySelector(".errorMessage").hidden = false;
        document.querySelector(".errorMessage").innerHTML = "<i class='bx bx-error bx-flashing' ></i>"+"<span>Error, las contraseñas no coinciden.</span>";

    }else{
        regButton.disabled = false;
        document.querySelector(".errorMessage").hidden = true;
        document.querySelector(".errorMessage").innerText = "";
    }
})
document.querySelector("#username").addEventListener("keyup",(event, element) => {
    if(!userIsValid()){
        regButton.disabled = true;
        document.querySelector(".errorMessage").hidden = false;
        document.querySelector(".errorMessage").innerHTML = "<i class='bx bx-error bx-flashing' ></i>"+"<span>Error, el usuario es demasiado corto.</span>";

    }else{       
        regButton.disabled = false;
        document.querySelector(".errorMessage").hidden = true;
        document.querySelector(".errorMessage").innerText = "";

    }
})