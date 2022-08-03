<?php

namespace Fliq\IpfsLaravel;

use Fliq;
use GuzzleHttp\Promise\PromiseInterface;

class Ipfs
{
    protected Fliq\Ipfs\Ipfs $ipfs;

    public function __construct(array $config)
    {
        $this->ipfs = new Fliq\Ipfs\Ipfs(
            host    : $config['host'],
            port    : $config['port'],
            protocol: $config['protocol'],
            mode    : $config['mode'],
        );
    }

    public function add($resources, array $options)
    {
        return collect($this->ipfs->add($resources, $options)->wait());
    }

    public function __call(string $name, array $arguments)
    {
        $promise = $this->ipfs->{$name}(...$arguments);

        if ($promise instanceof PromiseInterface) {
            return $promise->wait();
        }

        return $promise;
    }

    public function async() : Fliq\Ipfs\Ipfs
    {
        return $this->ipfs;
    }

}