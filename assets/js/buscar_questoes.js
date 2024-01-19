var Pagina = 1;

function getMinhasQuestoes() {
    var selectedRadio = $('input[name="minhas_questoes"]:checked').val();
    return selectedRadio;
}



function getSelectedDisciplinas() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsDisciplina");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}


function getSelectedAssunto() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsAssunto");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}


function getSelectedBanca() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsBanca");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}




function getSelectedInstituicao() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsInstituicao");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}



function getSelectedCargo() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsCargo");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}


function getSelectedAno() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsAno");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}

function getSelectedCarreira() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsCarreira");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}

function getSelectedAreaFormacao() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsAreaFormacao");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}

function getSelectedEscolaridade() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsEscolaridade");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}

function getSelectedDificuldade() {
    var selectedItems = [];
    var resultList = document.getElementById("selectedItemsDificuldade");
    var items = resultList.getElementsByTagName("li");

    for (var i = 0; i < items.length; i++) {
        var itemId = items[i].id.split("-")[1];
        selectedItems.push(itemId);
    }

    return selectedItems;
}


function BuscarQuestoes(paginaContagem) {
   

    var disciplinasSelecionadas = getSelectedDisciplinas();
    var AssuntosSelecionados = getSelectedAssunto();
    var bancaSelecionados = getSelectedBanca();
    var instituicaoSelecionados = getSelectedInstituicao();
    var cargoSelecionados = getSelectedCargo();
    var anoSelecionados = getSelectedAno();
    var carreiraSelecionados = getSelectedCarreira();
    var areaFormacaoSelecionados = getSelectedAreaFormacao();
    var escolaridadeSelecionados = getSelectedEscolaridade();
    var dificuldadeSelecionados = getSelectedDificuldade();
    
    var minhas_questoes = getMinhasQuestoes();

  

    // Verifica se a lista está vazia
    var listaVazia = disciplinasSelecionadas.length === 0 &&
        AssuntosSelecionados.length === 0 &&
        bancaSelecionados.length === 0 &&
        instituicaoSelecionados.length === 0 &&
        cargoSelecionados.length === 0 &&
        anoSelecionados.length === 0 &&
        carreiraSelecionados.length === 0 &&
        areaFormacaoSelecionados.length === 0 &&
        escolaridadeSelecionados.length === 0 &&
        dificuldadeSelecionados.length === 0;

    if (listaVazia) {
        
      
       alert("Selecione algum filtro para buscar!");

    } else {
        // A lista não está vazia, executa a ação de busca das questões
        showLoadingModal();
        var data = {
            paginaContagem: paginaContagem,
            disciplinas: disciplinasSelecionadas.toString(),
            assuntos: AssuntosSelecionados.toString(),
            banca: bancaSelecionados.toString(),
            orgao: instituicaoSelecionados.toString(),
            cargo: cargoSelecionados.toString(),
            ano: anoSelecionados.toString(),
            carreira: carreiraSelecionados.toString(),
            area: areaFormacaoSelecionados.toString(),
            dificuldade: dificuldadeSelecionados.toString(),
            minhas_questoes: minhas_questoes
        };

        $.ajax({
            url: 'Classes/mount_query.php',
            type: 'POST',
            data: data,
            success: function (response) {
                $('#teste').html(response);
                hideLoadingModal();
            },
            error: function (xhr, status, error) {
                console.log(error);
                hideLoadingModal();
            }
        });
    }
}



function NavigationQuestoes(paginaContagem) {

    showLoadingModal();

      var disciplinasSelecionadas = getSelectedDisciplinas();
    var AssuntosSelecionados = getSelectedAssunto();
    var bancaSelecionados = getSelectedBanca();
    var instituicaoSelecionados = getSelectedInstituicao();
    var cargoSelecionados = getSelectedCargo();
    var anoSelecionados = getSelectedAno();
    var carreiraSelecionados = getSelectedCarreira();
    var areaFormacaoSelecionados = getSelectedAreaFormacao();
    var escolaridadeSelecionados = getSelectedEscolaridade();
    var dificuldadeSelecionados = getSelectedDificuldade();


    // alert("disciplina: " + cargoSelecionados,);
    // const div = document.getElementById('teste');
    // div.innerHTML = 'Novo conteúdo da div';

    var data = {
        navigation: 1,
        paginaContagem: paginaContagem,
         disciplinas: disciplinasSelecionadas.toString(),
        assuntos: AssuntosSelecionados.toString(),
        banca: bancaSelecionados.toString(),
        orgao: instituicaoSelecionados.toString(),
        cargo: cargoSelecionados.toString(),
        ano: anoSelecionados.toString(),
        carreira: carreiraSelecionados.toString(),
        area: areaFormacaoSelecionados.toString(),
        dificuldade: dificuldadeSelecionados.toString()
    };
    // $('#loading-icon').css('display', 'block');
    // Faça a solicitação AJAX
    $.ajax({
        url: 'Classes/mount_query.php',
        type: 'POST',
        data: data,
        success: function (response) {
            // Substitua o conteúdo da div "teste" pelo retorno do PHP
            $('#questoes').html(response);
            hideLoadingModal();
        },
        error: function (xhr, status, error) {
            // Lida com erros de solicitação AJAX, se necessário
            console.log(error);
            hideLoadingModal();
        }
    });
}


