<?php

namespace Fliq\IpfsLaravel;

use Fliq\Ipfs\Gateway;

class IpfsGateway
{
    use SyncByDefault;

    protected Gateway $ipfs;

    public function __construct(array $config)
    {
        $this->ipfs = new Gateway($config['host'], $config['protocol']);
    }

    public function url($cid)
    {
        return $this->ipfs->getUrl($cid);
    }
}
