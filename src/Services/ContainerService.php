<?php

namespace Container\Services;

use Container\Exceptions\ContainerException;

class ContainerService implements ContainerServiceInterface
{
    /**
     * @var array<string,mixed>
     */
    private array $container;

    public function __construct()
    {
        $this->container = [];
    }

    /**
     * @throws ContainerException
     */
    public function get(string $key): mixed
    {
        if (!$this->has($key)) {
            throw new ContainerException('Failed to get the value from the container.');
        }

        return $this->container[$key];
    }

    public function set(string $key, mixed $value): void
    {
        $this->container[$key] = $value;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->container);
    }
}
