const range = document.getElementById('myRange');
const precoProd = document.getElementById('precoProd');
   // Obtém o botão de Apagar pelo seu tipo
   const apagarButton = document.querySelector('button[type="button"]');

range.addEventListener('input', function () {
    precoProd.textContent = `R$${this.value}`;
});



   // Adiciona um ouvinte de eventos para o botão Apagar
   apagarButton.addEventListener('click', function () {
       // Obtém todos os campos de entrada que deseja limpar
       const campos = document.querySelectorAll('input[type="text"], input[type="number"], input[type="file"]');

       // Limpa o valor de cada campo de entrada
       campos.forEach(campo => {
           campo.value = ''; // Define o valor como vazio
       });
   });