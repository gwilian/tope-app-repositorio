
$(document).ready(function() {
  // Parâmetros iniciais



  var termo = '';
  var limit = 20;
  var offset = 0;
  $('#exibir-mais2').hide();
  // Função para exibir os resultados
  function exibirResultados() {
    // Envia a requisição AJAX
    $.ajax({
      type: 'POST',
      url: 'Classes/filtro_assunto.php',
      data: { termo: idvaloresSelecionados.join(", "), limit: limit, offset: offset },
      dataType: 'json',
      success: function(resultados) {
        // Verifica se há resultados
        if (resultados.total > 0) {
          // Exibe os resultados na div de resultados
          for (var i = 0; i < resultados.resultados.length; i++) {
    var valor = resultados.resultados[i].nome_topico;
      var id_servidor = resultados.resultados[i].id_materias;
    var jaEstaNaLista = false;

    // Verifica se o valor já está presente na lista de resultados
    $('#resultados2 input[type="checkbox"]').each(function(){
      if($(this).val() == valor){
        // Se o valor já está na lista e o checkbox está selecionado, não exibe o checkbox
        if($(this).is(':checked')){
          jaEstaNaLista = true;
        }
      }
    });

    // Exibe o checkbox somente se o valor não está na lista ou está na lista mas não está selecionado
    // Exibe o checkbox somente se o valor não está na lista ou está na lista mas não está selecionado
  // if (!jaEstaNaLista) {
  //   var valorCompleto = resultados.resultados[i].indice + valor;
  //
  //   $('#resultados2').append('<div class="form-check mt-3">  <input class="form-check-input" name="' + valorCompleto + '" type="checkbox" value="' + id_servidor + '" id="defaultCheck' + (i+1) + '"><label class="form-check-label" for="defaultCheck' + (i+1) + '"> <span class="tf-icons bx bx-folder mx-2"></span>&nbsp; </label>' + valorCompleto + '</div>');
  // }

    var id_no_banco =  idBanco;
  if (!jaEstaNaLista) {
    var valorCompleto = resultados.resultados[i].indice + valor;
      var idBanco = resultados.resultados[i].id_no_banco;

    $('#resultados2').append('<div class="form-check mt-3">  <input class="form-check-input" name="' + valorCompleto + '" type="checkbox" value="' + id_servidor + '" id="defaultCheck' + (i+1) + '"><label class="form-check-label" for="defaultCheck' + (i+1) + '"> <span class="tf-icons bx bx-folder mx-2"></span>&nbsp; </label>' + valorCompleto +" ult:"+ idBanco+" pai: "+resultados.resultados[i].pai+ '</div>');
  }





  //fim do codigo
  }




          // Verifica se há mais resultados a serem exibidos
          if ((offset + limit) < resultados.total) {
            // Exibe o botão de exibir mais
            $('#exibir-mais2').show();
          } else {
            // Esconde o botão de exibir mais
            $('#exibir-mais2').hide();
          }
        } else {
          // Exibe uma mensagem de nenhum resultado encontrado
          $('#resultados').html('Nenhum resultado encontrado.');

          // Esconde o botão de exibir mais
          $('#exibir-mais2').hide();
        }
      },
      error: function() {
        alert('Erro ao buscar os resultados.');
      }
    });
  }

  // Quando o formulário for submetido
  $('#MODAL2').submit(function(event) {
    event.preventDefault(); // Previne o comportamento padrão do formulário

    // Obtém o termo de busca digitado pelo usuário
    termo = $('#termo2').val();
    offset = 0;

    // Limpa apenas os resultados que não foram selecionados
    $('#resultados2 input[type=checkbox]').each(function() {
      if (!$(this).is(':checked')) {
        $(this).parent().remove();
      }
    });

    // Exibe os resultados iniciais
    exibirResultados();
  });

  // Quando o botão de exibir mais for clicado
  $('#exibir-mais2').click(function(event) {
    event.preventDefault(); // Previne o comportamento padrão do link

    // Incrementa o offset
    offset += limit;

    // Exibe mais resultados
    exibirResultados();
  });



  });