function retrocederPagina(totalPaginas) {
    var paginaAtual = parseInt(document.getElementById('item_2').textContent);

    if (paginaAtual > 1) {
        paginaAtual -= 1;
        atualizarPagina(paginaAtual, totalPaginas);
    }
}

function avancarPagina(totalPaginas) {
    var paginaAtual = parseInt(document.getElementById('item_2').textContent);

    if (paginaAtual < totalPaginas) {
        paginaAtual += 1;
        atualizarPagina(paginaAtual, totalPaginas);
    }
}

function atualizarPagina(pagina, totalPaginas) {
    
    NavigationQuestoes(pagina);

    var totalPaginasElementlast = document.getElementById('last');
    var totalPaginasValue = parseInt(totalPaginasElementlast.getAttribute('value'));

    var itensPagina = document.querySelectorAll('.page-item');

    // Remover a classe "active" de todos os itens da página
    itensPagina.forEach(function (item) {
        item.classList.remove('active');
    });

    // Atualizar os números dos itens
    for (var i = 1; i <= itensPagina.length - 2; i++) {
        var item = document.getElementById('item_' + i);
        if (item) {
            if (item.id !== 'last') { // Verificar se não é o último item
                var paginaAtualizada = pagina + i - 2;
                if (paginaAtualizada >= 1 && paginaAtualizada <= totalPaginasValue) {
                    item.querySelector('.page-link').textContent = paginaAtualizada;
                } else {
                    item.querySelector('.page-link').textContent = "";
                }
            }
        }
    }

    var itemLast = document.getElementById('last');
    if (itemLast && pagina === totalPaginasValue) {
        itemLast.classList.add('active');
    }

    // Verificar limite mínimo de página
    if (pagina < 1) {
        pagina = 1;
    }

    // Verificar limite máximo de página
    if (pagina > totalPaginasValue) {
        pagina = totalPaginasValue;
    }

    var itemPaginaAtual = document.getElementById('item_' + 2);
    if (itemPaginaAtual) {
        itemPaginaAtual.classList.add('active');
    }

    var totalPaginasElement = document.querySelector('.page-link[data-value]');
    if (totalPaginasElement) {
        totalPaginasElement.textContent = pagina;
    }

    // Desabilitar link para páginas superiores ao total de páginas
    var lastItem = document.getElementById('last');
    var lastLink = lastItem.querySelector('.page-link');

    if (pagina >= totalPaginasValue) {
        lastItem.classList.add('disabled');
        lastLink.removeAttribute('onclick');
    } else {
        lastItem.classList.remove('disabled');
        lastLink.setAttribute('onclick', 'lastItem(' + totalPaginasValue + ')');
    }

   
}

function primeiroItem() {
    var elemento = document.getElementById('item_1');
    var conteudo = elemento.textContent.trim();

    if (conteudo === '') {
        // alert('O elemento está em branco.');
    } else {
        var paginaAtual = parseInt(document.getElementById('item_1').textContent);
        atualizarPagina(paginaAtual);
    }
}

function segundoItem() {
    var paginaAtual = parseInt(document.getElementById('item_2').textContent);
    atualizarPagina(paginaAtual);
}

function terceiroItem() {
    var elemento = document.getElementById('item_3');
    var conteudo = elemento.textContent.trim();

    if (conteudo === '') {
        // alert('O elemento está em branco.');
    } else {
        var paginaAtual = parseInt(document.getElementById('item_3').textContent);
        atualizarPagina(paginaAtual);
    }
}

function quartoItem() {
    var elemento = document.getElementById('item_4');
    var conteudo = elemento.textContent.trim();

    if (conteudo === '') {
        // alert('O elemento está em branco.');
    } else {
        var paginaAtual = parseInt(document.getElementById('item_4').textContent);
        atualizarPagina(paginaAtual);
    }
}

function lastItem(totalPaginas) {
    var paginaAtual = totalPaginas;

    // Remover a classe "active" de todos os itens da página
    var itensPagina = document.querySelectorAll('.page-item');
    itensPagina.forEach(function (item) {
        item.classList.remove('active');
    });

    var itemLast = document.getElementById('last');
    if (itemLast) {
        itemLast.classList.add('active');
    }

    atualizarPagina(paginaAtual, totalPaginas);
}
function removerToast() {
    setTimeout(function () {
        var toast = document.getElementById("myToast");
        toast.remove();
    }, 2000);
}