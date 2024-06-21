<?php
require("Conexao.php");
require("ProdutoInterface.php");

class Produto implements ProdutoInterface{
    private $codigo_produto;
    private $nome_produto;

    public function CadastroProduto(): int
    {
        return 1;
    }

    public function AlterarProduto(): bool
    {
        return true;
    }

    public function ExcluirProduto(): bool
    {
        return true;
    }

    public function VisualizarProduto(): array
    {
        return [];
    }
}
?>