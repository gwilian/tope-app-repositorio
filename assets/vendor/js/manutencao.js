

  document.addEventListener("DOMContentLoaded", function() {
    // Seleciona o modal
    var modalToggle = document.getElementById("manutencao");
    // Abre o modal
    var modal = new bootstrap.Modal(modalToggle);
    modal.show();
  });



  		// Defina a data e hora do término do contador
  		var countDownDate = new Date("April 16, 2023 23:59:59").getTime();

  		// Atualize o contador a cada segundo
  		var x = setInterval(function() {

  		  // Calcule a diferença entre a data atual e a data de término do contador
  		  var now = new Date().getTime();
  		  var distance = countDownDate - now;

  		  // Calcula o tempo restante em dias, horas, minutos e segundos
  		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  		  // Exiba o tempo restante em uma página HTML
  		  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  		  + minutes + "m " + seconds + "s ";

  		  // Quando o contador chegar a zero, exiba uma mensagem
  		  if (distance < 0) {
  		    clearInterval(x);
  		    document.getElementById("demo").innerHTML = "EXPIRED";
  		  }
  		}, 1000);


  
