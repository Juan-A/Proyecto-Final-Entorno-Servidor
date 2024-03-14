//Funcion para que el mensaje de confirmación desaparezca (y no ocupe espacio)
document.getElementById('message').addEventListener('animationend', function() {
    this.style.display = 'none';
});