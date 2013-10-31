<?php
namespace Phpforce\Bundle\SoapClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration
{
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder
            ->root('soap_client')
                ->children()
                    ->scalarNode('sf_username')
                        ->isRequired()
                    ->end()
                    ->scalarNode('sf_password')
                        ->isRequired()
                    ->end()
                    ->scalarNode('sf_security_token')
                        ->isRequired()
                    ->end()
                    ->scalarNode('wsdl_path')
                        ->isRequired()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder->buildTree();
    }
}