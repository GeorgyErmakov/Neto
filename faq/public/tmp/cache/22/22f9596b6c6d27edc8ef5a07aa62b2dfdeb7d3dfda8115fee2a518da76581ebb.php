<?php

/* admin.html */
class __TwigTemplate_62f1f36f9466e639c2f02ee89a54eb2b3ce361a127522277fada27397682b435 extends Twig_Template
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
\t\t
    
    ";
        // line 20
        ob_start();
        // line 21
        echo "    <label for=\"subj\">Тема</label>
    <select id=\"subj\" name=\"subjects_assign\">
    ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 24
            echo "    <option value=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo "</option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "    </select>
    ";
        $context["foo"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 28
        echo "
    ";
        // line 29
        ob_start();
        // line 30
        echo "    <label for=\"authors\">Автор</label>
    <select id=\"authors\" name=\"ath_assign\">
    ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["authors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 33
            echo "    <option value=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo "</option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "    </select>
    ";
        $context["authors"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 37
        echo "
<section class=\"cd-faq\">


\t";
        // line 41
        $this->displayBlock('main', $context, $blocks);
        // line 48
        echo "
\t<div class=\"cd-faq-items\">

    ";
        // line 51
        $this->displayBlock('test_widget', $context, $blocks);
        // line 75
        echo "


\t</div> <!-- cd-faq-items -->
\t<a href=\"#0\" class=\"cd-close-panel\">Close</a>
</section> <!-- cd-faq -->
<section class=\"cd-faq\">
<div class=\"cd-faq-items\">
<h2 class=\"cd-faq-group\">Редактирование тем</h2>
<table>
      <tr>
        <th>Тема</th>
        <th>Действие</th>
      </tr>
      ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 90
            echo "         <tr><form method=\"POST\"><td><input type=\"hidden\" name=\"desc_id\" value=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "id", array()), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo "</td>

         <td><input type=\"submit\" name=\"delete\" value=\"Удалить\" /></td></form></tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "      <tr><form method=\"POST\"><td><input type=\"text\" name=\"desc_id\" value=\"\"></td>
         <td><input type=\"submit\" name=\"add\" value=\"Добавить\" /></td></form></tr>
    </table>


</div>
</section>

<section class=\"cd-faq\">
<div class=\"cd-faq-items\">
<h2 class=\"cd-faq-group\">Редактирование администраторов</h2>
<table>
      <tr>
        <th>Логин</th>
        <th>Пароль</th>
        <th>Действие</th>
      </tr>
      ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 112
            echo "         <tr><form method=\"POST\"><td><input type=\"hidden\" name=\"desc_id\" value=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "id", array()), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo "</td>
         \t<td><input type=\"password\" name=\"pw\" placeholder=\"password\" value=\"\"/></td>
         \t  <td><input type=\"submit\" name=\"change\" value=\"Изменить\" /></td>
         <td><input type=\"submit\" name=\"delete\" value=\"Удалить\" /></td></form></tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        echo "      <tr><form method=\"POST\"><td><input type=\"text\" placeholder=\"login\" name=\"desc_id\" value=\"\"></td>
         <td><input type=\"password\" name=\"pw\" placeholder=\"password\" value=\"\"/></td><td><input type=\"submit\" name=\"add\" value=\"Добавить\" /></td></form></tr>
    </table>
</div>
</section>
<script src=\"js/jquery-2.1.1.js\"></script>
<script src=\"js/jquery.mobile.custom.min.js\"></script>
<script src=\"js/main.js\"></script> <!-- Resource jQuery -->
</body>
</html>";
    }

    // line 41
    public function block_main($context, array $blocks = array())
    {
        // line 42
        echo "\t<ul class=\"cd-faq-categories\">
\t\t    ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 44
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
        // line 46
        echo "\t</ul> <!-- cd-faq-categories -->
\t";
    }

    // line 51
    public function block_test_widget($context, array $blocks = array())
    {
        // line 52
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["quanda"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["q"]) {
            // line 53
            echo "            <ul id=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" class=\"cd-faq-group\">
            \t<li class=\"cd-faq-title\"><h2>";
            // line 54
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</h2></li>
            ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["q"]);
            foreach ($context['_seq'] as $context["_key"] => $context["qu"]) {
                // line 56
                echo "\t\t\t<form action=\"\" method=\"POST\">
\t\t\t<li>
\t\t\t\t<a class=\"cd-faq-trigger\" href=\"#";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["q"], "subject", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["qu"], "question", array()), "html", null, true);
                echo "</a>
\t\t\t\t<div class=\"cd-faq-content\">
\t\t\t\t\t<p><textarea rows=\"10\" cols=\"45\" name=\"text\" >";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($context["qu"], "answer", array()), "html", null, true);
                echo "</textarea></p>
\t\t\t\t\t<p><input type=\"checkbox\" id=\"pub\" name=\"pub\" value=\"Published\">
\t\t\t\t\t<label for=\"pub\">Опубликовать на сайте</label></p>
\t\t\t\t\t";
                // line 63
                echo twig_escape_filter($this->env, ($context["foo"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t";
                // line 64
                echo twig_escape_filter($this->env, ($context["authors"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t<p><input type=\"submit\" value=\"Изменить\"></p>
\t\t\t\t\t<p><input type=\"submit\" value=\"Удалить\"></p>
\t\t\t\t</div> <!-- cd-faq-content -->
\t\t\t</li>
\t\t</form>
\t\t\t ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "\t\t\t\t\t</ul> <!-- cd-faq-group -->
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['q'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "
";
    }

    public function getTemplateName()
    {
        return "admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  281 => 73,  274 => 71,  261 => 64,  257 => 63,  251 => 60,  244 => 58,  240 => 56,  236 => 55,  232 => 54,  227 => 53,  222 => 52,  219 => 51,  214 => 46,  203 => 44,  199 => 43,  196 => 42,  193 => 41,  180 => 117,  166 => 112,  162 => 111,  143 => 94,  130 => 90,  126 => 89,  110 => 75,  108 => 51,  103 => 48,  101 => 41,  95 => 37,  91 => 35,  80 => 33,  76 => 32,  72 => 30,  70 => 29,  67 => 28,  63 => 26,  52 => 24,  48 => 23,  44 => 21,  42 => 20,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin.html", "C:\\nginx\\html\\faq\\public\\templates\\admin.html");
    }
}
