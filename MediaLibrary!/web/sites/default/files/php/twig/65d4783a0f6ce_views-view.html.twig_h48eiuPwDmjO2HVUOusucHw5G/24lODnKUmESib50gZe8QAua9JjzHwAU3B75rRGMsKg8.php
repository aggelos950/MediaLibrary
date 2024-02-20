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

/* themes/contrib/bootstrap_barrio/templates/views/views-view.html.twig */
class __TwigTemplate_83788a3906a928337270c0294889747b extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        $context["classes"] = [0 => "view", 1 => ("view-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 36
($context["id"] ?? null), 36, $this->source))), 2 => ("view-id-" . $this->sandbox->ensureToStringAllowed(        // line 37
($context["id"] ?? null), 37, $this->source)), 3 => ("view-display-id-" . $this->sandbox->ensureToStringAllowed(        // line 38
($context["display_id"] ?? null), 38, $this->source)), 4 => ((        // line 39
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . $this->sandbox->ensureToStringAllowed(($context["dom_id"] ?? null), 39, $this->source))) : (""))];
        // line 42
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 42), 42, $this->source), "html", null, true);
        echo ">
  ";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 43, $this->source), "html", null, true);
        echo "
  ";
        // line 44
        if (($context["title"] ?? null)) {
            // line 45
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 45, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 47
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 47, $this->source), "html", null, true);
        echo "
  ";
        // line 48
        if (($context["header"] ?? null)) {
            // line 49
            echo "    <div class=\"view-header\">
      ";
            // line 50
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null), 50, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 53
        echo "  ";
        if (($context["exposed"] ?? null)) {
            // line 54
            echo "    <div class=\"view-filters\">
      ";
            // line 55
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["exposed"] ?? null), 55, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 58
        echo "  ";
        if (($context["attachment_before"] ?? null)) {
            // line 59
            echo "    <div class=\"attachment attachment-before\">
      ";
            // line 60
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_before"] ?? null), 60, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 63
        echo "
  ";
        // line 64
        if (($context["rows"] ?? null)) {
            // line 65
            echo "    <div class=\"view-content row\">
      ";
            // line 66
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rows"] ?? null), 66, $this->source), "html", null, true);
            echo "
    </div>
  ";
        } else {
            // line 69
            echo "      <h2>Your favorite's page is empty</h2>
      <h3>Go to media's pages and add some!!!</h3>
      <img style=\"margin:20px 0px 0px 15px\" src=\"https://i0.wp.com/www.mixanitouxronou.gr/wp-content/uploads/2018/06/recess-620x420.jpg?fit=620%2C420&ssl=1\" alt=\"nonono\"  >
  ";
        }
        // line 73
        echo "
  ";
        // line 74
        if (($context["pager"] ?? null)) {
            // line 75
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pager"] ?? null), 75, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 77
        echo "  ";
        if (($context["attachment_after"] ?? null)) {
            // line 78
            echo "    <div class=\"attachment attachment-after\">
      ";
            // line 79
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_after"] ?? null), 79, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 82
        echo "  ";
        if (($context["more"] ?? null)) {
            // line 83
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more"] ?? null), 83, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 85
        echo "  ";
        if (($context["footer"] ?? null)) {
            // line 86
            echo "    <div class=\"view-footer\">
      ";
            // line 87
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null), 87, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 90
        echo "  ";
        if (($context["feed_icons"] ?? null)) {
            // line 91
            echo "    <div class=\"feed-icons\">
      ";
            // line 92
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_icons"] ?? null), 92, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 95
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/views/views-view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 95,  172 => 92,  169 => 91,  166 => 90,  160 => 87,  157 => 86,  154 => 85,  148 => 83,  145 => 82,  139 => 79,  136 => 78,  133 => 77,  127 => 75,  125 => 74,  122 => 73,  116 => 69,  110 => 66,  107 => 65,  105 => 64,  102 => 63,  96 => 60,  93 => 59,  90 => 58,  84 => 55,  81 => 54,  78 => 53,  72 => 50,  69 => 49,  67 => 48,  62 => 47,  56 => 45,  54 => 44,  50 => 43,  45 => 42,  43 => 39,  42 => 38,  41 => 37,  40 => 36,  39 => 34,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/bootstrap_barrio/templates/views/views-view.html.twig", "/var/www/html/web/themes/contrib/bootstrap_barrio/templates/views/views-view.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 34, "if" => 44);
        static $filters = array("clean_class" => 36, "escape" => 42);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
