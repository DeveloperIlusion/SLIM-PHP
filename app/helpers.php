<?php

function base_url(string $path = "") {
    $root = __DIR__ . "/.." . $path;

    return $root;
}

function theme_url(string $path = "") {
    $destiny =  base_url() . "/templates" . $path;

    return $destiny;
}

function theme_croche_assets(string $path = "") {
    $destiny =  base_url() . "/templates/Croche/Assets" . $path;

    return $destiny;
}
function botao($tipo, $id = null)
{
    $service = new Service();

    $html = "";
    $url = base_url() . $service->getController();

    if ($tipo == 'insert') {
        $html = '
                <p>
                    <a href="' . $url . '/form/insert/0" title="Inclusão" class="btn btn-outline-danger mb-5"><i class="fa fa-plus" area-hidden="true"></i></a>
                </p>';
    } elseif ($tipo == 'update') {
        $html = '<a href="' . $url . '/form/update/' . $id . '" title="Alteração" class="btn btn-outline-danger"><i class="fa fa-file" area-hidden="true"></i></a>&nbsp;&nbsp;';
    } elseif ($tipo == 'delete') {
        $html = '<a href="' . $url . '/form/delete/' . $id . '" title="Exclusão" class="btn btn-outline-danger"><i class="fa fa-trash" area-hidden="true"></i></a>&nbsp;&nbsp;';
    } elseif ($tipo == 'view') {
        $html = '<a href="' . $url . '/form/view/' . $id . '" title="Visualização" class="btn btn-outline-danger"><i class="fa fa-eye" area-hidden="true"></i></a>&nbsp;&nbsp;';
    } elseif ($tipo == 'voltar') {
        $html = '<a href="' . $url . '" class="btn btn-outline-secondary" title="Voltar">Voltar</a>';
    }

    return $html;
}