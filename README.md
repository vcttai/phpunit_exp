# PHPUnit experimental project

Requires:
 - PHP installed in local machine
 - composer installed in local machine

## Run test

### Run all test cases
- Clone this project
- Install dependencies
```
composer install
```
- Run test
```
composer test
```

### Run a specific test case
- Run as following command:
```
./vendor/bin/phpunit <filename> 

e.g 
./vendor/bin/phpunit test/00_hello_phpunit/HelloPHPUnitTest.php 
```

## Code structure

- All production code is put in folder `src` 

  - Each case will have a separate folder (e.g 00_hello_phpunit, ...)
  - In each folder, File `main.js` is where the code in that folder is used as examples.
  
- All test code is put in folder `test`
