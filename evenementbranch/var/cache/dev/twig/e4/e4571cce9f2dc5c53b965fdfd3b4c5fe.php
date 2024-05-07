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

/* front/pages/Evenement/index.html.twig */
class __TwigTemplate_8a3e5f6bcf1f72ddd7ee7fc21d851cf9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/pages/Evenement/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/pages/Evenement/index.html.twig"));

        $this->parent = $this->loadTemplate("front.base.html.twig", "front/pages/Evenement/index.html.twig", 1);
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

<br><br><br><br>
        <!-- Blog Start -->
        <div class=\"blog\">
            <div class=\"container\">
                <div class=\"section-header text-center\">
                    <p>Evenement</p>
                    <h2>Latest Evenement</h2>
                </div>
                <form class=\"mb-4 px-4\" action=\"";
        // line 44
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_front_Evenement");
        echo "\" method=\"get\">
                    <div class=\"row\">
                    
                      <div class=\"col-lg-2\">
                          <label for=\"search_by\" class=\"form-label\">Search By:</label>
                          <select class=\"form-control\" id=\"search_by\" name=\"search_by\">
                              <option value=\"id\">N° Evenement</option>
                              <option value=\"idUser\">N° User</option>
                              <option value=\"date\">Date</option>
                              <option value=\"evenementType\">Evenement Type</option>
                              <option value=\"description\">Description</option>
                              <option value=\"location\">Location</option>
                              <option value=\"status\">Status</option>
                          </select>
                      </div>
                      <div class=\"mt-4 col-lg-10\">
                        <div class=\"mt-1 input-group\">
                        <input type=\"text\" class=\"form-control\" name=\"search\" placeholder=\"Search...\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 61, $this->source); })()), "request", [], "any", false, false, false, 61), "query", [], "any", false, false, false, 61), "get", ["search"], "method", false, false, false, 61), "html", null, true);
        echo "\">
                        <button type=\"submit\" class=\"btn btn-primary\">Search</button>
                        </div>
                      </div>
                      <div class=\"mt-2 col-lg-2\">
                          <label for=\"sort_by\" class=\"form-label\">Sort By:</label>
                          <select class=\"form-control\" id=\"sort_by\" name=\"sort_by\">
                              <option value=\"id\">N° Evenement</option>
                              <option value=\"idUser\">N° User</option>
                              <option value=\"date\">Date</option>
                              <option value=\"evenementType\">Evenement Type</option>
                              <option value=\"description\">Description</option>
                              <option value=\"location\">Location</option>
                              <option value=\"status\">Status</option>
                          </select>
                      </div>
                      <div class=\"mt-2 col-lg-2\">
                          <label for=\"sort_order\" class=\"form-label\">Sort Order:</label>
                          <select class=\"form-control\" id=\"sort_order\" name=\"sort_order\">
                              <option value=\"asc\">Ascending</option>
                              <option value=\"desc\">Descending</option>
                          </select>
                      </div>
                    </div>
            
                    <button type=\"submit\" class=\"btn btn-primary mt-2\">Sort</button>
                  </form>
                <div class=\"row\">
                ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 89, $this->source); })()));
        foreach ($context['_seq'] as $context["index"] => $context["item"]) {
            // line 90
            echo "                    <div class=\"col-md-6\">
                        <div class=\"blog-item\">
                            <div class=\"blog-img\">
                                <img src=\"https://img.freepik.com/free-vector/happy-tiny-business-people-dancing-having-fun-drinking-wine-corporate-party-team-building-activity-corporate-event-idea-concept-pinkish-coral-bluevector-isolated-illustration_335657-1414.jpg\" alt=\"Blog\">
                            </div>
                            <div class=\"blog-content\">
                                <h2 class=\"blog-title\">N° Evenement ";
            // line 96
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 96), "html", null, true);
            echo "</h2>
                                <div class=\"blog-meta\">
                                    <p><i class=\"far fa-list-alt\"></i>";
            // line 98
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "evenementType", [], "any", false, false, false, 98), "html", null, true);
            echo "</p>
                                    <p><i class=\"far fa-calendar-alt\"></i>";
            // line 99
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, false, 99), "m/d/y"), "html", null, true);
            echo "</p>
                                    <p><i class=\"fas fa-map-marker\"></i>";
            // line 100
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "location", [], "any", false, false, false, 100), "html", null, true);
            echo "</p>
                                    <p><i class=\"fas fa-star\"></i>";
            // line 101
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["rating"]) || array_key_exists("rating", $context) ? $context["rating"] : (function () { throw new RuntimeError('Variable "rating" does not exist.', 101, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 101), [], "array", false, false, false, 101), "html", null, true);
            echo "/5</p>
                                </div>
                                <div class=\"blog-text\">
                                    <p>";
            // line 104
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, false, 104), "html", null, true);
            echo "</p>
                                    <a class=\"btn custom-btn\" href=\"/Evenement/Rate/";
            // line 105
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 105), "html", null, true);
            echo "\">Rate Evenement</a>
                                    <a class=\"btn btn-success\" href=\"/admin/Participation/sendSms/";
            // line 106
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 106), "html", null, true);
            echo "\">Send Sms</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "                </div>
            </div>
        </div>
        <!-- Blog End -->


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
        return "front/pages/Evenement/index.html.twig";
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
        return array (  218 => 114,  204 => 106,  200 => 105,  196 => 104,  190 => 101,  186 => 100,  182 => 99,  178 => 98,  173 => 96,  165 => 90,  161 => 89,  130 => 61,  110 => 44,  68 => 4,  58 => 3,  35 => 1,);
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

