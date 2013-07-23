<?php

namespace Acme\DemoBundle\DependencyInjection\Factory;

use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\FormLoginFactory;

class SecurityFactory extends FormLoginFactory
{
    public function getKey()
    {
        return 'webservice-login';
    }

    protected function getListenerId()
    {
        return 'security.authentication.listener.form';
    }

    protected function createAuthProvider(ContainerBuilder $container, $id, $config, $userProviderId)
    {
        $provider = 'security.authentication_provider.acme_demo_webservice.'.$id;
        $container
            ->setDefinition($provider, new DefinitionDecorator('security.authentication_provider.acme_demo_webservice'))
            ->replaceArgument(1, new Reference($userProviderId))
            ->replaceArgument(3, $id)
        ;

        return $provider;
    }
}

