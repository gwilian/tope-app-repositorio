function display(n) {
  var radios = document.getElementsByName(n);
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      $.ajax({
        url: 'Classes/questao_corrigir.php',
        type: 'post',
        data: {value: n},
        success: function(response) {
          var jsonData = JSON.parse(response);
          // alert("A alternativa correta é: " + jsonData.alt_correta + " mas você marcou a : "+ radios[i].value);
          // var originalString = jsonData.alt_correta;
          // var lowercaseString = jsonData.alt_correta.toLowerCase();

            if (jsonData.alt_correta  == radios[i].value ) {
              //acertou a questão
              document.getElementById( jsonData.alt_correta.toLowerCase() +"_label_"+ n).style.color = "green";
              document.getElementById("show_"+n).innerHTML = "Parabéns você acertou! a resposta correta é a : "+ jsonData.alt_correta;
              document.getElementById("btn_"+n).disabled = true;
              document.getElementById("btn_"+n).style.pointerEvents = "none";
            }else {
              //errou a questão
              document.getElementById( jsonData.alt_correta.toLowerCase() +"_label_"+ n).style.color = "green";
              document.getElementById( radios[i].value.toLowerCase() +"_label_"+ n).style.color = "red";
              document.getElementById("show_"+n).innerHTML = "Você errou :( , a alternativa correta é: "+  jsonData.alt_correta;
              document.getElementById("btn_"+n).disabled = true;
              document.getElementById("btn_"+n).style.pointerEvents = "none";
            }







        }
      });
      break;
    }
  }
}
