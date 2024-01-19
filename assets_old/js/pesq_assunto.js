var checkboxesSelecionadosAssunto = []; // Array global para armazenar os checkboxes selecionados do botão "Assunto"

// function buscarAssunto() {

//     const selectedItemsDiv = document.getElementById("selectedItemsDisciplina");
//     const listItems = selectedItemsDiv.getElementsByTagName("li");

//     if (listItems.length === 0) {
//         // Nenhum item de disciplina selecionado, exibir o toast
//         var myToast = document.getElementById("myToast");
//         var toast = new bootstrap.Toast(myToast);
//         toast.show();
//         return; // Retorna da função para evitar a execução adicional
//     }



//     let selectedIds = [];

//     for (let i = 0; i < listItems.length; i++) {
//         const listItem = listItems[i];
//         const liId = listItem.id;
//         const idParts = liId.split("-");
//         const selectedId = idParts[1];

//         selectedIds.push(selectedId);
//     }

//     const selectedIdsString = selectedIds.join(", ");
   





//     var searchQuery = document.getElementById("inputTextAssunto").value;
//     var selectedValues = [];
//     $.ajax({
//         url: "Classes/pesq_assunto.php",
//         type: "POST",
//         data: { query: searchQuery, disciplina: selectedIdsString },
//         dataType: "json",
//         success: function (data) {
//             //  alert("IDs selecionados: " + selectedIdsString);
//             if (data.length > 0) {
//                 var resultList = document.getElementById("resultadoAssunto");
//                 resultList.innerHTML = "";

//                 for (var i = 0; i < data.length; i++) {
//                     var item = data[i];
//                     var listItem = document.createElement("div");
//                     var checkbox = document.createElement("input");
//                     var label = document.createElement("label");

//                     checkbox.type = "checkbox";
//                     checkbox.id = item.id;
//                     checkbox.value = item.value;
//                     checkbox.addEventListener("change", handleCheckboxChangeAssunto); // Adiciona o manipulador de eventos
//                     listItem.appendChild(checkbox);

//                     label.textContent = item.name;
//                     label.setAttribute("for", item.id); // Vincula o label ao checkbox
//                     listItem.appendChild(label);

//                     resultList.appendChild(listItem);

//                     // Verifica se o checkbox foi previamente selecionado
//                     if (checkboxesSelecionadosAssunto.includes(item.id)) {
//                         checkbox.checked = true;
//                         createListItemAssunto(item.id, item.name, "selectedItemsAssunto[]");
//                     }
//                 }
//             } else {
//                 alert("Nenhum resultado encontrado.");
//             }
//         },
//         error: function () {
//             alert("Ocorreu um erro na requisição.");
//         }


//     });
// }
function buscarAssunto() {
const selectedItemsDiv = document.getElementById("selectedItemsDisciplina");
const listItems = selectedItemsDiv.getElementsByTagName("li");

if (listItems.length === 0) {
    // Nenhum item de disciplina selecionado, exibir o toast
    var myToast = document.getElementById("myToast");
    var toast = new bootstrap.Toast(myToast);
    toast.show();
    return; // Retorna da função para evitar a execução adicional
}

let selectedIds = [];

for (let i = 0; i < listItems.length; i++) {
    const listItem = listItems[i];
    const liId = listItem.id;
    const idParts = liId.split("-");
    const selectedId = idParts[1];

    selectedIds.push(selectedId);
}

const selectedIdsString = selectedIds.join(", ");
const searchQuery = document.getElementById("inputTextAssunto").value;

$.ajax({
    url: "Classes/pesq_assunto.php",
    type: "POST",
    data: { query: searchQuery, disciplina: selectedIdsString },
    dataType: "json",
    success: function (data) {
        if (data.length > 0) {
            var resultList = document.getElementById("resultadoAssunto");
            resultList.innerHTML = "";

            data.sort(function (a, b) {
                var numA = a.name.split('.').map(function (part) {
                    return parseInt(part);
                });
                var numB = b.name.split('.').map(function (part) {
                    return parseInt(part);
                });

                for (var i = 0; i < numA.length && i < numB.length; i++) {
                    if (numA[i] < numB[i]) {
                        return -1;
                    } else if (numA[i] > numB[i]) {
                        return 1;
                    }
                }

                if (numA.length < numB.length) {
                    return -1;
                } else if (numA.length > numB.length) {
                    return 1;
                }

                return a.name.localeCompare(b.name);
            });



            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                var listItem = document.createElement("div");
                var checkbox = document.createElement("input");
                var label = document.createElement("label");

                checkbox.type = "checkbox";
                checkbox.id = item.id;
                checkbox.value = item.value;
                checkbox.addEventListener("change", handleCheckboxChangeAssunto); // Adiciona o manipulador de eventos
                listItem.appendChild(checkbox);

                label.textContent = item.name;
                label.setAttribute("for", item.id); // Vincula o label ao checkbox
                listItem.appendChild(label);

                resultList.appendChild(listItem);

                // Verifica se o checkbox foi previamente selecionado
                if (checkboxesSelecionadosAssunto.includes(item.id)) {
                    checkbox.checked = true;
                    createListItemAssunto(item.id, item.name, "selectedItemsAssunto[]");
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


function handleCheckboxChangeAssunto(event) {
    var checkbox = event.target;
    var itemId = checkbox.id;

    if (checkbox.checked) {
        if (!isItemInListAssunto(itemId)) {
            createListItemAssunto(itemId, checkbox.nextSibling.textContent); // Cria um novo item de lista
            checkboxesSelecionadosAssunto.push(itemId); // Adiciona o checkbox selecionado ao array
        }
    } else {
        removeItemAssunto(itemId); // Remove o item da lista de IDs e da lista de labels
        checkboxesSelecionadosAssunto = checkboxesSelecionadosAssunto.filter(function (id) {
            return id !== itemId; // Remove o checkbox desmarcado do array
        });
    }

    // Verifica se o checkbox está no offcanvas
    var offcanvasCheckbox = document.getElementById("offcanvas-" + itemId);
    if (offcanvasCheckbox) {
        offcanvasCheckbox.checked = checkbox.checked;

        // Remove o componente do botão correspondente no offcanvas
        var listItemAssunto = document.getElementById("offcanvas-li-" + itemId);
        if (listItemAssunto) {
            listItemAssunto.parentNode.removeChild(listItemAssunto);
        }
    }
}

function removeItemAssunto(itemId) {
    var resultList = document.getElementById("selectedItemsAssunto");
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

function isItemInListAssunto(itemId) {
    var resultList = document.getElementById("selectedItemsAssunto");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        if (item.id === "li-" + itemId) {
            return true;
        }
    }

    return false;
}

function createListItemAssunto(itemId, itemName, inputName) {
    if (!isItemInListAssunto(itemId)) {
        var resultList = document.getElementById("selectedItemsAssunto");

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
            removeItemAssunto(itemId); // Remove o item ao clicar no botão "X"
        });
        listItem.appendChild(closeButton);
        resultList.appendChild(listItem);
    }
}

// Função para verificar os itens de Assunto selecionados
function verificarItensSelecionadosAssunto() {
    var resultList = document.getElementById("selectedItemsAssunto");
    var items = resultList.getElementsByTagName("li");
    var selecionados = [];

    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        var label = item.textContent;
        selecionados.push(label);
    }

    console.log("Itens de Assunto selecionados:", selecionados);
}
