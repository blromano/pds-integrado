// *
// * Adicionar multiplos marcadores
// * 2013 - www.marnoto.com
// *

// Váriáveis necessárias
var map;
var infoWindow;

// A variável markersData guarda a informação necessária a cada marcador
// Para utilizar este código basta alterar a informação contida nesta variável

var markersData = 
  [
  {
      lat: -21.973581,      
      lng: -46.794651,
      nome: "Sempre Vale Supermercados",
      morada1:"Jardim Michelazzo",
	  imagem: "js/download.jpg"
	  
      // não colocar virgula no último item de cada maracdor
   }, 
  {
      lat: -21.973692,     
      lng: -46.794606,
      nome: "Supermercado Sanjoanense",
      morada1:"R. Ademar de Barros, 600 - Jardim Michelazzo",
	  imagem : "js/testando.jpg"
      // não colocar virgula no último item de cada maracdor
   }, 
  {
      lat: -21.973932,    
      lng: -46.794326,
      nome: "Pamonharia Uai, Sô",
      morada1:"R. Ademar de Barros, 625 - centro",
	  imagem: "js/download.jpg",
      // não colocar virgula no último item de cada maracdor
   },
  {
      lat: -21.974037,    
      lng: -46.794299,
      nome: "Restaurante Puro Sabor",
      morada1:"R. Ademar de Barros, 625 - centro",
	  imagem: "js/download.jpg",
      // não colocar virgula no último item de cada maracdor
   },
  {
      lat: -21.974704,   
      lng: -46.794303,
      nome: "Chocopan",
      morada1:"R. Ademar de Barros, 696 - Centro",
	  imagem: "js/download.jpg",
      // não colocar virgula no último item de cada maracdor
   },
  {
      lat: -21.974644,  
      lng: -46.794093,
      nome: "Padaria e Confeitaria Piu Bella",
      morada1:"R. Ademar de Barros, 697 - Centro",
	  imagem: "js/download.jpg",
      // não colocar virgula no último item de cada maracdor
   },
  {
      lat: -21.975892, 
      lng: -46.792507,
      nome: "Boa Vista Telecomunicações(BVCI)",
      morada1:"Av. Brasília, 944 - Vila Zanetti",
	  imagem: "js/download.jpg",
      // não colocar virgula no último item de cada maracdor
   },
  {
      lat: -21.976575,
      lng: -46.791126,
      nome: "Chocopan",
      morada1:"Av. Brasília, 1083 - Vila Zanetti",
	  imagem: "js/download.jpg",
      // não colocar virgula no último item de cada maracdor
   },
  {
      lat: -21.969251, 
      lng: -46.796432,
      nome: "Lojas Casas Bahia",
      morada1:"R. Ademar de Barros, 58 - Centro",
	  imagem: "js/mcdonald.jpg",
      // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -21.969667, 
      lng: -46.795810,
      nome: "Lojas Cem",
      morada1:"R. Ademar de Barros, 133 - Centro",
	  imagem: "js/download.jpg",
      // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -21.964014, 
      lng: -46.792814,
      nome: "Sempre Vale Supermercados",
      morada1:"Av. Rodrigues Alves, 524-638 - Jardim Santiago Penha",
	  imagem: "js/semprevale.jpg",
      // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -21.979706, 
      lng: -46.785395,
      nome: "Big Bom Supermercados",
      morada1:"Av. Brasília, 1885 - Vila Zanetti",
	  imagem: "js/download.jpg",
      // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -21.979580,  
      lng: -46.788376,
      nome: "Restaurante Bisteco do Viola",
      morada1:"Av. Brasília, 1587 - Vila Zanetti",
      // não colocar virgula no último item de cada maracdor
   },	
   {
      lat: -21.979829, 
      lng: -46.785640,
      nome: "Burger King",
      morada1:"Av. Brasília, 1867 - Vila Zanetti",
      // não colocar virgula no último item de cada maracdor
   },
   {
      lat: -21.967945,
      lng: -46.794518,
      nome: "Dom Rafaelo"
      // não colocar virgula no último item de cada maracdor
   } // não colocar vírgula no último marcador */
];


function initialize() {
   var mapOptions = {
      center: new google.maps.LatLng(-21.977323, -46.840015),
      zoom: -100,
      mapTypeId: 'roadmap',
   };

   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

   // cria a nova Info Window com referência à variável infowindow
   // o conteúdo da Info Window será atribuído mais tarde
   infoWindow = new google.maps.InfoWindow();

   // evento que fecha a infoWindow com click no mapa
   google.maps.event.addListener(map, 'click', function() {
      infoWindow.close();
   });

   // Chamada para a função que vai percorrer a informação
   // contida na variável markersData e criar os marcadores a mostrar no mapa
   displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);

// Esta função vai percorrer a informação contida na variável markersData
// e cria os marcadores através da função createMarker
function displayMarkers(){

   // esta variável vai definir a área de mapa a abranger e o nível do zoom
   // de acordo com as posições dos marcadores
   var bounds = new google.maps.LatLngBounds();
   
   // Loop que vai estruturar a informação contida em markersData
   // para que a função createMarker possa criar os marcadores 
   for (var i = 0; i < markersData.length; i++){

      var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
      var nome = markersData[i].nome;
      var morada1 = markersData[i].morada1;
      var morada2 = markersData[i].morada2;
      var codPostal = markersData[i].codPostal;
	  var imagem = markersData[i].imagem; 

      createMarker(latlng, nome, morada1, morada2, codPostal,imagem);

      // Os valores de latitude e longitude do marcador são adicionados à
      // variável bounds
      bounds.extend(latlng);  
   }

   // Depois de criados todos os marcadores
   // a API através da sua função fitBounds vai redefinir o nível do zoom
   // e consequentemente a área do mapa abrangida.
   map.fitBounds(bounds);
}

// Função que cria os marcadores e define o conteúdo de cada Info Window.
function createMarker(latlng, nome, morada1, morada2, codPostal,imagem){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: nome
   });

   // Evento que dá instrução à API para estar alerta ao click no marcador.
   // Define o conteúdo e abre a Info Window.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Variável que define a estrutura do HTML a inserir na Info Window.
      var iwContent = '<div id="iw_container">' +
            '<div class="iw_title">' + nome + '</div>' +
         '<div class="iw_content">' + morada1 + '<br />' +
         morada2 + '<br />'  +
         codPostal + '</div></div><br /><br /> <div id="image"><img src='+imagem+' alt="Mountain View" style="width:304px;height:228px;"></div>';
      
      // O conteúdo da variável iwContent é inserido na Info Window.
      infoWindow.setContent(iwContent);

      // A Info Window é aberta.
      infoWindow.open(map, marker);
   });
}