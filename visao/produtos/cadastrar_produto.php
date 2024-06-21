<style>
    #imagens-produtos {
        opacity: 0;
        margin: -10px;
    }
</style>
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produto</h5>

            <form id="formulario-cadastra-produto">


                <div class="row mb-3">
                    <div class="col-sm-10 col-lg-7">
                        <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                        <input type="text" class="form-control" name="nome-produto" placeholder="Informe o nome do produto" id="nome-produto">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 col-lg-7">
                        <label for="inputText" class="col-sm-2 col-form-label">Valor</label>
                        <input type="text" class="form-control" name="valor-produto" placeholder="Informe o valor do produto" id="valor-produto">
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-primary" id="cadastra-produto">Cadastrar</button>
                        <button type="reset" class="btn btn-secondary" id="limpar-campos-cadastra-produto">Limpar</button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" id="recebe-mensagem-cadastro-realizado-produto" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" id="recebe-mensagem-campo-vazio-cadastro-produto" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" id="recebe-mensagem-campo-falha-cadastro-produto" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>