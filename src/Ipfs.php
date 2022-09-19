<?php

namespace Fliq\IpfsLaravel;

use Fliq;
use GuzzleHttp\Promise\PromiseInterface;

class Ipfs
{
    use SyncByDefault;

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

    public function url($cid) : string
    {
        return (new Fliq\Ipfs\Gateway(
            config('ipfs.gateway.host'),
            config('ipfs.gateway.protocol'),
            config('ipfs.gateway.url_mode'),
        ))->getUrl($cid);
    }

}