<?php

namespace Monii\Interop\Container\Laravel\Tests\Integration;

use Illuminate\Container\Container;
use Interop\Container\ContainerInterface;
use Monii\Interop\Container\Laravel\LaravelContainer;
use PHPUnit_Framework_TestCase;

class LaravelContainerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param ContainerInterface $container
     * @param string $id
     * @dataProvider provideFalseData
     */
    public function testFalse(ContainerInterface $container, $id)
    {
        $this->assertFalse($container->has($id));
        $this->assertFalse($container->has($id));
    }

    /**
     * @param ContainerInterface $container
     * @param string $id
     * @param string $expectedType
     * @dataProvider provideTrueData
     */
    public function testTrue(ContainerInterface $container, $id, $expectedType)
    {
        $this->assertTrue($container->has($id));
        $this->assertTrue($container->has($id));
        $this->assertInstanceOf($expectedType, $container->get($id));
    }

    public function provideFalseData()
    {
        return [
            'Named but does not exist in the container.' =>
                [$this->createContainer(), 'some.id'],

            'Interface exists but is itself not instantiable and not bound to a concrete class.' =>
                [$this->createContainer(), ContainerInterface::class],
        ];
    }

    public function provideTrueData()
    {
        return [
            'Named and bound to a concrete class.' =>
                [
                    $this->createContainer(['some.id' => self::class]),
                    'some.id',
                    self::class
                ],
            'Not instantiable but bound to a concrete class.' =>
                [
                    $this->createContainer([ContainerInterface::class => self::class]),
                    ContainerInterface::class,
                    self::class
                ],
            'Has not been bound but is an instantiable concrete class.' =>
                [
                    $this->createContainer(),
                    self::class,
                    self::class
                ],
        ];
    }

    /**
     * @return ContainerInterface
     */
    private function createContainer(array $map = [])
    {
        $container = new Container();
        foreach ($map as $key => $value) {
            $container->bind($key, $value);
        }

        return new LaravelContainer($container);
    }
}
