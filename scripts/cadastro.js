const input_senha = document.querySelector("#senha");
btn_versenha = document.querySelector(".bx-show-alt");


btn_versenha.addEventListener("click", () => {
    if (input_senha.type === "password") {
        input_senha.type = "text";
    } else {
        input_senha.type = "password";
    }
});

const formulario = document.querySelector("#signup-form"),
    mensgens_erros = document.querySelector(".mensagens_erros"),
    btn_submit = document.querySelector(".cadastrar");

formulario.onsubmit = (e) => { // Essa função ira evitar a submição da página inteira
    e.preventDefault();
}

btn_submit.addEventListener("click", function () {

    let xhr = new XMLHttpRequest(); // Criando um objeto ajax

    xhr.open("POST", "configs/cadastro.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = xhr.response;
                console.log(response);
                if (response === "sucesso") {
                    location.href = "home.php";
                } else {
                    mensgens_erros.innerHTML = response;
                    mensgens_erros.style.display = "block";
                }

            }
        }
    }
    let formdata = new FormData(formulario);
    xhr.send(formdata);
});