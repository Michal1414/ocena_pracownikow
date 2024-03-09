function HideFormPopup(employeeID) {
    var form = document.querySelector("#user"+employeeID);
    form.style.display = "none";
}
function ShowFormPopup(employeeID) {
    console.log("XXXXXXXXXXXXXXXXX");
    console.log(employeeID)
    var form_box = document.getElementById("user"+employeeID);
    form_box.style.display = "block";
}

function ShowDeleteConfirmation() {
    window.location.href = '../deleteAccount/delete_account.php';
}