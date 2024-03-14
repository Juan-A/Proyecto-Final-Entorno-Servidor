//Este código se encarga de mostrar un mensaje de confirmación al usuario antes de eliminar un elemento.
//Si el usuario confirma, se elimina el elemento. Se ha usado para categorías y usuarios.
var elems = document.getElementsByClassName('deleteUser');
var confirmIt = function (e) {
    if (!confirm('¿Estás seguro? Esta acción no se puede deshacer.')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}