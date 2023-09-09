<script type="text/javascript" src="<?= base_url() ?>Assets/DataTables/datatables.min.js"></script>

<div class="container mt-5 mb-5">
    <table id="tblListaCategoria" class="table table-dark table-striped table-hover table-borderless crudLogin-table mt-4 table-responsive">
        <thead>
            <tr>
                <th class="col-2">Título</th>
                <th class="col-5">Descrição</th>
                <th class="col-1">Status</th>
                <th class="col-4">Controles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $blog): ?>
                <tr>
                    <td class="col-2"><?= $blog['Categoria'] ?></td>
                    <td class="col-5"><?= $blog['Descricao'] ?></td>
                    <td class="col-1"><?= $blog['Status'] == 1 ? "Ativo" : "Inativo" ?></td>
                    <td class="col-4">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>