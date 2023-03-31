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

    /*
    |-----------------------------------------------------------------------------
    | Api
    |-----------------------------------------------------------------------------
    |
    |   The Api gives you access to the Kubo api to write or read from IPFS.
    |   Use this config file to setup your connection to an IPFS node.
    |   set mode to api to upload files to your IPFS node.
    |
    */
    'api' => [
        'host' => env('IPFS_HOST', 'localhost'),
        'protocol' => env('IPFS_PROTOCOL', 'http'),
        'port' => env('IPFS_PORT', '8080'),
        'mode' => env('IPFS_API_MODE', 'gateway'),
    ],

    'gateway' => [
        'host' => env('IPFS_HOST', 'localhost:8080'),
        'protocol' => env('IPFS_PROTOCOL', 'http'),
        'url_mode' => env('IPFS_URL_MODE', 'subdomain'),
    ],

    'facade_as' => env('IPFS_FACADE_AS', 'gateway'),

    /*
    |-----------------------------------------------------------------------------
    | Gateway URL
    |-----------------------------------------------------------------------------
    |
    |   To generate readable urls for your frontend specify a gateway url.
    |   This could be for your node or a public gateway such as ipfs.io.
    |   or you could use the `ipfs://` protocol to generate urls.
    |
    */
    'gateway_url' => env('IPFS_GATEWAY_URL', 'http://localhost:8080/ipfs'),
];
