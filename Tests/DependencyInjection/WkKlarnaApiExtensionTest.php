<?php
namespace Wk\KlarnaApiBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Wk\KlarnaApiBundle\DependencyInjection\WkKlarnaApiExtension;

/**
 * Class WkKlarnaApiExtensionTest
 *
 * @package Wk\KlarnaApiBundle\Tests\DependencyInjection
 */
class WkKlarnaApiExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadEmptyConfiguration()
    {
        $config = $this->getEmptyConfig();
        $this->createCompiledContainerForConfig($config);
    }

    /**
     * Test if the Configuration can be Loaded and the Container has the correct Service
     */
    public function testLoadConfiguration()
    {
        $config = $this->getValidConfig();
        $container = $this->createCompiledContainerForConfig($config);
        $this->assertInstanceOf(
            '\Klarna',
            $container->get('wk_klarna_api')
        );
    }

    /**
     * @return array
     */
    private function getEmptyConfig()
    {
        $config = array(
            'merchant_id' => '',
            'secret'      => '',
            'country'     => '',
            'language'    => '',
            'currency'    => '',
            'mode'        => '',
        );

        return $config;
    }

    /**
     * @return array
     */
    private function getValidConfig()
    {
        $config = array(
            'merchant_id' => 'aMerchentId',
            'secret'      => 'aSecret',
            'country'     => \KlarnaCountry::DE,
            'language'    => \KlarnaLanguage::DE,
            'currency'    => \KlarnaCurrency::EUR,
            'mode'        => 0,
        );

        return $config;
    }

    /**
     * @param      $config
     * @param bool $debug
     *
     * @return ContainerBuilder
     */
    private function createCompiledContainerForConfig($config, $debug = false)
    {
        $container = $this->createContainer($debug);
        $container->registerExtension(new WkKlarnaApiExtension());
        $container->loadFromExtension('wk_klarna_api', $config);
        $this->compileContainer($container);

        return $container;
    }

    /**
     * @param bool $debug
     *
     * @return ContainerBuilder
     */
    private function createContainer($debug = false)
    {
        $container = new ContainerBuilder(new ParameterBag(array(
            'kernel.cache_dir' => __DIR__,
            'kernel.charset'   => 'UTF-8',
            'kernel.debug'     => $debug,
        )));

        return $container;
    }

    /**
     * @param ContainerBuilder $container
     */
    private function compileContainer(ContainerBuilder $container)
    {
        $container->getCompilerPassConfig()->setOptimizationPasses(array());
        $container->getCompilerPassConfig()->setRemovingPasses(array());
        $container->compile();
    }

}