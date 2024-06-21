<?php
require("../controladora/ProdutoControladora.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");

$produtoControladora = new ProdutoControladora();

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $recebeProcessoProduto = $_POST["processo_produto"];

    if($recebeProcessoProduto === "recebe_cadastro_produto")
    {
        $recebeNomeProduto = $_POST["nome-produto"];
        $recebeValorProduto = $_POST["valor_produto_numerico"];
        
        if(!empty($recebeNomeProduto) && !empty($recebeValorProduto))
        {
            $resultadoCadastroProduto = $produtoControladora->CadastroProduto($recebeNomeProduto,$recebeValorProduto);
            echo json_encode($resultadoCadastroProduto);
        }else{
            echo json_encode("Favor preencher os campos");
        }
    }
}else if($_SERVER["REQUEST_METHOD"] === "GET")
{
    $recebeProcessoProduto = $_GET["processo_produto"];

    if($recebeProcessoProduto === "recebe_consultar_produtos")
    {
        $recebeConsultaProduto = $produtoControladora->ConsultaProduto();

        echo json_encode($recebeConsultaProduto);
    }else if($recebeProcessoProduto === "recebe_consultar_produto_especifico")
    {
        $recebeCodigoProdutoAlteracao = $_GET["valor_codigo_produto_especifico_alteracao"];

        $recebeConsultaProdutoEspecifico = $produtoControladora->ConsultaProdutoEspecifico($recebeCodigoProdutoAlteracao);

        echo json_encode($recebeConsultaProdutoEspecifico);
    }
}else if($_SERVER["REQUEST_METHOD"] === "DELETE")
{
    $recebeProcessoProduto = json_decode(file_get_contents("php://input",true));

    if($recebeProcessoProduto->processo_produto === "recebe_exclui_produto")
    {
        $resultadoExcluirProduto = $produtoControladora->ExcluirProdutoEspecifico($recebeProcessoProduto->valor_codigo_produto_exclui);
        
        echo json_encode($resultadoExcluirProduto);
    }
}
?>