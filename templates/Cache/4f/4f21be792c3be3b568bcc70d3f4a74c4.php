<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /Layouts/layout.twig */
class __TwigTemplate_e14d5c35b1777d014b4819138b0282cf extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>Crochê</title>
    <link rel=\"icon\" href=\"/Assets/images/croche-tab-icon.png\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css\" integrity=\"sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"/Assets/DataTables/datatables.min.css\"/>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
    <link rel=\"stylesheet\" href=\"/Assets/css/style.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css\" integrity=\"sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=\" crossorigin=\"anonymous\" />

    <script src=\"/Assets/js/jquery-3.3.1.js\"></script>
    <script src=\"/Assets/bootstrap/js/bootstrap.min.js\"></script>
</head>
<body>
    <header class=\"header_area\">
        <div class=\"main_menu\">
            <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
                <div class=\"container box_1620\">
                    <a class=\"navbar-brand logo_h\" href=\"/\">
                        <img src=\"../Uploads/logo_crochê2.png\" class=\"img-fluid\" id=\"logo_navbar\" type=\"image/png\">
                    </a>
                    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                    <div class=\"collapse navbar-collapse offset\" id=\"navbarSupportedContent\">
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        ";
        // line 41
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "    </main>
    <footer class=\"footer-area\">
        <div class=\"mt-0 mb-0\">
            <a href=\"/\">
            <img src=\"../Uploads/logo_crochê2-branca.png\" class=\"img-fluid\" id=\"footer-logo\" type=\"image/png\">
            </a>
        </div>
        <div>
            <h3 class=\"footer-title\">Cheque nossas redes sociais!</h3>
            <a href=\"#\" class=\"fa fa-youtube-play footer-icons\"></a>
            <a href=\"#\" class=\"fa fa-facebook footer-icons\"></a>
            <a href=\"#\" class=\"fa fa-instagram footer-icons\"></a>
            <p id=\"direitos\" class=\"footer-text\">
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script>
                <br>
                Todos os direitos reservados para
                <a href=\"\" target=\"_blank\">Crochê</a>
            </p>
        </div>
    </footer>
    <script src=\"https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js\" integrity=\"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js\" integrity=\"sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js\" integrity=\"sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=\" crossorigin=\"anonymous\"></script>
    <script type=\"text/javascript\" src=\"/Assets/datatables/datatables.min.js\"></script>
    <script>
        \$(document).ready( function() {
            \$(\"#tblListaCategoria\").DataTable( {
                language:   {
                                \"sEmptyTable\":      \"Nenhum registro encontrado\",
                                \"sInfo\":            \"Exibindo do _START_ ao _END_ | No total há _TOTAL_ registros\",
                                \"sInfoEmpty\":       \"Nenhum registro encontrado.\",
                                \"sInfoFiltered\":    \"(Filtrados de _MAX_ registros)\",
                                \"sInfoPostFix\":     \"\",
                                \"sInfoThousands\":   \".\",
                                \"sLengthMenu\":      \"_MENU_ resultados por página\",
                                \"sLoadingRecords\":  \"Carregando...\",
                                \"sProcessing\":      \"Processando...\",
                                \"sZeroRecords\":     \"Nenhum registro encontrado\",
                                \"sSearch\":          \"Pesquisar\",
                                \"oPaginate\": {
                                    \"sNext\":        \"Próximo\",
                                    \"sPrevious\":    \"Anterior\",
                                    \"sFirst\":       \"Primeiro\",
                                    \"sLast\":        \"Último\"
                                },
                                \"oAria\": {
                                    \"sSortAscending\":   \": Ordenar colunas de forma ascendente\",
                                    \"sSortDescending\":  \": Ordenar colunas de forma descendente\"
                                }
                            }
            });
        } );
    </script>
</body>
</html>";
    }

    // line 41
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "/Layouts/layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  142 => 41,  81 => 42,  78 => 41,  38 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "/Layouts/layout.twig", "C:\\wamp64\\www\\slim-php\\templates\\Croche\\Layouts\\layout.twig");
    }
}
