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

        $container->setParameter('codemitte_appliance.custom_webservices.vg_product_registration_web.wsdl_location', $config['custom_webservices']['vg_product_registration_web']['wsdl_location']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $loader->load('services.xml');
    }
} 