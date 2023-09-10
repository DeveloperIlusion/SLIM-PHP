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

/* Views/Admin/formCategoria.twig */
class __TwigTemplate_c26c1b66844c13468762755254e16f30 extends Template
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
        $this->parent = $this->loadTemplate("/Layouts/layout.twig", "Views/Admin/formCategoria.twig", 3);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
<div class=\"container mt-5 mb-5\">
    ";
        // line 8
        echo ($context["acaoView"] ?? null);
        echo "
    <form method=\"POST\" enctype=\"multipart/form-data\" action=";
        // line 9
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo ">
        <div class=\"row mx-auto my-auto text-left mt-5 justify-content-center\">
            <input type=\"hidden\" name=\"id\" id=\"id\" value=";
        // line 11
        echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["data"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["id"] ?? null) : null), "html", null, true);
        echo " >

            <div class=\"col-md-6\">
                <label for=\"Categoria\" class=\"form-label\">Categoria</label>
                <input 
                    type=\"text\" 
                    class=\"form-control\" 
                    id=\"Categoria\" 
                    name=\"Categoria\" 
                    aria-describedby=\"Categoria\"
                    maxlength=\"100\"
                    required
                    value=";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dataInDatabase"] ?? null), "Categoria", [], "any", false, false, false, 23), "html", null, true);
        echo "
                >
            </div>

            <div class=\"col-md-6\">
                <label for=\"Status\">Status</label>
                <select name=\"Status\" id=\"Status\" class=\"form-control\" required>
                    <option value=\"\"  ";
        // line 30
        echo (((twig_get_attribute($this->env, $this->source, ($context["dataInDatabase"] ?? null), "Status", [], "any", false, false, false, 30) == "")) ? ("SELECTED") : (""));
        echo ">...</option>
                    <option value=\"1\" ";
        // line 31
        echo (((twig_get_attribute($this->env, $this->source, ($context["dataInDatabase"] ?? null), "Status", [], "any", false, false, false, 31) == "1")) ? ("SELECTED") : (""));
        echo ">Ativo</option>
                    <option value=\"2\" ";
        // line 32
        echo (((twig_get_attribute($this->env, $this->source, ($context["dataInDatabase"] ?? null), "Status", [], "any", false, false, false, 32) == "2")) ? ("SELECTED") : (""));
        echo ">Inativo</option>
                </select>
            </div>

            <div class=\"col-md-12\">
                <label for=\"Descricao\" class=\"form-label\">Descrição</label>
                <textarea 
                    type=\"text\" 
                    class=\"form-control\" 
                    id=\"Descricao\" 
                    name=\"Descricao\" 
                    aria-describedby=\"Descricao\"
                    maxlength=\"300\"
                    required>";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dataInDatabase"] ?? null), "Descricao", [], "any", false, false, false, 45), "html", null, true);
        echo "</textarea>
            </div>
        </div>
        <div class=\"row my-auto mx-auto justify-content-center p-5\">
            ";
        // line 49
        echo ($context["returnButton"] ?? null);
        echo "
            ";
        // line 50
        if ((($context["acao"] ?? null) != "visualize")) {
            // line 51
            echo "                <button type=\"submit\" class=\"btn btn-outline-danger\">Gravar</button>
            ";
        }
        // line 53
        echo "        </div>
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "Views/Admin/formCategoria.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 53,  125 => 51,  123 => 50,  119 => 49,  112 => 45,  96 => 32,  92 => 31,  88 => 30,  78 => 23,  63 => 11,  58 => 9,  54 => 8,  50 => 6,  46 => 5,  35 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "Views/Admin/formCategoria.twig", "C:\\wamp64\\www\\slim-php\\templates\\Croche\\Views\\Admin\\formCategoria.twig");
    }
}
