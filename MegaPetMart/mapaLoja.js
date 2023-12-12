var mapa = L.map('mapa'); // Inicializa o mapa sem definir uma visualização inicial

// Adiciona o provedor de mapa do OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(mapa);

// Adiciona marcadores
//Loja 1
var loja1 = L.marker([-22.5699, -47.3400]).addTo(mapa)
.bindPopup('MegaPet Mart - Limeira - Loja 1');
//Loja 2
var loja2 = L.marker([-22.8925, -47.0714]).addTo(mapa)
.bindPopup('MegaPet Mart - Campinas - Loja 2');
//Loja 3
var loja3 = L.marker([-23.6537, -46.6133]).addTo(mapa)
.bindPopup('MegaPet Mart - São Paulo - Loja 3');

// Agrupa os marcadores (lojas) para ajustar a visualização do mapa apenas para eles - no caso loja 1 e 3
var group = new L.featureGroup([loja1, loja3]);
mapa.setView(group.getBounds().getCenter(), 7); // Define o nível de zoom após o ajuste dos limites