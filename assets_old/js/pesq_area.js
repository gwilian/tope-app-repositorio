var checkboxesSelecionadosAreaFormacao = []; // Array global para armazenar os checkboxes selecionados do botão "Área de Formação"

function buscarArea() {
    var searchQuery = document.getElementById("inputTextArea").value;
    var selectedValues = [];
    $.ajax({
        url: "Classes/pesq_area_formacao.php",
        type: "POST",
        data: { query: searchQuery },
        dataType: "json",
        success: function (data) {
            if (data.length > 0) {
                var resultList = document.getElementById("resultadoArea");
                resultList.innerHTML = "";

                for (var i = 0; i < data.length; i++) {
                    var item = data[i];
                    var listItem = document.createElement("div");
                    var checkbox = document.createElement("input");
                    var label = document.createElement("label");

                    checkbox.type = "checkbox";
                    checkbox.id = item.id;
                    checkbox.value = item.value;
                    checkbox.addEventListener("change", handleCheckboxChangeAreaFormacao); // Adiciona o manipulador de eventos
                    listItem.appendChild(checkbox);

                    label.textContent = item.name;
                    label.setAttribute("for", item.id); // Vincula o label ao checkbox
                    listItem.appendChild(label);

                    resultList.appendChild(listItem);

                    // Verifica se o checkbox foi previamente selecionado
                    if (checkboxesSelecionadosAreaFormacao.includes(item.id)) {
                        checkbox.checked = true;
                        createListItemAreaFormacao(item.id, item.name, "selectedItemsAreaFormacao[]");
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

function handleCheckboxChangeAreaFormacao(event) {
    var checkbox = event.target;
    var itemId = checkbox.id;

    if (checkbox.checked) {
        if (!isItemInListAreaFormacao(itemId)) {
            createListItemAreaFormacao(itemId, checkbox.nextSibling.textContent); // Cria um novo item de lista
            checkboxesSelecionadosAreaFormacao.push(itemId); // Adiciona o checkbox selecionado ao array
        }
    } else {
        removeItemAreaFormacao(itemId); // Remove o item da lista de IDs e da lista de labels
        checkboxesSelecionadosAreaFormacao = checkboxesSelecionadosAreaFormacao.filter(function (id) {
            return id !== itemId; // Remove o checkbox desmarcado do array
        });
    }

    // Verifica se o checkbox está no offcanvas
    var offcanvasCheckbox = document.getElementById("offcanvas-" + itemId);
    if (offcanvasCheckbox) {
        offcanvasCheckbox.checked = checkbox.checked;

        // Remove o componente do botão correspondente no offcanvas
        var listItemAreaFormacao = document.getElementById("offcanvas-li-" + itemId);
        if (listItemAreaFormacao) {
            listItemAreaFormacao.parentNode.removeChild(listItemAreaFormacao);
        }
    }
}

function removeItemAreaFormacao(itemId) {
    var resultList = document.getElementById("selectedItemsAreaFormacao");
    var listItem = document.getElementById("li-" + itemId);

    if (listItem) {
        resultList.removeChild(listItem);

        // Desmarcar o checkbox correspondente
        var checkbox = document.getElementById(itemId);
        if (checkbox) {
            checkbox.checked = false;
        }
    }
}

function isItemInListAreaFormacao(itemId) {
    var resultList = document.getElementById("selectedItemsAreaFormacao");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        if (item.id === "li-" + itemId) {
            return true;
        }
    }

    return false;
}

function createListItemAreaFormacao(itemId, itemName, inputName) {
    if (!isItemInListAreaFormacao(itemId)) {
        var resultList = document.getElementById("selectedItemsAreaFormacao");

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
            removeItemAreaFormacao(itemId); // Remove o item ao clicar no botão "X"
        });
        listItem.appendChild(closeButton);
        resultList.appendChild(listItem);
    }
}

// Função para verificar os itens de Área de Formação selecionados
function verificarItensSelecionadosAreaFormacao() {
    var resultList = document.getElementById("selectedItemsAreaFormacao");
    var items = resultList.getElementsByTagName("li");
    var selecionados = [];

    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        var label = item.textContent;
        selecionados.push(label);
    }

    console.log("Itens de Área de Formação selecionados:", selecionados);
}
