// Declarando todas as constantes vindo do arquivo home.php
// Todos eles como variaveis globais
const adicionar_cont = document.querySelector(".btn-add"),
    formulario = document.querySelector(".modal-form"),
    mensagens = document.querySelector(".erros");


    formulario.onsubmit = (e)=>{
        e.preventDefault();
    }

adicionar_cont.addEventListener("click", function () { // Essa função ira fazer uma requisição ajax
                                                      // Para pegar os dados do arquivo inserir.php
                                                      // Onde ira fazer a requisição e adicionar um novo contacto na tabela

    let xhr = new XMLHttpRequest(); // Instanciando um objecto ajax

    xhr.open("POST", "configs/actualizar.php", true); // Fazendo a requisição do tipo ou método POST do arquivo inserir.php

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = xhr.response;
                if (response === "sucesso") {
                    location.href = "home.php";
                } else {
                    mensagens.innerHTML = response;
                    mensagens.style.display = 'block';
                }
            }
        }
    }
    let formdata = new FormData(formulario); // Instanciando um objecto FormData
    xhr.send(formdata);
});