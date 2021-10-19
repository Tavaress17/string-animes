function visualizarSenha() {
    var x = document.getElementById("senhaLogin");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function visualizarConfirmarSenha() {
    var x = document.getElementById("confirmSenhaLogin");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}