
const OPENAI_API_KEY = "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";
const apiKey = OPENAI_API_KEY;
const url = "https://api.openai.com/v1/chat/completions";
const id_modelo = "gpt-3.5-turbo";

const headers = {
    "Authorization": `Bearer ${apiKey}`,
    "Content-Type": "application/json"
};



const inputQuestion = document.getElementById("inputQuestion");
const result = document.getElementById("result");

const sendQuestionButton = document.getElementById("sendQuestionButton");


// inputQuestion.addEventListener("keypress", (e) => {
//     if (inputQuestion.value && e.key === "Enter") SendQuestion();
// });


inputQuestion.addEventListener("input", function () {
    if (inputQuestion.value.length < 350) {
        sendQuestionButton.disabled = true;
    } else {
        sendQuestionButton.disabled = false;
    }
});

sendQuestionButton.addEventListener("click", (e) => {
    e.preventDefault(); // Impede o comportamento padrão do botão
    if (inputQuestion.value) SendQuestion();
    
    var start = new Date().getTime(); // obter hora atual em milissegundos

    setInterval(function () {
        var now = new Date().getTime(); // obter hora atual em milissegundos
        var timeElapsed = now - start; // calcular tempo decorrido em milissegundos

        var seconds = (timeElapsed / 1000).toFixed(2); // converter para segundos e arredondar para 2 casas decimais
        document.getElementById("time").innerHTML = seconds + "s "; // exibir tempo decorrido no elemento HTML com ID "contador", concatenando um ponto e um zero
    }, 1);


});


function SendQuestion() {
    // loadingMessage.style.display = "block"
    const mensagem = {
        "model": id_modelo,
        "messages": [{ "role": "user", "content": "Corrija esta redação conforme os padrões do enem, exibindo a pontuação correspondente por cada competência com a tag h5 centralizado com a cor blue,  e exibir a pontuação no final com a tag <h1> centralizado, estilizando todo texto, no que couber com estiblos do bootstrapS: "+inputQuestion.value }]
    };

    const xhr = new XMLHttpRequest();
    xhr.open("POST", url);
    xhr.setRequestHeader("Authorization", headers.Authorization);
    xhr.setRequestHeader("Content-Type", headers["Content-Type"]);
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
          

            const resposta = JSON.parse(this.responseText);
            const mensagemAssistente = resposta.choices[0].message.content;
            result.innerHTML = mensagemAssistente;
           
            
            document.getElementById("time").style.visibility = "hidden";
            
            


        }
    };
    xhr.send(JSON.stringify(mensagem));
}