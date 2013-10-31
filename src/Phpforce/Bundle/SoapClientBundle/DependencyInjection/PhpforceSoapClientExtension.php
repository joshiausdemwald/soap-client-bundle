<?php
namespace Phpforce\Bundle\SoapClientBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class PhpforceSoapClientExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();

        $configuration = new Configuration();

        $config = $processor->process($configuration->getConfigTree(), $configs);

        $container->setParameter('soap_client.sf_username', $config['sf_username']);
        $container->setParameter('soap_client.sf_password', $config['sf_password']);
        $container->setParameter('soap_client.sf_security_token', $config['sf_security_token']);
        $container->setParameter('soap_client.wsdl_path', $config['wsdl_path']);
        $container->setParameter('soap_client.force_cache_reload', $config['force_cache_reload']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $loader->load('services.xml');
    }
} 