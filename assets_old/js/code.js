$(document).ready(function(){

   $('.postName').select2({
   placeholder: '📒 Buscar...',

   id: function(data) { return data.id_questao; },
   language: {
   noResults: function() {return "sem resultados :(";}},
   multiple: true,
   ajax: {
     url: 'Classes/pesquisar_questao.php',
     dataType: 'json',
     delay: 250,

     data: function (data) {

         return {
             searchTerm: data.term // search term
         };
     },
     processResults: function (response) {
         return {
             results: $.map(response, function (obj) {
                 return { id: obj.assunto, text: obj.assunto };
             })
         };
     },
     cache: true
   }
   });

  

// fim do inicializador da página
});
