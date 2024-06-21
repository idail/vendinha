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
}
?>