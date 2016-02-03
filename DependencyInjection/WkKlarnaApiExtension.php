<?php

namespace Wk\KlarnaApiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class WkKlarnaApiExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter(
            'wk_klarna_api.merchant_id',
            $config['merchant_id']
        );

        $container->setParameter(
            'wk_klarna_api.secret',
            $config['secret']
        );

        $container->setParameter(
            'wk_klarna_api.country',
            $config['country']
        );

        $container->setParameter(
            'wk_klarna_api.language',
            $config['language']
        );

        $container->setParameter(
            'wk_klarna_api.currency',
            $config['currency']
        );

        $container->setParameter(
            'wk_klarna_api.mode',
            $config['mode']
        );
    }
}
