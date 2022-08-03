<?php

return [
    /*
    |-----------------------------------------------------------------------------
    | IPFS config
    |-----------------------------------------------------------------------------
    |
    |   The Interplanetary File System (IPFS) is a decentralized file system.
    |   Use this config file to setup your connection to an IPFS node.
    |   set mode to api to upload files to your IPFS node.
    |
    */

    'host'     => env('IPFS_HOST', 'localhost'),

    'protocol' => env('IPFS_PROTOCOL', 'http'),

    'port'     => env('IPFS_PORT', '8080'),

    'mode'     => env('IPFS_MODE', 'gateway'),
];