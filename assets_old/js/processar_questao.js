
function correct(elementId) {
    var correctText = document.getElementById(elementId);
    correctText.style.color = 'green';

    // alert(elementId); 
    var dado = elementId;
    var sequenciaNumerica = extrairSequencia(dado);


    var dadoLetra = elementId;
    var Alt = extrairLetra(dadoLetra);
    // console.log(letra); // Output: D

    var alternativas = document.getElementsByName(sequenciaNumerica);

    for (var i = 0; i < alternativas.length; i++) {
        if (alternativas[i].checked) {
            var id = alternativas[i].id;
            var letra = id.charAt(0);
            var alternativaId = id.substring(1);

            // alert("Alternativa " + letra + " foi selecionada (ID: " + alternativaId + ")");

            if (Alt == letra) {
                // alert ("Você acertou a alternativa correta é " + letra);
                var alertaHTML = '<div class="alert alert-success" role="alert">Você acertouu!</div>';
                var divStatusQuestion = document.getElementById("status_question_" + sequenciaNumerica);
                divStatusQuestion.innerHTML = alertaHTML;


                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        // Ação a ser executada quando a resposta for recebida com sucesso
                    }
                };
                xhttp.open("POST", "Classes/processar_questao.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                var dados = "id_questao_chave=" + sequenciaNumerica + "&acerto_erro=Acertou" + "&alt=" + letra;
                xhttp.send(dados);



            } else {
                // alert ("Você errou! a alternativa correta é "+ Alt);

                var alertaHTML = '<div class="alert alert-danger" role="alert">Você errou esta questão! a correta é a letra ' + Alt + '</div>';
                var divStatusQuestion = document.getElementById("status_question_" + sequenciaNumerica);
                divStatusQuestion.innerHTML = alertaHTML;


                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        // Ação a ser executada quando a resposta for recebida com sucesso
                    }
                };
                xhttp.open("POST", "Classes/processar_questao.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                var dados = "id_questao_chave=" + sequenciaNumerica + "&acerto_erro=Errou" + "&alt=" + letra;
                xhttp.send(dados);



            }


            break;
        }
    }

}

window.addEventListener('load', function () {
    var loadingModal = document.getElementById('loading-modal');
    loadingModal.style.display = 'none';
});


function showLoadingModal() {
    var loadingModal = document.getElementById('loading-modal');
    loadingModal.style.display = 'flex';
}

function hideLoadingModal() {
    var loadingModal = document.getElementById('loading-modal');
    loadingModal.style.display = 'none';
}

function extrairSequencia(texto) {
    var sequencia = texto.match(/\d+/)[0];
    return sequencia;
}

function extrairLetra(texto) {
    var letra = texto.slice(-1);
    return letra;
}
