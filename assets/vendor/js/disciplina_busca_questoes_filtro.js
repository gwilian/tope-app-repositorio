


$(document).ready(function() {
  // Parâmetros iniciais
  var termo = '';
  var limit = 20;
  var offset = 0;
  $('#exibir-mais').hide();
  // Função para exibir os resultados
  function exibirResultados() {
    // Envia a requisição AJAX
    $.ajax({
      type: 'POST',
      url: 'Classes/filtro_disciplina.php',
      data: { termo: termo, limit: limit, offset: offset },
      dataType: 'json',
      success: function(resultados) {
        // Verifica se há resultados
        if (resultados.total > 0) {
          // Exibe os resultados na div de resultados
          for (var i = 0; i < resultados.resultados.length; i++) {
    var valor = resultados.resultados[i].nome_materia;
      var id_servidor = resultados.resultados[i].id_servidor;
    var jaEstaNaLista = false;

    // Verifica se o valor já está presente na lista de resultados
    $('#resultados input[type="checkbox"]').each(function(){
      if($(this).val() == valor){
        // Se o valor já está na lista e o checkbox está selecionado, não exibe o checkbox
        if($(this).is(':checked')){
          jaEstaNaLista = true;
        }
      }
    });

    // Exibe o checkbox somente se o valor não está na lista ou está na lista mas não está selecionado
    if(!jaEstaNaLista){
      $('#resultados').append('<div class="form-check mt-3">  <input class="form-check-input"   name="' + valor + '"  type="checkbox" value="' + id_servidor + '" id="defaultCheck' + (i+1) + '"><label class="form-check-label" for="defaultCheck' + (i+1) + '"> <span class="tf-icons bx bx-folder mx-2"></span>&nbsp; </label>' + valor + '</div>');
    }
  }

          // Verifica se há mais resultados a serem exibidos
          if ((offset + limit) < resultados.total) {
            // Exibe o botão de exibir mais
            $('#exibir-mais').show();
          } else {
            // Esconde o botão de exibir mais
            $('#exibir-mais').hide();
          }
        } else {
          // Exibe uma mensagem de nenhum resultado encontrado
          $('#resultados').html('Nenhum resultado encontrado.');

          // Esconde o botão de exibir mais
          $('#exibir-mais').hide();
        }
      },
      error: function() {
        alert('Erro ao buscar os resultados.');
      }
    });
  }

  // Quando o formulário for submetido
  $('#MODAL1').submit(function(event) {
    event.preventDefault(); // Previne o comportamento padrão do formulário

    // Obtém o termo de busca digitado pelo usuário
    termo = $('#termo').val();
    offset = 0;

    // Limpa apenas os resultados que não foram selecionados
    $('#resultados input[type=checkbox]').each(function() {
      if (!$(this).is(':checked')) {
        $(this).parent().remove();
      }
    });

    // Exibe os resultados iniciais
    exibirResultados();
  });

  // Quando o botão de exibir mais for clicado
  $('#exibir-mais').click(function(event) {
    event.preventDefault(); // Previne o comportamento padrão do link

    // Incrementa o offset
    offset += limit;

    // Exibe mais resultados
    exibirResultados();
  });



  });


  // fim do document ready ==================================================================================================

    var valoresSelecionados = [];
    var idvaloresSelecionados = [];

   // array para armazenar os valores selecionados

    function mostrarConteudo() {
      // Obtém a div que contém os checkboxes
      var divCheckboxes = document.getElementById("resultados");

      // Percorre todos os elementos de entrada (inputs) dentro da div
      var inputs = divCheckboxes.getElementsByTagName("input");
      for (var i = 0; i < inputs.length; i++) {
        // Verifica se o elemento é um checkbox
        if (inputs[i].type == "checkbox") {
          // Se o checkbox estiver selecionado, adiciona o valor ao array de valores selecionados
          if (inputs[i].checked) {
            var id_servidor = inputs[i].value;
            var valor = inputs[i].name;
            if (valoresSelecionados.indexOf(valor) === -1) {
              valoresSelecionados.push(valor);
              idvaloresSelecionados.push(id_servidor);

            }
          }
          // Se o checkbox não estiver selecionado, remove o valor do array de valores selecionados
          else {
            var index = valoresSelecionados.indexOf(inputs[i].value);
            if (index !== -1) {
              valoresSelecionados.splice(index, 1);
              idvaloresSelecionados.splice(index, 1);

            }
          }
        }
      }

      // Exibe os valores selecionados em um alert
       // alert("Os seguintes valores foram selecionados: " + idvaloresSelecionados.join(", "));

      // Cria, dentro da div, vários elementos span, para cada checkbox selecionado
      var container = document.getElementById("conteudoSelecionado");
      container.innerHTML = "";

      // Cria um novo elemento span para cada valor selecionado
      for (var j = 0; j < valoresSelecionados.length; j++) {
        var span = document.createElement("span");
        span.classList.add("badge", "rounded-pill", "bg-dark");

        // Adiciona o valor selecionado e o ícone de "x" ao span
        span.innerHTML = valoresSelecionados[j] + ' <i class="bx bx-x"></i>';

        // Adiciona um manipulador de eventos ao ícone de "x" para remover o item selecionado
        span.querySelector(".bx-x").addEventListener("click", function() {
          var valor = this.parentNode.textContent.trim();
          var inputs = divCheckboxes.getElementsByTagName("input");
          for (var k = 0; k < inputs.length; k++) {
            if (inputs[k].type == "checkbox" && inputs[k].value == valor) {
              inputs[k].checked = false;
            }
          }
          // Remove o valor do array de valores selecionados
          var index = valoresSelecionados.indexOf(valor);
          if (index !== -1) {
            valoresSelecionados.splice(index, 1);
            idvaloresSelecionados.splice(index, 1);
          }
          this.parentNode.remove();
        });

        // Adiciona o span ao container
        container.appendChild(span);
      }
    }
