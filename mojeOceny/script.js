function HideFormPopup() {
    var form = document.querySelector(".form_popup");
    form.style.display = "none";
}
function ShowFormPopup(employeeID) {
    var form_box = document.querySelector(".form_popup");
    var form = document.querySelector("#form-evaluation");

    var hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden"; 
    hiddenInput.name = "employeeId";
    hiddenInput.value = employeeID;
    form.appendChild(hiddenInput);

    console.log("employeeID: ", employeeID);
    
    form_box.style.display = "block";
}

function ShowDeleteConfirmation() {
    window.location.href = '../deleteAccount/delete_account.php';
}