# BriteVerify

A PHP package for working w/ the BriteVerify API.

## Install

Normal install via Composer.

## Usage

```php
use Travis\BriteVerify;

// submit
$response = BriteVerify::run($apikey, $email);
```

The response will look like this:

```
stdClass Object
(
    [email] => stdClass Object
        (
            [address] => johndoe@briteverify.com
            [account] => johndoe
            [domain] => briteverify.com
            [status] => valid
            [connected] =>
            [disposable] =>
            [role_address] =>
        )

    [duration] => 0.014833573
)
```

See the [documentation](https://docs.briteverify.com/#79e00732-b734-4308-ac7f-820d62dde01f) for more information.

## Errors

- The library will throw an exception on any response code other than 200, 201, or 202.
- If the JSON fails to decode, the response will be ``false``.

## Changelog

- Updated to new ``v1`` api endpoint, as the original version was shut down.