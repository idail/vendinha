<?php
require("../controladora/UsuarioControladora.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");

$usuarioControladora = new UsuarioControladora();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recebeProcessoUsuario = $_POST["processo_usuario"];

    if($recebeProcessoUsuario === "recebe_autenticacao_usuario"){
        $recebeLoginUsuario = $_POST["login-usuario-autenticacao"];
        $recebeSenhaUsuario = $_POST["senha-usuario-autenticacao"];

        if(!empty($recebeLoginUsuario) && !empty($recebeSenhaUsuario)){
            $resultadoValidaUsuario = $usuarioControladora->ValidarUsuario($recebeLoginUsuario,$recebeSenhaUsuario);

            if(!empty($resultadoValidaUsuario))
                echo json_encode($resultadoValidaUsuario);
            else
                echo json_encode("Favor verificar os dados preenchidos");
        }else{
            echo json_encode("Favor verificar os dados preenchidos");
        }
    }
}
?>