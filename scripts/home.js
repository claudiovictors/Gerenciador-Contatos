// Declarando todas as constantes vindo do arquivo home.php
// Todos eles como variaveis globais
const adicionar_cont = document.querySelector(".add-contact-btn"),
    model_add = document.querySelector(".modal"),
    btn_close = document.querySelector(".close"),
    confirm_close = document.querySelector("#cancelBtn"),
    formulario = document.querySelector(".modal-form"),
    btn_adicionar = document.querySelector(".btn-add"),
    mensagens = document.querySelector(".erros"),
    tabela_lista = document.querySelector("#contactList"),
    campo_pesquisar = document.querySelector("#searchInput"),
    btn_ordenar = document.querySelector(".sort-btn");


adicionar_cont.addEventListener("click", function () { // Função que mostra a caixa model onde
                                                       // os usuários iram adicionar os contactos
    model_add.classList.add("active");
});

btn_close.addEventListener("click", function () { // Função oculta a caixa model onde
                                                  // os usuários iram adicionar os contactos
    model_add.classList.remove("active");
});

btn_adicionar.addEventListener("click", function () { // Essa função ira fazer uma requisição ajax
                                                      // Para pegar os dados do arquivo inserir.php
                                                      // Onde ira fazer a requisição e adicionar um novo contacto na tabela

    let xhr = new XMLHttpRequest(); // Instanciando um objecto ajax

    xhr.open("POST", "configs/inserir.php", true); // Fazendo a requisição do tipo ou método POST do arquivo inserir.php

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = xhr.response;

                if (response === "Contato inserido com sucesso!") {
                    // Essa função ira ser executada caso o usuário tiver adicionar um novo conatctos
                    // E a página ira actualizar automaticamente
                    setTimeout(() => {
                        actualizar();
                    }, 100)
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


// Essa função ira pegar todos os contactos e mostrar na tebela
function actualizar(){
    let xhr = new XMLHttpRequest(); // Criando um objeto ajax

    xhr.open("GET", "configs/listar.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = xhr.response;
                tabela_lista.innerHTML = response;
            }
        }
    }
    xhr.send();
}

actualizar();


campo_pesquisar.onkeyup = () => {

    let input_valor = campo_pesquisar.value;
    let xhr = new XMLHttpRequest(); // Criando um objeto ajax

    xhr.open("POST", "configs/pesquisar.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                tabela_lista.innerHTML = xhr.response;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + input_valor);
}

btn_ordenar.addEventListener("click", () => {

    let xhr = new XMLHttpRequest(); // Criando um objeto ajax

    xhr.open("POST", "configs/ordenar.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                tabela_lista.innerHTML = xhr.response;
            }
        }
    }
    xhr.send();
});