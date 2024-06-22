<?php
require("../modelo/Produto.php");
class ProdutoControladora{
    private $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function CadastroProduto($recebeNomeProduto,$recebeValorProduto)
    {
        $this->produto->setNome_Produto($recebeNomeProduto);
        $this->produto->setValor_Produto($recebeValorProduto);

        $resultadoCadastroProduto = $this->produto->CadastroProduto();

        return $resultadoCadastroProduto;
    }

    public function ConsultaProduto()
    {
        $resultadoConsultaProdutos = $this->produto->VisualizarProduto();

        return $resultadoConsultaProdutos;
    }

    public function ExcluirProdutoEspecifico($recebeCodigoProduto)
    {
        $this->produto->setCodigo_Produto($recebeCodigoProduto);

        $resultadoExcluirProduto = $this->produto->ExcluirProduto();

        return $resultadoExcluirProduto;
    }

    public function ConsultaProdutoEspecifico($recebeCodigoProduto)
    {
        $this->produto->setCodigo_Produto($recebeCodigoProduto);

        $resultadoConsultaProdutoEspecifico = $this->produto->VisualizarProdutoEspecifico();

        return $resultadoConsultaProdutoEspecifico;
    }

    public function AlterarProdutoEspecifico($recebeCodigoProdutoAlterar,$recebeNomeProdutoAlterar,$recebeValorProdutoAlterar)
    {
        $this->produto->setCodigo_Produto($recebeCodigoProdutoAlterar);
        $this->produto->setNome_Produto($recebeNomeProdutoAlterar);
        $this->produto->setValor_Produto($recebeValorProdutoAlterar);

        $resultadoAlterarProduto = $this->produto->AlterarProduto();

        return $resultadoAlterarProduto;
    }
}
?>