<?php

/* index.html */
class __TwigTemplate_d8b8c77a67dcc96c930d6c876f1b05a4d5db07d946c86d72c77e18c192ba2370 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'main' => array($this, 'block_main'),
            'test_widget' => array($this, 'block_test_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\" class=\"no-js\">
<head>
\t<meta charset=\"UTF-8\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

\t<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

\t<link rel=\"stylesheet\" href=\"css/reset.css\"> <!-- CSS reset -->
\t<link rel=\"stylesheet\" href=\"css/style.css\"> <!-- Resource style -->
\t<script src=\"js/modernizr.js\"></script> <!-- Modernizr -->
\t<title>FAQ</title>
</head>
<body>
<header>
\t<h1>FAQ</h1>
</header>
\t
<section class=\"cd-faq\">
\t    <form method=\"POST\">
      <input type=\"textarea\" name=\"question\" placeholder=\"Вопрос\" value=\"\"/>
      <input type=\"text\" name=\"authname\" placeholder=\"Автор\" value=\"\"/>
      <input type=\"text\" name=\"email\" placeholder=\"email\" value=\"\"/>
      <input type=\"submit\" value=\"Задать вопрос\" />
    </form>
    </section> <!-- cd-faq -->

<section class=\"cd-faq\">
\t";
        // line 29
        $this->displayBlock('main', $context, $blocks);
        // line 35
        echo "\t</ul> <!-- cd-faq-categories -->

\t<div class=\"cd-faq-items\">

    ";
        // line 39
        $this->displayBlock('test_widget', $context, $blocks);
        // line 59
        echo "

\t</div> <!-- cd-faq-items -->
\t<a href=\"#0\" class=\"cd-close-panel\">Close</a>
</section> <!-- cd-faq -->
<script src=\"js/jquery-2.1.1.js\"></script>
<script src=\"js/jquery.mobile.custom.min.js\"></script>
<script src=\"js/main.js\"></script> <!-- Resource jQuery -->
</body>
</html>";
    }

    // line 29
    public function block_main($context, array $blocks = array())
    {
        // line 30
        echo "\t<ul class=\"cd-faq-categories\">
\t\t    ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 32
            echo "\t\t<li><a href=\"#";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo "</a></li>
\t\t      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "\t\t    ";
    }

    // line 39
    public function block_test_widget($context, array $blocks = array())
    {
        // line 40
        echo "
            ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["quanda"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["q"]) {
            // line 42
            echo "            <ul id=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" class=\"cd-faq-group\">
            \t<li class=\"cd-faq-title\"><h2>";
            // line 43
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</h2></li>
            ";
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["q"]);
            foreach ($context['_seq'] as $context["_key"] => $context["qu"]) {
                // line 45
                echo "
            \t\t
            \t\t\t
\t\t\t<li>
\t\t\t\t<a class=\"cd-faq-trigger\" href=\"#";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["q"], "subject", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["qu"], "question", array()), "html", null, true);
                echo "</a>
\t\t\t\t<div class=\"cd-faq-content\">
\t\t\t\t\t<p>";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["qu"], "answer", array()), "html", null, true);
                echo "</p>
\t\t\t\t</div> <!-- cd-faq-content -->
\t\t\t</li>
\t\t\t ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "\t\t\t\t\t</ul> <!-- cd-faq-group -->
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['q'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  152 => 57,  145 => 55,  135 => 51,  128 => 49,  122 => 45,  118 => 44,  114 => 43,  109 => 42,  105 => 41,  102 => 40,  99 => 39,  95 => 34,  84 => 32,  80 => 31,  77 => 30,  74 => 29,  61 => 59,  59 => 39,  53 => 35,  51 => 29,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html", "C:\\nginx\\html\\faq\\public\\templates\\index.html");
    }
}
