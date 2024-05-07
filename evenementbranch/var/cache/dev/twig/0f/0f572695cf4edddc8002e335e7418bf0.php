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

/* front/pages/Evenement/form.html.twig */
class __TwigTemplate_cccc0585b9a38d6f0f985039d7200c7f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "front.base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/pages/Evenement/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/pages/Evenement/form.html.twig"));

        $this->parent = $this->loadTemplate("front.base.html.twig", "front/pages/Evenement/form.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "
    <body>
        <!-- Nav Bar Start -->
        <div class=\"navbar navbar-expand-lg bg-light navbar-light\">
            <div class=\"container-fluid\">
                <a href=\"index.html\" class=\"navbar-brand\">Burger <span>King</span></a>
                <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>

                <div class=\"collapse navbar-collapse justify-content-between\" id=\"navbarCollapse\">
                    <div class=\"navbar-nav ml-auto\">
                        <a href=\"index.html\" class=\"nav-item nav-link active\">Home</a>
                        <a href=\"about.html\" class=\"nav-item nav-link\">About</a>
                        <a href=\"feature.html\" class=\"nav-item nav-link\">Feature</a>
                        <a href=\"team.html\" class=\"nav-item nav-link\">Chef</a>
                        <a href=\"menu.html\" class=\"nav-item nav-link\">Menu</a>
                        <a href=\"booking.html\" class=\"nav-item nav-link\">Booking</a>
                        <div class=\"nav-item dropdown\">
                            <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Pages</a>
                            <div class=\"dropdown-menu\">
                                <a href=\"blog.html\" class=\"dropdown-item\">Blog Grid</a>
                                <a href=\"single.html\" class=\"dropdown-item\">Blog Detail</a>
                            </div>
                        </div>
                        <a href=\"contact.html\" class=\"nav-item nav-link\">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
<br/><br/><br/><br/>
        
        <!-- Contact Start -->
        <div class=\"contact\">
            <div class=\"container\">
                <div class=\"section-header text-center\">
                    <p>Evenement N° ";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["eventId"]) || array_key_exists("eventId", $context) ? $context["eventId"] : (function () { throw new RuntimeError('Variable "eventId" does not exist.', 41, $this->source); })()), "html", null, true);
        echo "</p>
                    <h2>Rate the event</h2>
                </div>
                <div class=\"row contact-form\">
                    <div class=\"col-md-12\">
                        ";
        // line 46
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        echo "
                        ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), 'widget');
        echo "
                        ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), 'errors');
        echo "
                        ";
        // line 49
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), 'form_end');
        echo "

                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class=\"footer\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-7\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <div class=\"footer-contact\">
                                    <h2>Our Address</h2>
                                    <p><i class=\"fa fa-map-marker-alt\"></i>123 Street, New York, USA</p>
                                    <p><i class=\"fa fa-phone-alt\"></i>+012 345 67890</p>
                                    <p><i class=\"fa fa-envelope\"></i>info@example.com</p>
                                    <div class=\"footer-social\">
                                        <a href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                        <a href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                        <a href=\"\"><i class=\"fab fa-youtube\"></i></a>
                                        <a href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                        <a href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-md-6\">
                                <div class=\"footer-link\">
                                    <h2>Quick Links</h2>
                                    <a href=\"\">Terms of use</a>
                                    <a href=\"\">Privacy policy</a>
                                    <a href=\"\">Cookies</a>
                                    <a href=\"\">Help</a>
                                    <a href=\"\">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-5\">
                        <div class=\"footer-newsletter\">
                            <h2>Newsletter</h2>
                            <p>
                                Lorem ipsum dolor sit amet elit. Quisque eu lectus a leo dictum nec non quam. Tortor eu placerat rhoncus, lorem quam iaculis felis, sed lacus neque id eros.
                            </p>
                            <div class=\"form\">
                                <input class=\"form-control\" placeholder=\"Email goes here\">
                                <button class=\"btn custom-btn\">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"copyright\">
                <div class=\"container\">
                    <p>Copyright &copy; <a href=\"#\">Your Site Name</a>, All Right Reserved.</p>
                    <p>Designed By <a href=\"https://htmlcodex.com\">HTML Codex</a></p>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href=\"#\" class=\"back-to-top\"><i class=\"fa fa-chevron-up\"></i></a>

    </body>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "front/pages/Evenement/form.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  127 => 49,  123 => 48,  119 => 47,  115 => 46,  107 => 41,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'front.base.html.twig' %}

