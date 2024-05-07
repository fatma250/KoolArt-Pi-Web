<?php

namespace ContainerPAMnw5C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGregwarCaptcha_ImageFileHandlerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'gregwar_captcha.image_file_handler' shared service.
     *
     * @return \Gregwar\CaptchaBundle\Generator\ImageFileHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'gregwar'.\DIRECTORY_SEPARATOR.'captcha-bundle'.\DIRECTORY_SEPARATOR.'Generator'.\DIRECTORY_SEPARATOR.'ImageFileHandler.php';

        return $container->services['gregwar_captcha.image_file_handler'] = new \Gregwar\CaptchaBundle\Generator\ImageFileHandler('captcha', (\dirname(__DIR__, 4).'/public'), 100, 60);
    }
}
