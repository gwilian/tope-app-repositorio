var checkboxesSelecionadosBanca = []; // Array global para armazenar os checkboxes selecionados do botão "Banca"

function buscarBanca() {
    var searchQuery = document.getElementById("inputTextBanca").value;
    var selectedValues = [];
    $.ajax({
        url: "Classes/pesq_banca.php",
        type: "POST",
        data: { query: searchQuery },
        dataType: "json",
        success: function (data) {
            if (data.length > 0) {
                var resultList = document.getElementById("resultadoBanca");
                resultList.innerHTML = "";

                for (var i = 0; i < data.length; i++) {
                    var item = data[i];
                    var listItem = document.createElement("div");
                    var checkbox = document.createElement("input");
                    var label = document.createElement("label");

                    checkbox.type = "checkbox";
                    checkbox.id = item.id;
                    checkbox.value = item.value;
                    checkbox.addEventListener("change", handleCheckboxChangeBanca); // Adiciona o manipulador de eventos
                    listItem.appendChild(checkbox);

                    label.textContent = item.name;
                    label.setAttribute("for", item.id); // Vincula o label ao checkbox
                    listItem.appendChild(label);

                    resultList.appendChild(listItem);

                    // Verifica se o checkbox foi previamente selecionado
                    if (checkboxesSelecionadosBanca.includes(item.id)) {
                        checkbox.checked = true;
                        createListItemBanca(item.id, item.name, "selectedItemsBanca[]");
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

function handleCheckboxChangeBanca(event) {
    var checkbox = event.target;
    var itemId = checkbox.id;

    if (checkbox.checked) {
        if (!isItemInListBanca(itemId)) {
            createListItemBanca(itemId, checkbox.nextSibling.textContent); // Cria um novo item de lista
            checkboxesSelecionadosBanca.push(itemId); // Adiciona o checkbox selecionado ao array
        }
    } else {
        removeItemBanca(itemId); // Remove o item da lista de IDs e da lista de labels
        checkboxesSelecionadosBanca = checkboxesSelecionadosBanca.filter(function (id) {
            return id !== itemId; // Remove o checkbox desmarcado do array
        });
    }

    // Verifica se o checkbox está no offcanvas
    var offcanvasCheckbox = document.getElementById("offcanvas-" + itemId);
    if (offcanvasCheckbox) {
        offcanvasCheckbox.checked = checkbox.checked;

        // Remove o componente do botão correspondente no offcanvas
        var listItemBanca = document.getElementById("offcanvas-li-" + itemId);
        if (listItemBanca) {
            listItemBanca.parentNode.removeChild(listItemBanca);
        }
    }
}

function removeItemBanca(itemId) {
    var resultList = document.getElementById("selectedItemsBanca");
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

function isItemInListBanca(itemId) {
    var resultList = document.getElementById("selectedItemsBanca");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        if (item.id === "li-" + itemId) {
            return true;
        }
    }

    return false;
}

function createListItemBanca(itemId, itemName, inputName) {
    if (!isItemInListBanca(itemId)) {
        var resultList = document.getElementById("selectedItemsBanca");

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
            removeItemBanca(itemId); // Remove o item ao clicar no botão "X"
        });
        listItem.appendChild(closeButton);
        resultList.appendChild(listItem);
    }
}

// Função para verificar os itens de Banca selecionados
function verificarItensSelecionadosBanca() {
    var resultList = document.getElementById("selectedItemsBanca");
    var items = resultList.getElementsByTagName("li");
    var selecionados = [];

    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        var label = item.textContent;
        selecionados.push(label);
    }

    console.log("Itens de Banca selecionados:", selecionados);
}
