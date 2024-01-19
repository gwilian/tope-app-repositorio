<?php
// Array com as frases
$phrases = array(
    "Planeje antes de começar a escrever: Reserve um tempo para organizar suas ideias antes de iniciar a redação. ",
    "Para tornar sua redação mais persuasiva e convincente, é fundamental apoiar seus argumentos com embasamento sólido.",
    "Não subestime a importância da revisão e edição em seu processo de escrita.",
    "A leitura desempenha um papel crucial no desenvolvimento das habilidades de escrita. ",
    "Lembre-se de praticar regularmente para aprimorar suas habilidades de redação, escrevendo."
);

// Converter o array em formato JSON e retornar para a requisição AJAX
echo json_encode($phrases);
