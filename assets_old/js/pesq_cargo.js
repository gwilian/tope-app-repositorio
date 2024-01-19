var checkboxesSelecionadosCargo = []; // Array global para armazenar os checkboxes selecionados do botão "Cargo"

function buscarCargo() {
    var searchQuery = document.getElementById("inputTextCargo").value;
    var selectedValues = [];
    $.ajax({
        url: "Classes/pesq_cargo.php",
        type: "POST",
        data: { query: searchQuery },
        dataType: "json",
        success: function (data) {
            if (data.length > 0) {
                var resultList = document.getElementById("resultadoCargo");
                resultList.innerHTML = "";

                for (var i = 0; i < data.length; i++) {
                    var item = data[i];
                    var listItem = document.createElement("div");
                    var checkbox = document.createElement("input");
                    var label = document.createElement("label");

                    checkbox.type = "checkbox";
                    checkbox.id = item.id;
                    checkbox.value = item.value;
                    checkbox.addEventListener("change", handleCheckboxChangeCargo); // Adiciona o manipulador de eventos
                    listItem.appendChild(checkbox);

                    label.textContent = item.name;
                    label.setAttribute("for", item.id); // Vincula o label ao checkbox
                    listItem.appendChild(label);

                    resultList.appendChild(listItem);

                    // Verifica se o checkbox foi previamente selecionado
                    if (checkboxesSelecionadosCargo.includes(item.id)) {
                        checkbox.checked = true;
                        createListItemCargo(item.id, item.name, "selectedItemsCargo[]");
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

function handleCheckboxChangeCargo(event) {
    var checkbox = event.target;
    var itemId = checkbox.id;

    if (checkbox.checked) {
        if (!isItemInListCargo(itemId)) {
            createListItemCargo(itemId, checkbox.nextSibling.textContent); // Cria um novo item de lista
            checkboxesSelecionadosCargo.push(itemId); // Adiciona o checkbox selecionado ao array
        }
    } else {
        removeItemCargo(itemId); // Remove o item da lista de IDs e da lista de labels
        checkboxesSelecionadosCargo = checkboxesSelecionadosCargo.filter(function (id) {
            return id !== itemId; // Remove o checkbox desmarcado do array
        });
    }

    // Verifica se o checkbox está no offcanvas
    var offcanvasCheckbox = document.getElementById("offcanvas-" + itemId);
    if (offcanvasCheckbox) {
        offcanvasCheckbox.checked = checkbox.checked;

        // Remove o componente do botão correspondente no offcanvas
        var listItemCargo = document.getElementById("offcanvas-li-" + itemId);
        if (listItemCargo) {
            listItemCargo.parentNode.removeChild(listItemCargo);
        }
    }
}

function removeItemCargo(itemId) {
    var resultList = document.getElementById("selectedItemsCargo");
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

function isItemInListCargo(itemId) {
    var resultList = document.getElementById("selectedItemsCargo");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        if (item.id === "li-" + itemId) {
            return true;
        }
    }

    return false;
}

function createListItemCargo(itemId, itemName, inputName) {
    if (!isItemInListCargo(itemId)) {
        var resultList = document.getElementById("selectedItemsCargo");

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
            removeItemCargo(itemId); // Remove o item ao clicar no botão "X"
        });
        listItem.appendChild(closeButton);
        resultList.appendChild(listItem);
    }
}

// Função para verificar os itens de Cargo selecionados
function verificarItensSelecionadosCargo() {
    var resultList = document.getElementById("selectedItemsCargo");
    var items = resultList.getElementsByTagName("li");
    var selecionados = [];

    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        var label = item.textContent;
        selecionados.push(label);
    }

    console.log("Itens de Cargo selecionados:", selecionados);
}
