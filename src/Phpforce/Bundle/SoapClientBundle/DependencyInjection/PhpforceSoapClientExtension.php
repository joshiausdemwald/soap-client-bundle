<?php
/**
 * Created by PhpStorm.
 * User: joshi
 * Date: 31.10.13
 * Time: 14:29
 */

namespace Phpforce\Bundle\SoapClient\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

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