var checkboxesSelecionados = []; // Array global para armazenar os checkboxes selecionados

function buscarDisciplina() {
  var searchQuery = document.getElementById("inputTextDisciplina").value;
  var selectedValues = [];
  $.ajax({
    url: "Classes/pesq_disciplina.php",
    type: "POST",
    data: { query: searchQuery },
    dataType: "json",
    success: function (data) {
      if (data.length > 0) {
        var resultList = document.getElementById("resultadoDisciplina");
        resultList.innerHTML = "";

        for (var i = 0; i < data.length; i++) {
          var item = data[i];
          var listItem = document.createElement("div");
          var checkbox = document.createElement("input");
          var label = document.createElement("label");

          checkbox.type = "checkbox";
          checkbox.id = item.id;
          checkbox.value = item.value;
          checkbox.addEventListener("change", handleCheckboxChange); // Adiciona o manipulador de eventos
          listItem.appendChild(checkbox);

          label.textContent = item.name;
          label.setAttribute("for", item.id); // Vincula o label ao checkbox
          listItem.appendChild(label);

          resultList.appendChild(listItem);

          // Verifica se o checkbox foi previamente selecionado
          if (checkboxesSelecionados.includes(item.id)) {
            checkbox.checked = true;
            createListItem(item.id, item.name, "selectedItemsDisciplina[]");
          }
        }
      } else {
        alert("Nenhum resultado encontrado.");
      }
    },
    error: function () {
      alert("Ocorreu um erro na requisição.");
    }
  });
}

function handleCheckboxChange(event) {
  var checkbox = event.target;
  var itemId = checkbox.id;

  if (checkbox.checked) {
    if (!isItemInList(itemId)) {
      createListItem(itemId, checkbox.nextSibling.textContent); // Cria um novo item de lista
      checkboxesSelecionados.push(itemId); // Adiciona o checkbox selecionado ao array
    }
  } else {
    removeItem(itemId); // Remove o item da lista de IDs e da lista de labels
    checkboxesSelecionados = checkboxesSelecionados.filter(function (id) {
      return id !== itemId; // Remove o checkbox desmarcado do array
    });
  }
}

function removeItem(itemId) {
  var resultList = document.getElementById("selectedItemsDisciplina");
  var listItem = document.getElementById("li-" + itemId);

  if (listItem) {
    resultList.removeChild(listItem);

    // Desmarcar o checkbox correspondente
    var checkbox = document.getElementById(itemId);
    if (checkbox) {
      checkbox.checked = false;
    }

    // Verificar se não há mais itens selecionados
    var remainingItems = resultList.getElementsByTagName("li");
    if (remainingItems.length === 0) {
      var botaoAssunto = document.getElementById("BotaoAssunto");
      if (botaoAssunto) {
        botaoAssunto.disabled = true;
      }

      // Limpar o conteúdo da lista resultadoAssunto
      var resultadoAssunto = document.getElementById("resultadoAssunto");
      if (resultadoAssunto) {
        resultadoAssunto.innerHTML = "";
      }
    }
  }
}



function isItemInList(itemId) {
  var resultList = document.getElementById("selectedItemsDisciplina");
  var items = resultList.getElementsByTagName("li");

  for (var i = 0; i < items.length; i++) {
    var existingItemId = items[i].id.split("-")[1];
    if (existingItemId === itemId) {
      return true;
    }
  }

  return false;
}

function createListItem(itemId, itemName, inputName) {

  //habilitar o botão assunto
  var botao = document.getElementById("BotaoAssunto");
  botao.removeAttribute("disabled");


  // Limpar o conteúdo da lista resultadoAssunto
  var resultadoAssunto = document.getElementById("resultadoAssunto");
  if (resultadoAssunto) {
    resultadoAssunto.innerHTML = "";}


  if (!isItemInList(itemId)) {
    var resultList = document.getElementById("selectedItemsDisciplina");

    // Verifica se o item com o mesmo itemId já existe
    var existingItem = resultList.querySelector("#li-" + itemId);
    if (existingItem) {
      return; // Retorna se o item já existe
    }

    var listItem = document.createElement("li");
    listItem.id = "li-" + itemId;
    listItem.textContent = itemName;

    var closeButton = document.createElement("button");
    closeButton.innerHTML = "X";
    closeButton.classList.add("btn", "btn-danger", "mx-2", "btn-sm"); // Adiciona a classe "btn-sm" para diminuir o tamanho do botão
    closeButton.addEventListener("click", function () {
      removeItem(itemId); // Remove o item ao clicar no botão "X"
    });
    listItem.appendChild(closeButton);
    resultList.appendChild(listItem);
  }
}
