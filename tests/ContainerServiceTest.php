<?php

namespace Tests;

use Container\Exceptions\ContainerException;
use Container\Services\ContainerService;
use Container\Services\ContainerServiceInterface;

class ContainerServiceTest extends TestCase
{
    private ContainerServiceInterface $containerService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->containerService = new ContainerService();
    }

    public function testGet(): void
    {
        $key = $this->fakerService->getDataTypeGenerator()->randomString();
        $expectedValue = $this->fakerService->getDataTypeGenerator()->randomString();

        $this->containerService->set($key, $expectedValue);

        $this->assertTrue($this->containerService->has($key));
        $this->assertEquals($expectedValue, $this->containerService->get($key));
    }

    public function testGetFailedToGetValue(): void
    {
        $this->expectException(ContainerException::class);
        $this->expectExceptionMessage('Failed to get the value from the container.');

        $this->containerService->get($this->fakerService->getDataTypeGenerator()->randomString());
    }

    public function testSet(): void
    {
        $key = $this->fakerService->getDataTypeGenerator()->randomString();
        $expectedValue = $this->fakerService->getDataTypeGenerator()->randomString();

        $this->containerService->set($key, $expectedValue);

        $this->assertTrue($this->containerService->has($key));
        $this->assertEquals($expectedValue, $this->containerService->get($key));
    }

    public function testHas(): void
    {
        $key = $this->fakerService->getDataTypeGenerator()->randomString();

        $this->containerService->set($key, $this->fakerService->getDataTypeGenerator()->randomString());

        $this->assertTrue($this->containerService->has($key));
    }
}
