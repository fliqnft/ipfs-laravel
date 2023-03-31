<?php

namespace Fliq\IpfsLaravel;

use GuzzleHttp\Promise\PromiseInterface;

trait SyncByDefault
{
    public function __call(string $name, array $arguments)
    {
        $promise = $this->ipfs->{$name}(...$arguments);

        if ($promise instanceof PromiseInterface) {
            return $promise->wait();
        }

        return $promise;
    }

    public function async()
    {
        return $this->ipfs;
    }
}
