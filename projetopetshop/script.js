// JavaScript para atribuir o texto da div selecionada ao campo textoFiltro antes de enviar o formulário
document.addEventListener('DOMContentLoaded', function() {
    const radioInputs = document.querySelectorAll('.radio-input');
    
    radioInputs.forEach(input => {
        input.addEventListener('change', function() {
            const selectedDivText = this.nextElementSibling.textContent.trim();
            document.getElementsByName('textoFiltro')[0].value = selectedDivText;
        });
    });
});
