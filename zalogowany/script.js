function HideFormPopup() {
    var form = document.querySelector(".form_popup");
    form.style.display = "none";
}
function ShowFormPopup(employeeID) {
    var form_box = document.querySelector(".form_popup");
    var form = document.querySelector("#form-evaluation");

    var hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden"; // Ustaw typ na "hidden"
    hiddenInput.name = "employeeId";
    hiddenInput.value = employeeID;
    form.appendChild(hiddenInput);

    // Użyj console.log do debugowania
    console.log("employeeID: ", employeeID);
    
    // Pokaż formularz
    form_box.style.display = "block";
}