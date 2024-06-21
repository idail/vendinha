<?php
interface ProdutoInterface{
    public function CadastroProduto():int;
    public function AlterarProduto():bool;
    public function ExcluirProduto():bool;
    public function VisualizarProduto():array;
}
?>