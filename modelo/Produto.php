<?php
require("Conexao.php");
require("ProdutoInterface.php");

class Produto implements ProdutoInterface{
    private $codigo_produto;
    private $nome_produto;
    private $valor_produto;

    public function setCodigo_Produto($codigo_produto)
    {
        $this->codigo_produto = $codigo_produto;
    }

    public function getCodigo_Produto()
    {
        return $this->codigo_produto;
    }

    public function setNome_Produto($nome_produto)
    {
        $this->nome_produto = $nome_produto;
    }

    public function getNome_Produto()
    {
        return $this->nome_produto;
    }

    public function setValor_Produto($valor_produto)
    {
        $this->valor_produto = $valor_produto;
    }

    public function getValor_Produto()
    {
        return $this->valor_produto;
    }

    public function CadastroProduto(): int
    {
        try {
            if (!empty($this->getNome_Produto())) {
                $instrucaoCadastroProduto = "insert into produto(nome_produto,valor_produto)values(:recebe_nome_produto,:recebe_valor_produto)";
                $comandoCadastroProduto = Conexao::Obtem()->prepare($instrucaoCadastroProduto);
                $comandoCadastroProduto->bindValue(":recebe_nome_produto", $this->getNome_Produto());
                $comandoCadastroProduto->bindValue(":recebe_valor_produto",$this->getValor_Produto());
                $resultadoCadastroProduto = $comandoCadastroProduto->execute();

                $ultimoCodigoGeradoCadastroProduto = Conexao::Obtem()->lastInsertId();

                return $ultimoCodigoGeradoCadastroProduto;
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        } catch (Exception $excecao) {
            return $excecao->getMessage();
        }
    }

    public function AlterarProduto(): bool
    {
        return true;
    }

    public function ExcluirProduto(): bool
    {
        try{
            if(!empty($this->getCodigo_Produto()))
            {
                $instrucaoExcluirProdutoEspecifico = "delete from produto where codigo_produto = :recebe_codigo_produto_exclusao";
                $comandoExcluirProdutoEspecifico = Conexao::Obtem()->prepare($instrucaoExcluirProdutoEspecifico);
                $comandoExcluirProdutoEspecifico->bindValue(":recebe_codigo_produto_exclusao",$this->getCodigo_Produto());
                $resultadoExcluirProdutoEspecifico = $comandoExcluirProdutoEspecifico->execute();

                return $resultadoExcluirProdutoEspecifico;
            }
        }catch (PDOException $exception) {
            $recebe_erro =  $exception->getMessage();
            return $recebe_erro;
        } catch (Exception $excecao) {
            $recebe_erro =  $excecao->getMessage();
            return $recebe_erro;
        }
    }

    public function VisualizarProduto(): array
    {
        $registros_produtos = array();
        try {
            
            $instrucaoVisualizarProdutos = "select * from produto";
            $comandoConsultaProdutos = Conexao::Obtem()->prepare($instrucaoVisualizarProdutos);
            $comandoConsultaProdutos->execute();
            $registros_produtos = $comandoConsultaProdutos->fetchAll(PDO::FETCH_ASSOC);          

            if(!empty($registros_produtos))
                return $registros_produtos;
            else
                return $registros_produtos;
        } catch (PDOException $exception) {
            array_push($registros_produtos, $exception->getMessage());
            return $registros_produtos;
        } catch (Exception $excecao) {
            array_push($registros_produtos, $excecao->getMessage());
            return $registros_produtos;
        }
    }

    public function VisualizarProdutoEspecifico():array
    {
        $registro_produto_especifico = array();

        try{
            if(!empty($this->getCodigo_Produto()))
            {
                $instrucaoConsultaProdutoEspecifico = "select * from produto as p where p.codigo_produto = :recebe_codigo_produto_especifico";
                $comandoConsultaProdutoEspecifico = Conexao::Obtem()->prepare($instrucaoConsultaProdutoEspecifico);
                $comandoConsultaProdutoEspecifico->bindValue(":recebe_codigo_produto_especifico",$this->getCodigo_Produto());
                $comandoConsultaProdutoEspecifico->execute();
                $registro_produto_especifico = $comandoConsultaProdutoEspecifico->fetchAll(PDO::FETCH_ASSOC);

                if(!empty($registro_produto_especifico))
                    return $registro_produto_especifico;
                else
                    return $registro_produto_especifico;
            }
        }catch (PDOException $exception) {
            array_push($registro_produto_especifico, $exception->getMessage());
            return $registro_produto_especifico;
        } catch (Exception $excecao) {
            array_push($registro_produto_especifico, $excecao->getMessage());
            return $registro_produto_especifico;
        }
    }
}
?>