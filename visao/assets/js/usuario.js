$(document).ready(function (e) {
  $("#recebe-mensagem-campo-falha-autentica-usuario").hide();
  $("#recebe-mensagem-autenticacao-realizado-usuario").hide();
  $("#recebe-mensagem-campo-vazio-login").hide();
});

$("#autenticacao-usuario").click(function (e) {
    e.preventDefault();
  
    debugger;
  
    let recebeLoginUsuario = $("#login-usuario-autenticacao").val();
    let recebeSenhaUsuario = $("#senha-usuario-autenticacao").val();
  
    let recebeFormularioLogin = $("#formulario-autentica-usuario")[0];
  
    let dadosFormularioLogin = new FormData(recebeFormularioLogin);
  
    dadosFormularioLogin.append(
      "processo_usuario",
      "recebe_autenticacao_usuario"
    );
  
    if (recebeLoginUsuario != "" && recebeSenhaUsuario != "") {
      $.ajax({
        // url: "http://localhost/software-medicos/api/UsuarioAPI.php",
        url: "../../api/UsuarioAPI.php",
        type: "POST",
        dataType: "json",
        processData: false,
        contentType: false,
        data: dadosFormularioLogin,
        success: function (retorno) {
          debugger;
  
          if (retorno != "") {
            if (retorno === "Favor verificar os dados preenchidos") {
              $("#recebe-mensagem-campo-falha-autentica-usuario").html(retorno);
              $("#recebe-mensagem-campo-falha-autentica-usuario").show();
              $("#recebe-mensagem-campo-falha-autentica-usuario").fadeOut(4000);
            } else {
              $("#recebe-mensagem-autenticacao-realizado-usuario").html(
                "Bem-vindo ao sistema"
              );
              $("#recebe-mensagem-autenticacao-realizado-usuario").show();
              $("#recebe-mensagem-autenticacao-realizado-usuario").fadeOut(4000);
  
              setTimeout(() => {
                var url_inicio = "../../visao/index.php";
                $(window.document.location).attr("href", url_inicio);
              }, 2000);
            }
          } else {
            $("#recebe-mensagem-campo-falha-autentica-usuario").html(
              "Falha ao autenticar:" + retorno
            );
            $("#recebe-mensagem-campo-falha-autentica-usuario").show();
            $("#recebe-mensagem-campo-falha-autentica-usuario").fadeOut(4000);
          }
        },
        error: function (xhr, status, error) {
          $("#recebe-mensagem-campo-falha-autentica-usuario").html(
            "Falha ao autenticar:" + error
          );
          $("#recebe-mensagem-campo-falha-autentica-usuario").show();
          $("#recebe-mensagem-campo-falha-autentica-usuario").fadeOut(4000);
        },
      });
    } else if (recebeLoginUsuario === "") {
      $("#recebe-mensagem-campo-vazio-login").html(
        "Favor preencher o login do usuário"
      );
      $("#recebe-mensagem-campo-vazio-login").show();
      $("#recebe-mensagem-campo-vazio-login").fadeOut(4000);
    } else if (recebeSenhaUsuario === "") {
      $("#recebe-mensagem-campo-vazio-login").html(
        "Favor preencher a senha do usuário"
      );
      $("#recebe-mensagem-campo-vazio-login").show();
      $("#recebe-mensagem-campo-vazio-login").fadeOut(4000);
    }
  });