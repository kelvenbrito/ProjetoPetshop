// Esta função  é executada imediatamente para garantir que o código seja executado após o carregamento da página
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Obtém todos os formulários com a classe 'needs-validation1'
        var forms = document.getElementsByClassName('needs-validation1');
        
        // Validação dos formulários
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                // Verifica se o formulário é válido
                if (form.checkValidity() === false) {
                    event.preventDefault(); // Impede o envio do formulário se for inválido
                    event.stopPropagation();
                }
                form.classList.add('was-validated'); // Adiciona a classe 'was-validated' para estilização no caso de validação
            }, false);
        });
    }, false);
})();

// Função para verificar se os emails coincidem
function Email() {
    let email = document.getElementById('email').value;
    let cEmail = document.getElementById('cEmail').value;
    if (email != cEmail) {
        alert("Emails divergentes, favor verificar.")
    }
}

// Função para verificar se as senhas coincidem
function Senha() {
    let senha = document.getElementById('senha').value;
    let cSenha = document.getElementById('cSenha').value;
    if (senha != cSenha) {
        alert("Senhas divergentes, favor verificar.")
    }
}

// Função para marcar os termos
function marcarTermos() {
    document.getElementById("termosButton").onclick = function () {
        // Verifica se o botão não foi clicado
        if (!document.getElementById("termosButton").classList.contains("clicked")) {
            document.getElementById("avisoTermos").style.display = "block"; // Mostra o aviso dos termos
        }
    }
}
