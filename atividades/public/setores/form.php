<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();
require_once BASE_PATH . 'public/setores/queries.php';
require_once BASE_PATH . 'src/protectCSRF.php';

if (isset($_REQUEST['id'])) :
    $action = 'update';
    $id = trim($_REQUEST['id']);

    $department = getDepartmentById($id);

    $sigla = $department['sigla'];
    $nome  = $department['nome'];

else :
    $action = 'insert';
    $id = null;
    $sigla = null;
    $nome  = null;
endif;

?>
        <div class="container">
            <h2>Cadastro de setores</h2><br />

            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <a href="<?= SITE_URL ?>setores/index.php"
                        class="btn btn-primary" title="Voltar">
                        <span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
                <?php if ($id) : ?>
                    <a href="#" id="<?= SITE_URL ?>setores/actions.php?action=delete&id=<?= $id ?>"
                        title="Excluir" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Excluir</a>
                <?php endif; ?>
                </div>
            </div><br /><br />

            <form class="form-horizontal" action="<?= SITE_URL ?>setores/actions.php" method="post">
                <input type="hidden" name="action" value="<?= $action ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="token" value="<?= tokenGenerate() ?>" />

                <div class="form-group">
                    <div class="row">
                        <label for="sigla" class="col-md-1">Sigla:</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control" name="sigla" id="sigla" maxlength="8" value="<?= $sigla ?>" required>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="nome" class="col-md-1">Nome:</label>

                        <div class="col-md-4">
                            <input type="nome" class="form-control" name="nome" id="nome" placeholder="Nome do stor" maxlength="200" value="<?= $nome ?>" required><br />
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group text-center">
                    <br />
                    <button type="submit" class="btn btn-info">Gravar <span class="glyphicon glyphicon-ok"></span></button>&nbsp;&nbsp;&nbsp;
                    <button type="reset" name="reset" class="btn btn-warning">Limpar <span class="glyphicon glyphicon-erase"></span></button>
                </div>
            </form>
        </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
showFooter(['confirmDelete']);
