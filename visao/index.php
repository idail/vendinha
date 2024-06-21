<?php
//verificar utilização dos codigos abaixo dentro da pasta visao no template

// if(!empty($_GET))
// {
//     echo $_GET;
// }

$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';

$url = array_filter(explode('/', $url));

if (!empty($url[0])) {

    if ($url[0] === "inicio" || $url[0] === "cadastrar_produto" || $url[0] === "consulta_produto") {
        require("inicio.php");
    }
} else {
    //var_dump($url);
}
?>