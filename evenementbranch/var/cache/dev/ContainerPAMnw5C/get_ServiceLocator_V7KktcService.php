<?php

namespace ContainerPAMnw5C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_V7KktcService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.v_7Kktc' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.v_7Kktc'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'mr' => ['services', 'doctrine', 'getDoctrineService', false],
        ], [
            'mr' => '?',
        ]);
    }
}
