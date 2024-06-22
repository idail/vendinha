<?php
require("../modelo/Usuario.php");

class UsuarioControladora{
    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function ValidarUsuario($recebeLoginUsuario,$recebeSenhaUsuario)
    {
        $this->usuario->setLogin_Usuario($recebeLoginUsuario);
        $this->usuario->setSenha_Usuario($recebeSenhaUsuario);

        $resultadoValidarUsuario = $this->usuario->ValidarUsuario();

        return $resultadoValidarUsuario;
    }

    public function DeslogarUsuario()
    {
        session_destroy();
        
        $recebe_sessao_usuario_deslogado = "Deslogado com sucesso";
        
        return $recebe_sessao_usuario_deslogado;
    }
}
?>