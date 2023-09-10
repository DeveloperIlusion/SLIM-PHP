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

/* Views/Admin/listaCategoria.twig */
class __TwigTemplate_d8c938d4de3224701fa5be9e929f9cdf extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 3
        return "/Layouts/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("/Layouts/layout.twig", "Views/Admin/listaCategoria.twig", 3);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "

<script type=\"text/javascript\" src=\"/Assets/DataTables/datatables.min.js\"></script>

<div class=\"container mt-5 mb-5\">
    <div class=\"justify-content-center mx-auto my-auto p-3\">
        ";
        // line 12
        echo ($context["insertButton"] ?? null);
        echo "
    </div>

    <table id=\"tblListaCategoria\" class=\"table table-dark table-striped table-hover table-borderless crudLogin-table mt-4 table-responsive\">
        <thead>
            <tr>
                <th class=\"col-2\">Título</th>
                <th class=\"col-5\">Descrição</th>
                <th class=\"col-1\">Status</th>
                <th class=\"col-4\">Controles</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["blog"]) {
            // line 26
            echo "                <tr>
                    <td class=\"col-2\">";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "Categoria", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                    <td class=\"col-5\">";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "Descricao", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                    <td class=\"col-1\">";
            // line 29
            if ((twig_get_attribute($this->env, $this->source, $context["blog"], "Status", [], "any", false, false, false, 29) == 1)) {
                echo "Ativo";
            } else {
                echo "Inativo";
            }
            echo "</td>
                    <td class=\"col-4\">
                        <a href=\"/visualize/";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "id", [], "any", false, false, false, 31), "html", null, true);
            echo "\" title=\"Visualização\" class=\"btn btn-outline-danger\"><i class=\"fa fa-eye\"></i></a>&nbsp;&nbsp;
                        <a href=\"/update/";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "id", [], "any", false, false, false, 32), "html", null, true);
            echo "\" title=\"Alteração\" class=\"btn btn-outline-danger\"><i class=\"fa fa-file\"></i></a>&nbsp;&nbsp;
                        <a href=\"/delete/";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "id", [], "any", false, false, false, 33), "html", null, true);
            echo "\" title=\"Exclusão\" class=\"btn btn-outline-danger\"><i class=\"fa fa-trash\"></i></a>&nbsp;&nbsp;
                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "        </tbody>
    </table>
</div>

";
    }

    public function getTemplateName()
    {
        return "Views/Admin/listaCategoria.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 37,  106 => 33,  102 => 32,  98 => 31,  89 => 29,  85 => 28,  81 => 27,  78 => 26,  74 => 25,  58 => 12,  50 => 6,  46 => 5,  35 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "Views/Admin/listaCategoria.twig", "C:\\wamp64\\www\\slim-php\\templates\\Croche\\Views\\Admin\\listaCategoria.twig");
    }
}