<br><br><br><br>
        <!-- Blog Start -->
        <div class=\"blog\">
            <div class=\"container\">
                <div class=\"section-header text-center\">
                    <p>Evenement</p>
                    <h2>Latest Evenement</h2>
                </div>
                <form class=\"mb-4 px-4\" action=\"{{ path('app_front_Evenement') }}\" method=\"get\">
                    <div class=\"row\">
                    
                      <div class=\"col-lg-2\">
                          <label for=\"search_by\" class=\"form-label\">Search By:</label>
                          <select class=\"form-control\" id=\"search_by\" name=\"search_by\">
                              <option value=\"id\">N° Evenement</option>
                              <option value=\"idUser\">N° User</option>
                              <option value=\"date\">Date</option>
                              <option value=\"evenementType\">Evenement Type</option>
                              <option value=\"description\">Description</option>
                              <option value=\"location\">Location</option>
                              <option value=\"status\">Status</option>
                          </select>
                      </div>
                      <div class=\"mt-4 col-lg-10\">
                        <div class=\"mt-1 input-group\">
                        <input type=\"text\" class=\"form-control\" name=\"search\" placeholder=\"Search...\" value=\"{{ app.request.query.get('search') }}\">
                        <button type=\"submit\" class=\"btn btn-primary\">Search</button>
                        </div>
                      </div>
                      <div class=\"mt-2 col-lg-2\">
                          <label for=\"sort_by\" class=\"form-label\">Sort By:</label>
                          <select class=\"form-control\" id=\"sort_by\" name=\"sort_by\">
                              <option value=\"id\">N° Evenement</option>
                              <option value=\"idUser\">N° User</option>
                              <option value=\"date\">Date</option>
                              <option value=\"evenementType\">Evenement Type</option>
                              <option value=\"description\">Description</option>
                              <option value=\"location\">Location</option>
                              <option value=\"status\">Status</option>
                          </select>
                      </div>
                      <div class=\"mt-2 col-lg-2\">
                          <label for=\"sort_order\" class=\"form-label\">Sort Order:</label>
                          <select class=\"form-control\" id=\"sort_order\" name=\"sort_order\">
                              <option value=\"asc\">Ascending</option>
                              <option value=\"desc\">Descending</option>
                          </select>
                      </div>
                    </div>
            
                    <button type=\"submit\" class=\"btn btn-primary mt-2\">Sort</button>
                  </form>
                <div class=\"row\">
                {% for index,item in items %}
                    <div class=\"col-md-6\">
                        <div class=\"blog-item\">
                            <div class=\"blog-img\">
                                <img src=\"https://img.freepik.com/free-vector/happy-tiny-business-people-dancing-having-fun-drinking-wine-corporate-party-team-building-activity-corporate-event-idea-concept-pinkish-coral-bluevector-isolated-illustration_335657-1414.jpg\" alt=\"Blog\">
                            </div>
                            <div class=\"blog-content\">
                                <h2 class=\"blog-title\">N° Evenement {{ item.id }}</h2>
                                <div class=\"blog-meta\">
                                    <p><i class=\"far fa-list-alt\"></i>{{ item.evenementType }}</p>
                                    <p><i class=\"far fa-calendar-alt\"></i>{{ item.date | date(\"m/d/y\") }}</p>
                                    <p><i class=\"fas fa-map-marker\"></i>{{ item.location }}</p>
                                    <p><i class=\"fas fa-star\"></i>{{ rating[item.id] }}/5</p>
                                </div>
                                <div class=\"blog-text\">
                                    <p>{{ item.description }}</p>
                                    <a class=\"btn custom-btn\" href=\"/Evenement/Rate/{{ item.id }}\">Rate Evenement</a>
                                    <a class=\"btn btn-success\" href=\"/admin/Participation/sendSms/{{item.id}}\">Send Sms</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                {% endfor %}
                </div>
            </div>
        </div>
        <!-- Blog End -->


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
", "front/pages/Evenement/index.html.twig", "C:\\Users\\DELL\\Downloads\\sourour pi\\SymfonyPiDev\\templates\\front\\pages\\Evenement\\index.html.twig");
    }
}
