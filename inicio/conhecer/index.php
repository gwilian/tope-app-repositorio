<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#Tope - Conhecendo melhor</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./img/showcase2.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>



</head>

<body>
    <div class="container">
        <header>#Tope - estudos</header>
        <div class="progress-bar">
            <div class="step">
                <p>Nome</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Objetivo</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Sobre</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>

            <div class="step">
                <p>Pronto!</p>
                <div id="bullet-four" class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>
        <div class="form-outer">
            <form action="../../app/a/auth2.php" method="post">
                <input type="hidden" name="id_post" value="4">

                <div class="page slide-page">
                    <div class="title">Bem vindo, como se chama?</div>



                    <div class="field">
                        <div class="label">Seu Nome:</div>
                        <input name="nome" type="text" required />
                    </div>
                    <div class="field">
                        <div class="label">Sobrenome</div>
                        <input name="sobrenome" type="text" required />
                    </div>
                    <div class="field">
                        <button class="firstNext next">Próximo</button>
                    </div>
                </div>

                <div class="page">
                    <div class="title">Qual seu objetivo?</div>
                    <div class="field">
                        <!-- <div class="label">Email Address</div> -->
                        <select id="opcao1" name="opcao" class="form-select" aria-label="Selecione uma opção">
                            <option selected>Selecione uma opção</option>
                            <option value="enem">Enem/Vestibular</option>
                            <option value="oab">OAB</option>
                            <option value="concursos">Concursos</option>
                        </select>

                        <select id="opcao2" class="form-select" aria-label="Selecione outra opção" style="display:none">
                            <option selected>Selecione outra opção</option>
                        </select>
                    </div>

                    <div class="field btns">
                        <button class="prev-1 prev">Voltar</button>
                        <button class="next-1 next">Próximo</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">Sobre você: </div>
                    <div class="field">
                        <div class="label">Data de nascimento</div>
                        <input name="nascimento" type="date" required />
                    </div>
                    <div class="field">
                        <div class="label">Gênero</div>
                        <select id="opcao1" name="genero" class="form-select" aria-label="Selecione uma opção" required>
                            <option selected>Selecione uma opção</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    <div class="field">
                        <div class="label">Contato: telefone/Whatsapp</div>
                        <input name="telefone" type="tel" class="phone-mask" required />
                    </div>
                    <div class="field btns">
                        <button class="prev-2 prev">Voltar</button>
                        <button class="next-2 next">Próximo</button>
                    </div>
                </div>


                <div class="page">
                    <div class="title">Pronto:</div>

                    <div class="field">
                        <div class="label">Email</div>
                        <input name="email" onkeyup="showHint(this.value)" type="email" required />
                        <p id="mostrar" style="color: #FF0000;"></p>
                    </div>
                    <div class="field">
                        <div class="label">Senha</div>
                        <input name="senha" id="senha" type="password" required />
                    </div>
                    <div class="field">
                        <div class="label">Repita a senha</div>
                        <input name="senha_repetida" id="senha_repetida" type="password" required />
                    </div>
                    <div class="field btns">
                        <button class="prev-3 prev">Voltar</button>
                        <button id="botao" name="botao" class="next-3 next">Próximo</button>
                    </div>
                </div>

                <div class="page">
                    <div class="title"> Tudo certo!</div>


                    <div class="field btns">
                        <button class="prev-4 prev">Voltar</button>
                        <button id="submit" class="submit">Registrar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <script>
        $(document).ready(function() {
            $('.phone-mask').mask('(00) 00000-0000');



        });


        function validarDataNascimento(inputNascimento) {
            const valorNascimento = inputNascimento.value;

            if (!valorNascimento) {
                // Campo de data de nascimento está vazio
                return 'Campo de data de nascimento está vazio.';
            }

            const dataNascimento = new Date(valorNascimento);
            if (isNaN(dataNascimento.getTime())) {
                // Data de nascimento é inválida
                return 'Data de nascimento é inválida.';
            }

            const dataAtual = new Date();
            if (dataNascimento > dataAtual) {
                // Data de nascimento é no futuro
                return 'Data de nascimento é no futuro.';
            }

            const idadeMinima = 12;
            const idade = dataAtual.getFullYear() - dataNascimento.getFullYear();
            if (idade < idadeMinima) {
                // Usuário tem menos de 18 anos
                return 'Usuário tem menos de 12 anos.';
            }

            // Data de nascimento é válida
            return null;
        }

        const inputNascimento = document.querySelector('input[name="nascimento"]');
        inputNascimento.addEventListener('input', function(event) {
            const mensagemErro = validarDataNascimento(inputNascimento);
            if (mensagemErro) {
                inputNascimento.setCustomValidity(mensagemErro);
            } else {
                inputNascimento.setCustomValidity('');
            }
        });


        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("mostrar").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        if (this.responseText == "true") {
                            closed = true;
                            document.getElementById("mostrar").innerHTML = "Este email já existe";
                            var btn_acao = document.getElementById('botao');
                            btn_acao.setAttribute('disabled', '');

                            var cmp1 = document.getElementById('senha');
                            cmp1.setAttribute('disabled', '');

                            var cmp2 = document.getElementById('senha_repetida');
                            cmp2.setAttribute('disabled', '');

                        } else {
                            closed = false;
                            document.getElementById("mostrar").innerHTML = "";
                            $(document).ready(function() {
                                $('#botao').prop('disabled', false);
                                $('#senha').prop('disabled', false);
                                $('#senha_repetida').prop('disabled', false);
                            });
                        }
                        //document.getElementById("mostrar").innerHTML = this.responseText;
                    }
                };
                // xmlhttp.open("GET", "  /Classes/ValidaEmail.php?q=" + str, true);
                xmlhttp.open("GET", "../../app/Classes/ValidaEmail.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

</body>

</html>