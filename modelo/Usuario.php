<?php
require("Conexao.php");
require("UsuarioInterface.php");

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
            //e declarada a variavel $sql_ValidaUsuario que recebera o sql para busca de usuario no banco de dados
            $sql_ValidaUsuario = "select * from usuario where login_usuario = :login_recebido and senha_usuario = :senha_recebida";
            //e declarada a variavel $comando_BuscaValidacaoUsuario que ira receber a consulta a ser realizada
            $comando_BuscaValidacaoUsuario = Conexao::Obtem()->prepare($sql_ValidaUsuario);
            //e atribuido aos parametros :login_recebido e :senha_recebida os valores setados na classe usuariocontroladora
            $comando_BuscaValidacaoUsuario->bindValue(":login_recebido", $this->getLogin_Usuario());
            $comando_BuscaValidacaoUsuario->bindValue(":senha_recebida", $this->getSenha_Usuario());
            //e feita a execução
            $comando_BuscaValidacaoUsuario->execute();
            //e declarada a variavel $registro_UsuarioRetornado e atribuido a ele um array associativo com as informações do usuario localizado
            $registro_usuario = $comando_BuscaValidacaoUsuario->fetch(PDO::FETCH_ASSOC);


            //ira verificar se a variavel $usuario_retornado nao e vazia e caso nao seja ira retornar "verdeiro" caso contrato retornara "falso"
            if (!empty($registro_usuario)) {
                //$this->setNome_Usuario_Logado_PDF($registro_autenticado["nome_usuario"]);
                //cria uma sessao chamado nome_usuario e recebe do banco de dados o nome da pessoa localizada que sera exibido na pagina
                $_SESSION["nome_usuario"] = $registro_usuario["nome_usuario"];
                $_SESSION["login_usuario"] = $registro_usuario["login_usuario"];
                return $registro_usuario;
            } else {
                $registro_usuario = array();
                return $registro_usuario;
            }
            //caso ocorra algum erro na execução do try sobre o pdo será retornado a mensagem de erro
        } catch (PDOException $exception) {
            array_push($registro_usuario,$exception->getMessage());
            return $registro_usuario;
            //caso ocorre algum erro na execução do try de exceção será retornado a mensagem de erro
        } catch (Exception $excecao) {
            array_push($registro_usuario,$excecao->getMessage());
            return $registro_usuario;
        }
    }
}
?>