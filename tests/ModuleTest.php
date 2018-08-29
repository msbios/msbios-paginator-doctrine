<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBiosTest\Paginator\Doctrine;

use MSBios\ModuleInterface;
use MSBios\Paginator\Doctrine\Module;
use PHPUnit\Framework\TestCase;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

/**
 * Class ModuleTest
 * @package MSBiosTest\Paginator\Doctrine
 */
class ModuleTest extends TestCase
{
    /**
     * @return Module|ModuleInterface
     */
    public function testInstance()
    {
        /** @var ModuleInterface $instance */
        $instance = new Module;
        $this->assertInstanceOf(ModuleInterface::class, $instance);
        return $instance;
    }

    /**
     * @depends testInstance
     * @param ModuleInterface $instance
     */
    public function testGetConfig(ModuleInterface $instance)
    {
        $this->assertInternalType('array', $instance->getConfig());
    }

    /**
     * @depends testInstance
     * @param ModuleInterface $instance
     */
    public function testGetAutoloaderConfig(ModuleInterface $instance)
    {
        $this->assertInstanceOf(AutoloaderProviderInterface::class, $instance);
        $this->assertInternalType('array', $instance->getAutoloaderConfig());
    }
}
