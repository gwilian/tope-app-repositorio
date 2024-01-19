<?php
/**
*
*/
class Menu
{

    function ExibirMenu($id, $flag)
    {
    //desativados:
    //Acompanhamento de estudos -> roteiro, ranking, portfólio
    //Cadernos -> Enviados, Materiais
    //Mentoria -> nova_mentoria.php, solicitacoes.php, respondidas.php, arquivadas.php
    //questões -> minhas_atividades.php
    // <span class='menu-header-text'>Foco</span>  - adiciona frase acima do menu
    //<li class='menu-header small text-uppercase'></li> - adiciona linha para separar
    // <li class='menu-header small text-uppercase'><span class='menu-header-text'>exercitar</span></li>

    $a = ($flag == 1) ? "../" : "";

   

      $inicio = ($id == 1) ? "active" : " ";
      $caderno = ($id == 2) ? "active" : " ";
      $cronograma = ($id == 3) ? "active" : " ";
      $questoes = ($id == 4) ? "active" : " ";
      $sala = ($id == 5) ? "active" : " ";
      $forum = ($id == 6) ? "active" : " ";
      $redacao = ($id == 7)? "active" : " ";
      $widgets = ($id == 8) ? "active" : " ";
      $config = ($id == 9)? "active" : " ";
      $suporte = ($id == 10)? "active" : " ";
      $ajuda = ($id == 11)? "active" : " ";



     echo "
      <ul class='menu-inner py-1'>
<!-- Dashboard -->
<li class='menu-item $inicio'>
 <a href='".$a."index.php' class='menu-link'>
   <i class='menu-icon tf-icons bx bxs-home'></i>
   <div data-i18n='Analytics'>Inicio</div>
 </a>
</li>
<li class='menu-item $caderno'>
 <a href='" . $a . "caderno.php' class='menu-link'>
   <i class='menu-icon tf-icons bx bxs-book-alt'></i>
   <div data-i18n='Analytics'>Caderno</div>
 </a>
</li>

<li class='menu-item $cronograma'>
 <a href='" . $a . "roteiro.php' class='menu-link'>
   <i class='menu-icon tf-icons bx bxs-calendar-check'></i>
   <div data-i18n='Analytics'>Cronograma</div>
 </a>
</li>

<li class='menu-item $questoes'>
 <a href='" . $a . "publico.php' class='menu-link'>
   <i class='menu-icon tf-icons bx bxs-chevron-down-circle'></i>
   <div data-i18n='Analytics'>Questões</div>
 </a>
</li>






<li class='menu-item  $sala'>
 <a href='javascript:void(0)' class='menu-link menu-toggle'>
   <i class='menu-icon tf-icons bx bxs-school'></i>
   <div data-i18n='User interface'>Sala de aula</div>
 </a>
 <ul class='menu-sub'>
   <li class='menu-item'>
     <a href='" . $a . "minha_turma.php' class='menu-link'>
       <div data-i18n='Accordion'>Minha turma</div>
     </a>
   </li>
   <li class='menu-item'>
     <a href='mural_de_avisos.php' class='menu-link'>
       <div data-i18n='Alerts'>Mural de avisos</div>
     </a>
   </li>

   </li>
 </ul>
</li>


<li class='menu-item $forum'>
 <a href='javascript:void(0)' class='menu-link menu-toggle'>
   <i class='menu-icon tf-icons bx bxs-chat'></i>
   <div data-i18n='Extended UI'>Fórum</div>
 </a>
 <ul class='menu-sub'>
   <li class='menu-item'>
     <a href='" . $a . "abrir_forum.php' class='menu-link'>
       <div data-i18n='Perfect Scrollbar'>Abrir fórum</div>
     </a>
   </li>

 </ul>
</li>




<li class='menu-header small text-uppercase'><span class='menu-header-text'>PRO</span></li>

<li class='menu-item $redacao'>
 <a href='" . $a . "redacao.php' class='menu-link'>
   <i class='menu-icon tf-icons bx bxs-pencil'></i>
   <div data-i18n='Basic'>Redação</div>
 </a>
</li>

<li class='menu-item $widgets'>
 <a href='" . $a . "preparatorios.php' class='menu-link'>
   <i class='menu-icon tf-icons bx bxs-widget'></i>
   <div data-i18n='Boxicons'>Widgets</div>
 </a>
</li>

<!-- Forms & Tables -->
<li class='menu-header small text-uppercase'><span class='menu-header-text'>Configurar</span></li>
<!-- Forms -->
<li class='menu-item $config'>
 <a href='javascript:void(0);' class='menu-link menu-toggle'>
   <i class='menu-icon tf-icons bx bxs-cog'></i>
   <div data-i18n='Form Elements'>Configurações do usuário</div>
 </a>
 <ul class='menu-sub'>
   <li class='menu-item'>
     <a href='".$a."perfil.php' class='menu-link'>
       <div data-i18n='Basic Inputs'>Perfil</div>
     </a>
   </li>

 </ul>
</li>
<li class='menu-item $suporte'>
 <a href='javascript:void(0);' class='menu-link menu-toggle'>
   <i class='menu-icon tf-icons bx bxs-bot'></i>
   <div data-i18n='Form Layouts'>Suporte</div>
 </a>
 <ul class='menu-sub'>
   <li class='menu-item'>
     <a href='" . $a . "abrir_novo_chamado.php' class='menu-link'>
       <div data-i18n='Vertical Form'>Abrir novo chamado</div>
     </a>
   </li>
   <li class='menu-item'>
     <a href='" . $a . "andamento.php' class='menu-link'>
       <div data-i18n='Horizontal Form'>Andamento</div>
     </a>
   </li>
 </ul>
</li>

<!-- Misc -->
<li class='menu-header small text-uppercase'><span class='menu-header-text'>Tope app 1.0</span></li>

</li>
<li class='menu-item $ajuda'>
 <a href='" . $a . "ajuda.php' class='menu-link'>
   <i class='menu-icon tf-icons bx bxs-bulb'></i>
   <div data-i18n='Documentation'>Ajuda</div>
 </a>
</li>
</ul>
     ";
    }





}
?>