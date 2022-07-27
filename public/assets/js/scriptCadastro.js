let form = document.getElementById("cadastro-form");
    form.addEventListener("submit", function(event) {
    let inputs = document.getElementsByClassName('input-form');
    for (let input of inputs) {
        if(input.value.trim() == ""){
            input.parentElement.classList.add("wrap-input-invalid")
        }
    }
    event.preventDefault();
});