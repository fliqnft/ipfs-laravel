# IpfsLaravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Interact with IPFS in Laravel.

## Installation

Via Composer

``` bash
composer require fliq/ipfs-laravel
```

## Usage

Basic usage

```php
$cid = Ipfs::add('Hello, IPFS')->first()['Hash'];

Ipfs::get($cid); // Hello, IPFS
```

### Configuration

To publish your config run:

```bash
php artisan vendor:publish --tag=ipfs.config
```

### Adding Files

You can flexibly add new files to IPFS using the `add()` method.
You can add files from a string, a resource or an array, arrays will be json encoded.
Use array keys to specify files names.

The second argument is an array of options more information on
the [IPFS documentation.](https://docs.ipfs.tech/reference/kubo/rpc/#api-v0-add)
The `wrap-with-directory`option will create an extra CID for the directory.

```php
$resource = fopen('path/to/file.mp3');

$results = Ipfs::add([
    'hello.txt' => 'Hello, IPFS!', 
    'file.mp3' => $resource,
    'meta.json' => [
        'name' => 'Hello',
        'properties' => [...],
    ],
], ['wrap-with-directory' => true]);

$cid = $results->last()['Hash'];

Ipfs::get("{$cid}/hello.txt"); // Hello, IPFS!
```

### Retrieving files

You can retrieve files using the `cat()`, `get()`, and `json()` methods.

- `cat()`
    - Returns a [StreamInterface](https://docs.guzzlephp.org/en/stable/psr7.html#streams)
- `get()`
    - returns a string
- `json()`
    - returns a json decoded array

```php
$stream = Ipfs::cat($cid);

$str = Ipfs::get($cid);

$array = Ipfs::json($cid);
```

### Asynchronous requests

Use the `async()` method to make asynchronous requests.

Async requests return [Promises](https://docs.guzzlephp.org/en/stable/quickstart.html?highlight=settle#concurrent-requests)

```php
Ipfs::async()->add($file)->then(function(array $results) {
    $results[0]; // do something
});

// or do multiple requests.
$ipfs = Ipfs::async();

$promises = [
    $ipfs->get($cid1),
    $ipfs->get($cid2),
];

$results = GuzzleHttp\Promise\Utils::unwrap($promises);
```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author@email.com instead of using the issue tracker.

## Credits

- [Christian Pavilonis][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/fliq/ipfs-laravel.svg?style=flat-square

[ico-downloads]: https://img.shields.io/packagist/dt/fliq/ipfs-laravel.svg?style=flat-square

[ico-travis]: https://img.shields.io/travis/fliq/ipfs-laravel/master.svg?style=flat-square

[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/fliq/ipfs-laravel

[link-downloads]: https://packagist.org/packages/fliq/ipfs-laravel

[link-travis]: https://travis-ci.org/fliq/ipfs-laravel

[link-styleci]: https://styleci.io/repos/12345678

[link-author]: https://github.com/ChristianPavilonis

[link-contributors]: ../../contributors
