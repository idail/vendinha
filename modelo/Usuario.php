<?php
require("Conexao.php");
require("UsuarioInterface.php");

if (!isset($_SESSION)) {
    session_start();
}

class Usuario implements UsuarioInterface{
    private $codigo_usuario;
    private $nome_usuario;
    private $login_usuario;
    private $senha_usuario;

    public function setCodigo_Usuario($codigo_usuario)
    {
        $this->codigo_usuario = $codigo_usuario;
    }

    public function getCodigo_Usuario()
    {
        return $this->codigo_usuario;
    }

    public function setNome_Usuario($nome_usuario)
    {
        $this->nome_usuario = $nome_usuario;
    }

    public function getNome_Usuario()
    {
        return $this->nome_usuario;
    }

    public function setLogin_Usuario($login_usuario)
    {
        $this->login_usuario = $login_usuario;
    }

    public function getLogin_Usuario()
    {
        return $this->login_usuario;
    }

    public function setSenha_Usuario($senha_usuario)
    {
        $this->senha_usuario = $senha_usuario;
    }

    public function getSenha_Usuario()
    {
        return $this->senha_usuario;
    }

    public function ValidarUsuario():array
    {
        $registro_usuario = array();

        try {
            
            $sql_ValidaUsuario = "select * from usuario where login_usuario = :login_recebido and senha_usuario = :senha_recebida";
            
            $comando_BuscaValidacaoUsuario = Conexao::Obtem()->prepare($sql_ValidaUsuario);
            
            $comando_BuscaValidacaoUsuario->bindValue(":login_recebido", $this->getLogin_Usuario());
            $comando_BuscaValidacaoUsuario->bindValue(":senha_recebida", $this->getSenha_Usuario());
            
            $comando_BuscaValidacaoUsuario->execute();
            
            $registro_usuario = $comando_BuscaValidacaoUsuario->fetch(PDO::FETCH_ASSOC);


            
            if (!empty($registro_usuario)) {
                $_SESSION["nome_usuario"] = $registro_usuario["nome_usuario"];
                $_SESSION["login_usuario"] = $registro_usuario["login_usuario"];
                return $registro_usuario;
            } else {
                $registro_usuario = array();
                return $registro_usuario;
            }
            
        } catch (PDOException $exception) {
            array_push($registro_usuario,$exception->getMessage());
            return $registro_usuario;
            
        } catch (Exception $excecao) {
            array_push($registro_usuario,$excecao->getMessage());
            return $registro_usuario;
        }
    }
}
?>