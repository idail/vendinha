<style>
    .imagem {
        /* background-image: url("../usuario/imagem_perfil/usuario_sem_foto.jpg");
     background-repeat: no-repeat;
     
     background-size: 70px;
     
     background-position: center; */
    }

    #imagens-produtos-alterar {
        opacity: 0;
        margin: -10px;
    }

    .exibi_imagems_lado_lado{
        display: block;
    }

    .exibi_imagens_selecionadas_alterar{
        display: block ruby;
    }
</style>
<!-- Disabled Backdrop Modal -->
<div class="modal fade" id="alteracao-produto" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Alterar Produto</h5>
                        </div>

                        <form id="formulario-alterar-produto">

                            <div class="row mb-3">
                                <div class="col-sm-10 col-lg-12">
                                    <label for="inputText" class="col-sm-2 col-lg-12 col-form-label">Nome</label>
                                    <input type="text" class="form-control" name="nome-produto-alterar" placeholder="Informe o nome do produto" id="nome-produto-alterar">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-10 col-lg-12">
                                    <label for="inputPassword" class="col-sm-2 col-lg-12 col-form-label">Valor</label>
                                    <input type="text" class="form-control" name="valor-produto-alterar" placeholder="Informe o valor do produto" id="valor-produto-alterar">
                                </div>
                            </div>

                            <input type="hidden" name="codigo-produto-alterar" id="codigo-produto-alterar">



                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary" id="alterar-produto">Alterar</button>
                                    <button type="reset" class="btn btn-secondary">Limpar</button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" id="recebe-mensagem-alterar-realizado-produto" role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" id="recebe-mensagem-campo-vazio-alterar-produto" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" id="recebe-mensagem-campo-falha-alterar-produto" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" id="recebe-mensagem-campo-falha-carregar-dados-produto" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>