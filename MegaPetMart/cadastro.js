// IIFE (Immediately Invoked Function Expression) para garantir escopo local e evitar poluição global
(function () {
    'use strict';

    // Aguarda o evento de carregamento da página
    window.addEventListener('load', function () {
        // Obtém todos os formulários com a classe 'needs-validation1'
        var forms = document.getElementsByClassName('needs-validation1');

        // Filtra e itera sobre os formulários encontrados
        var validation = Array.prototype.filter.call(forms, function (form) {
            // Adiciona um ouvinte de evento para o envio do formulário
            form.addEventListener('submit', function (event) {
                // Verifica se o formulário é válido
                if (form.checkValidity() === false) {
                    // Impede o envio do formulário se não for válido
                    event.preventDefault();
                    // Previne a propagação do evento
                    event.stopPropagation();
                }
                // Adiciona a classe 'was-validated' para exibir as mensagens de validação
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Função para verificar se os campos de email coincidem
function Email() {
    let email = document.getElementById('email').value;
    let cEmail = document.getElementById('cEmail').value;
    if (email != cEmail) {
        alert("Emails divergentes, favor verificar.");
    }
}

// Função para verificar se os campos de senha coincidem
function Senha() {
    let senha = document.getElementById('senha').value;
    let cSenha = document.getElementById('cSenha').value;
    if (senha != cSenha) {
        alert("Senhas divergentes, favor verificar.");
    }
}


// Função para exibir aviso de termos quando o botão é clicado
function marcarTermos() {
    document.getElementById("termosButton").onclick = function () {
        if (!document.getElementById("termosButton").classList.contains("clicked")) {
            document.getElementById("avisoTermos").style.display = "block";
        }
    };
}
