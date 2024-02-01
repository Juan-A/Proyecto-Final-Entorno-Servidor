const regButton = document.querySelector("#regButton")

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

//Could be useful if I want to check if all the fields are filled every second. Prevents user to...
function filledAll(){
    let password = document.querySelector("#password").value.length!=0
    let passwordConfirm = document.querySelector("#passwordConfirm").value.length!=0
    let user = document.querySelector("#username").value.length!=0;
    let name = document.querySelector("#name").value.length!=0
    let surname = document.querySelector("#surname").value.length!=0
    let mail = document.querySelector("#mail").value.length!=0

    if(password && passwordConfirm && user && name && surname && mail ){
        return false;
    }
    regButton.disabled=true;
    console.log("meow")

}

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
        //User is taken will be implemented on this block later.
        
        regButton.disabled = false;
        document.querySelector(".errorMessage").hidden = true;
        document.querySelector(".errorMessage").innerText = "";

    }
})