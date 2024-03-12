function filterProducts(){
    $select = document.querySelector("#categorySelect")
    window.location.replace("store.php?cat="+$select.value);
}