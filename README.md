# Performance benchmarks for JsonPath-PHP

JsonPath-PHP is a PHP extension that makes it easy to work with data arrays using the JSONPath notation. Here we compare the performance of the JSONPath-PHP extension against similar types of libraries in PHP as well as the equivalent data lookups written in native PHP code.

## Test subjects

- Native PHP (considered as the baseline for comparison)
- JsonPath-PHP extension [[GitHub](https://github.com/supermetrics-public/pecl-jsonpath)]
- JSONPath for PHP library by SoftCreatR [[GitHub](https://github.com/SoftCreatR/JSONPath)] [[Packagist](https://packagist.org/packages/softcreatr/jsonpath)]
- JsonPath library by Galbar [[GitHub](https://github.com/Galbar/JsonPath-PHP)] [[Packagist](https://packagist.org/packages/galbar/jsonpath)]

## Datasets

- Tiny dataset (1 row, filesize < 1kB)
- Medium dataset (3 532 rows, filesize 1.2MB)
- Huge dataset (72 733 rows, filesize 63MB)

The datasets are built from [datasets provided by the Tate Collection](https://github.com/tategallery/collection).

## Usage

To run the benchmark tests:

1. Clone the repository.
2. Run `composer install` to install the dependencies.
3. Run `./vendor/bin/phpbench run --report=overview` to perform the benchmarks.

The benchmark tests can take a minute or two to run, depending on your setup.

## License

[MIT](https://github.com/supermetrics-public/jsonpath-benchmark/blob/main/LICENSE).
