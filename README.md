# Projeto-MVC

Esse projeto tem como objetivo demostrar o uso da arquitetura MVC.<br>
Ele se assemelha a gerência de uma loja virtual.<br>
É formado por um CRUD, ou seja, permite ao usuário inserir, excluir, visualizar e alterar os dados.<br>

# MVC
A arquitetura MVC é uma forma de organização para programas, que consiste em dividir um sistema em três partes principai: Model, Controller e View.<br>
<h3> - Model </h3>
  O model é onde se concentram todas as classes com as funções utilizadas no programa. Caso seja necessário, um model pode ser estanciado pelo controller.<br><br>     
<h3> - Controller </h3>
  O controller é a parte central do sistema. Cada view precisa de um controller.<br> 
  O controller recebe informações vindas do usuário e caso seja preciso,<br>
  organiza as funções (oriundas dos models) para buscar os resultados (de um banco de dados).<br>
  Ao final do processo, chama a view que ele ele controla e manda os resultados para ela.<br><br>
<h3> - View </h3>
  As views é o que o usuário consegue ver e interagir. Ela é responsável por pegar as informações oriundas do controller<br>e caso for necessário, exibi-las na tela.
