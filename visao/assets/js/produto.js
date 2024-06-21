$(document).ready(function (e) {
    $("#recebe-mensagem-cadastro-realizado-produto").hide();
    $("#recebe-mensagem-campo-vazio-cadastro-produto").hide();
    $("#recebe-mensagem-campo-falha-cadastro-produto").hide();
    $("#recebe-mensagem-campo-falha-buscar-produto").hide();
    $("#recebe-mensagem-exclusao-realizado-produto").hide();
    $("#recebe-mensagem-campo-falha-exclusao-produto").hide();
    $("#recebe-mensagem-alterar-realizado-produto").hide();
    $("#recebe-mensagem-campo-vazio-alterar-produto").hide();
    $("#recebe-mensagem-campo-falha-alterar-produto").hide();

    let recebeUrlAtualProdutos = window.location.href;

    if (recebeUrlAtualProdutos === "http://localhost/vendinha/visao/index.php?pagina=consulta_produto") {
        listarProdutos();
    }
});

function listarProdutos() {
    $.ajax({
        url: "../api/ProdutoAPI.php",
        dataType: "json",
        type: "get",
        data: {
            processo_produto: "recebe_consultar_produtos",
        },
        beforeSend: function () {
            debugger;
            $("#registros-produtos").html("");
            $("#registros-produtos").append(
                "<td colspan='5' class='text-center'>Carregando dados</td>"
            );
            $("#registros-produtos").html("");
        },
        success: function (retorno_produtos) {
            debugger;
            if (retorno_produtos.length > 0) {
                let recebe_tabela_produtos = document.querySelector(
                    "#registros-produtos"
                );

                let recebe_quantidade_produtos = retorno_produtos.length;

                $("#exibi-quantidade-produtos").html(
                    "Quantidade de produtos:" + recebe_quantidade_produtos
                );

                for (let produtos = 0; produtos < retorno_produtos.length; produtos++) {

                    let recebeValorProdutoBR = retorno_produtos[produtos].valor_produto.toString();

                    let recebeValorProdutoBRFinal = "R$" + recebeValorProdutoBR.replace(".", ",");

                    recebe_tabela_produtos.innerHTML +=
                        "<tr>" +
                        "<td>" +
                        retorno_produtos[produtos].nome_produto +
                        "</td>" +
                        "<td>" +
                        recebeValorProdutoBRFinal +
                        "</td>" +
                        "<td><a href='#'><i class='bi bi-card-list fs-4' title='Alterar Produto' data-bs-toggle='modal' data-bs-target='#alteracao-produto' data-backdrop='static' onclick='carrega_dados_produto_alteracao(" +
                        retorno_produtos[produtos].codigo_produto +
                        ",event)'></i></a></td>" +
                        "<td><a href='#'><i class='bi bi-trash-fill fs-4' title='Excluir Produto' onclick=excluiProdutoEspecifico(" +
                        retorno_produtos[produtos].codigo_produto +
                        ",event)></i></a></td>" +
                        "</tr>";
                }
                $("#registros-produtos").append(recebe_tabela_produtos);
            } else {
                $("#exibi-quantidade-produtos").html("Quantidade de produtos:" + 0);
                $("#registros-produtos").append(
                    "<td colspan='5' class='text-center'>Nenhum registro localizado</td>"
                );
            }
        },
        error: function (xhr, status, error) {
            $("#recebe-mensagem-campo-falha-buscar-produto").html("Falha ao buscar produtos:" + error);
            $("#recebe-mensagem-campo-falha-buscar-produto").show();
            $("#recebe-mensagem-campo-falha-buscar-produto").fadeOut(4000);
        },
    });
}

$(document).on("focus", "#valor-produto", function (e) {
    e.preventDefault();

    debugger;

    $(this).maskMoney({
        prefix: "R$",
        thousands: ".",
        decimal: ",",
    });
});

$(document).on("focus", "#valor-produto-alterar", function (e) {
    e.preventDefault();

    debugger;

    $(this).maskMoney({
        prefix: "R$",
        thousands: ".",
        decimal: ",",
    });
});

