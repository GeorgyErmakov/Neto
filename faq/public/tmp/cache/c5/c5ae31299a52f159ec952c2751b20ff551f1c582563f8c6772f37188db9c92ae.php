<?php

/* template.html */
class __TwigTemplate_4b1c64c4eac97f1ce73994c17017b89e06bd40f1fa9e53e19d3d8c74c8f0b71e extends Twig_Template
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
        echo "<html>
  <head>
    <meta charset=\"UTF-8\">
    <style>
      table { 
        border-spacing: 0;
        border-collapse: collapse;
      }
      table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
      }
      table th {
        background: #eee;
      }
    </style>
  </head>

  <body>
    <form method=\"POST\">
      <input type=\"text\" name=\"question\" placeholder=\"Вопрос\" value=\"\"/>
      <input type=\"text\" name=\"authname\" placeholder=\"Автор\" value=\"\"/>
      <input type=\"text\" name=\"email\" placeholder=\"email\" value=\"\"/>
      <input type=\"submit\" value=\"Задать вопрос\" />
    </form>

    <h2>Все темы</h2>
<ul>
  </ul>
  <div>
  ";
        // line 31
        $this->displayBlock('main', $context, $blocks);
        // line 41
        echo "    
<div>
    ";
        // line 43
        $this->displayBlock('test_widget', $context, $blocks);
        // line 53
        echo "</div>
  </body>
</html>";
    }

    // line 31
    public function block_main($context, array $blocks = array())
    {
        // line 32
        echo "    <table>
      <tr>
        <th>Rкатегории</th>
      </tr>
      ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subjects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 37
            echo "         <tr><td><a href=\"?id=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["line"], "name", array()), "html", null, true);
            echo "</a></td></tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "    </table></div>
    ";
    }

    // line 43
    public function block_test_widget($context, array $blocks = array())
    {
        // line 44
        echo "
     <table>
      <tr>
        <th>Вопросы</th>
            ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["quanda"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["q"]) {
            // line 49
            echo "         <tr><td>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["q"], "question", array()), "html", null, true);
            echo "</a></td></tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['q'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "       </table>
";
    }

    public function getTemplateName()
    {
        return "template.html";
    }

    public function getDebugInfo()
    {
        return array (  118 => 51,  109 => 49,  105 => 48,  99 => 44,  96 => 43,  91 => 39,  80 => 37,  76 => 36,  70 => 32,  67 => 31,  61 => 53,  59 => 43,  55 => 41,  53 => 31,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "template.html", "C:\\nginx\\html\\faq\\public\\templates\\template.html");
    }
}