{% block body %}

    <body>
        <!-- Nav Bar Start -->
        <div class=\"navbar navbar-expand-lg bg-light navbar-light\">
            <div class=\"container-fluid\">
                <a href=\"index.html\" class=\"navbar-brand\">Burger <span>King</span></a>
                <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>

                <div class=\"collapse navbar-collapse justify-content-between\" id=\"navbarCollapse\">
                    <div class=\"navbar-nav ml-auto\">
                        <a href=\"index.html\" class=\"nav-item nav-link active\">Home</a>
                        <a href=\"about.html\" class=\"nav-item nav-link\">About</a>
                        <a href=\"feature.html\" class=\"nav-item nav-link\">Feature</a>
                        <a href=\"team.html\" class=\"nav-item nav-link\">Chef</a>
                        <a href=\"menu.html\" class=\"nav-item nav-link\">Menu</a>
                        <a href=\"booking.html\" class=\"nav-item nav-link\">Booking</a>
                        <div class=\"nav-item dropdown\">
                            <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Pages</a>
                            <div class=\"dropdown-menu\">
                                <a href=\"blog.html\" class=\"dropdown-item\">Blog Grid</a>
                                <a href=\"single.html\" class=\"dropdown-item\">Blog Detail</a>
                            </div>
                        </div>
                        <a href=\"contact.html\" class=\"nav-item nav-link\">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
<br/><br/><br/><br/>
        
        <!-- Contact Start -->
        <div class=\"contact\">
            <div class=\"container\">
                <div class=\"section-header text-center\">
                    <p>Evenement N° {{ eventId }}</p>
                    <h2>Rate the event</h2>
                </div>
                <div class=\"row contact-form\">
                    <div class=\"col-md-12\">
                        {{ form_start(form, {'attr': {'novalidate': 'novalidate'}}) }}
                        {{ form_widget(form)}}
                        {{ form_errors(form)}}
                        {{ form_end(form) }}

                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class=\"footer\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-7\">
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <div class=\"footer-contact\">
                                    <h2>Our Address</h2>
                                    <p><i class=\"fa fa-map-marker-alt\"></i>123 Street, New York, USA</p>
                                    <p><i class=\"fa fa-phone-alt\"></i>+012 345 67890</p>
                                    <p><i class=\"fa fa-envelope\"></i>info@example.com</p>
                                    <div class=\"footer-social\">
                                        <a href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                        <a href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                        <a href=\"\"><i class=\"fab fa-youtube\"></i></a>
                                        <a href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                        <a href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-md-6\">
                                <div class=\"footer-link\">
                                    <h2>Quick Links</h2>
                                    <a href=\"\">Terms of use</a>
                                    <a href=\"\">Privacy policy</a>
                                    <a href=\"\">Cookies</a>
                                    <a href=\"\">Help</a>
                                    <a href=\"\">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-5\">
                        <div class=\"footer-newsletter\">
                            <h2>Newsletter</h2>
                            <p>
                                Lorem ipsum dolor sit amet elit. Quisque eu lectus a leo dictum nec non quam. Tortor eu placerat rhoncus, lorem quam iaculis felis, sed lacus neque id eros.
                            </p>
                            <div class=\"form\">
                                <input class=\"form-control\" placeholder=\"Email goes here\">
                                <button class=\"btn custom-btn\">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"copyright\">
                <div class=\"container\">
                    <p>Copyright &copy; <a href=\"#\">Your Site Name</a>, All Right Reserved.</p>
                    <p>Designed By <a href=\"https://htmlcodex.com\">HTML Codex</a></p>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href=\"#\" class=\"back-to-top\"><i class=\"fa fa-chevron-up\"></i></a>

    </body>
{% endblock %}
", "front/pages/Evenement/form.html.twig", "C:\\Users\\DELL\\Downloads\\sourour pi\\SymfonyPiDev\\templates\\front\\pages\\Evenement\\form.html.twig");
    }
}
