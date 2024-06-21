<div class="col-lg-3 mb-4">
    <a href="index.php?pagina=cadastrar_produto" class="btn btn-primary">Cadastrar Produto</a>
</div>
<div class="card">
    <div class="card-body table-responsive">
        <h5 class="card-title">Produtos</h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col" colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody id="registros-produtos">
            </tbody>
        </table>
    </div>

    <div class="col-12">
        <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" id="recebe-mensagem-campo-falha-buscar-produto" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="col-12">
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" id="recebe-mensagem-exclusao-realizado-produto" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="col-12">
        <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" id="recebe-mensagem-campo-falha-exclusao-produto" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <span style="color: black;" id="exibi-quantidade-produtos"></span>
</div>