$("#cadastra-produto").click(function (e) {
    e.preventDefault();

    debugger;

    let recebeNomeProduto = $("#nome-produto").val();
    let recebeValorProduto = $("#valor-produto").val();

    if (recebeNomeProduto != "" && recebeValorProduto != "") {

        let recebeVProdutoCortado = recebeValorProduto.split("R$");

        let recebeVProdutoNumerico = recebeVProdutoCortado[1];

        let recebeVProdutoFinalNumerico = recebeVProdutoNumerico.replace(/,/g, '.');

        // Substituir o último ponto por um caractere temporário
        let temporariostring = recebeVProdutoFinalNumerico.replace(/\.(?=[^.]*$)/, 'TEMP');

        // Remover todos os outros pontos
        temporariostring = temporariostring.replace(/\./g, '');

        // Substituir o caractere temporário pelo ponto decimal
        let decimalstring = temporariostring.replace('TEMP', '.');

        // Converter para número decimal
        let valor_produto_numerico = parseFloat(decimalstring);

        let formulario_cadastro_produto = $("#formulario-cadastra-produto")[0];

        let dados_cadastro_produto = new FormData(formulario_cadastro_produto);

        dados_cadastro_produto.append("valor_produto_numerico", valor_produto_numerico);
        dados_cadastro_produto.append("processo_produto", "recebe_cadastro_produto");

        $.ajax({
            type: "post",
            dataType: "json",
            url: "../api/ProdutoAPI.php",
            cache: false,
            processData: false,
            contentType: false,
            data: dados_cadastro_produto,

            success: function (resultado) {
                debugger;
                if (resultado > 0) {
                    $("#recebe-mensagem-cadastro-realizado-produto").html(
                        "Produto cadastrado com sucesso"
                    );
                    $("#recebe-mensagem-cadastro-realizado-produto").show();
                    $(
                        "#recebe-mensagem-cadastro-realizado-produto"
                    ).fadeOut(4000);
                } else {
                    $("#recebe-mensagem-campo-falha-cadastro-produto").html("Falha ao cadastrar produto:" + resultado);
                    $("#recebe-mensagem-campo-falha-cadastro-produto").show();
                    $("#recebe-mensagem-campo-falha-cadastro-produto").fadeOut(4000);
                }
            },
            error: function (xhr, status, error) {
                $("#recebe-mensagem-campo-falha-cadastro-produto").html("Falha ao cadastrar produto:" + error);
                $("#recebe-mensagem-campo-falha-cadastro-produto").show();
                $("#recebe-mensagem-campo-falha-cadastro-produto").fadeOut(4000);
            },
        }
        );
    } else if (recebeNomeProduto === "") {
        $("#recebe-mensagem-campo-vazio-cadastro-produto").html(
            "Favor informar o nome do produto"
        );
        $("#recebe-mensagem-campo-vazio-cadastro-produto").show();
        $("#recebe-mensagem-campo-vazio-cadastro-produto").fadeOut(4000);
    } else if (recebeValorProduto === "") {
        $("#recebe-mensagem-campo-vazio-cadastro-produto").html(
            "Favor informar o valor do produto"
        );
        $("#recebe-mensagem-campo-vazio-cadastro-produto").show();
        $("#recebe-mensagem-campo-vazio-cadastro-produto").fadeOut(4000);
    }
});

function carrega_dados_produto_alteracao(recebeCodigoProdutoAlteracao, e) {
    e.preventDefault();
  
    debugger;
  
    if (recebeCodigoProdutoAlteracao) {
  
      $.ajax({
        //url: "http://localhost/software-medicos/api/NotificacaoAPI.php",
        url: "../api/ProdutoAPI.php",
        dataType: "json",
        type: "get",
        data: {
          processo_produto: "recebe_consultar_produto_especifico",
          valor_codigo_produto_especifico_alteracao: recebeCodigoProdutoAlteracao,
        },
        success: function (retorno_produto) {
          debugger;
  
          if (retorno_produto.length > 0) {
            for (
              let dados_produto = 0;
              dados_produto < retorno_produto.length;
              dados_produto++
            ) {
  
              let recebeValorProdutoBR = retorno_produto[dados_produto].valor_produto.toString();
            
              let recebeValorProdutoBRFinal = "R$" + recebeValorProdutoBR.replace(".",",");
  
              $("#nome-produto-alterar").val(
                retorno_produto[dados_produto].nome_produto
              );
              
              $("#valor-produto-alterar").val(
                recebeValorProdutoBRFinal
              );
              
              $("#codigo-produto-alterar").val(
                retorno_produto[dados_produto].codigo_produto
              );
            }
          }
        },
        error: function (xhr, status, error) { },
      });
    }
  }

function excluiProdutoEspecifico(recebeCodigoProdutoEspecificoExcluir, e) {
    e.preventDefault();

    let recebeRespostaExcluirProdutoEspecifico = window.confirm(
        "Tem certeza que deseja excluir o produto?"
    );

    if (recebeRespostaExcluirProdutoEspecifico) {
        $.ajax({
            url: "../api/ProdutoAPI.php",
            type: "DELETE",
            dataType: "json",
            cache: false,
            data: JSON.stringify({
                processo_produto: "recebe_exclui_produto",
                valor_codigo_produto_exclui: recebeCodigoProdutoEspecificoExcluir,
            }),
            success: function (retorno) {
                debugger;

                if (retorno) {
                    $("#recebe-mensagem-exclusao-realizado-produto").html("Produto excluído com sucesso");
                    $("#recebe-mensagem-exclusao-realizado-produto").show();
                    $("#recebe-mensagem-exclusao-realizado-produto").fadeOut(4000);

                    listarProdutos();
                } else {
                    $("#recebe-mensagem-campo-falha-exclusao-produto").html(
                        "Falha ao excluir produto:" + retorno
                    );
                    $("#recebe-mensagem-campo-falha-exclusao-produto").show();
                    $("#recebe-mensagem-campo-falha-exclusao-produto").fadeOut(4000);
                }
            },
            error: function (xhr, status, error) {
                $("#recebe-mensagem-campo-falha-exclusao-produto").html(
                    "Falha ao excluir cliente:" + error
                );
                $("#recebe-mensagem-campo-falha-exclusao-produto").show();
                $("#recebe-mensagem-campo-falha-exclusao-produto").fadeOut(4000);
            },
        });
    } else {
        return;
    }
}