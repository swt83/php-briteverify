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

See the [documentation](https://support.briteverify.com/briteverify-verification-apis/real-time-email-api) for more information.

## Errors

The library will throw an exception on any response code other than 200, 201, or 202.  If the JSON fails to decode, the response will be ``false``.