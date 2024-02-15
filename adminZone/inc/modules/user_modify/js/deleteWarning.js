var elems = document.getElementsByClassName('deleteUser');
var confirmIt = function (e) {
    if (!confirm('¿Estás seguro? Esta acción no se puede deshacer.')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}