# sptf
[Absol package](https://github.com/CaptSiro/absol) - Simple PHP Testing Framework

## Installation

```shell
absol pickup https://github.com/CaptSiro/sptf.git
```

My own testing framework for PHP because I don't like Pest (+ it did
not really work for me). When one tool does not work, let's just make 
my own. How hard can it really be... (even though there are other 
options)

spft uses the `test()` and `expect()->toBe()` that can be found in Pest 
or Jest. The main difference between Pest and sptf (other than the lack 
of features) is that sptf is not terminal based. It renders simple 
webpage as output. The main reason is that xdebug can be used :)

```php
// one.php
import("sptf");

\sptf\functions\test;
\sptf\functions\expect;

test("name", function () {
    $result = 1 + 2;
    
    expect($result)->toBe(3);
});
```

To view the result of test, navigate to the `one.php` file in browser.

sptf provides recursive function to test whole directory.

Example directory structure:

```
Tests/
    subdir/
        three.php
    one.php
    two.php
execute-tests.php
```

```php
// execute-tests.php
import("sptf", "dir");

\sptf\functions\test_directory(__DIR__ . "/Tests");
```

Again navigate to `execute-tests.php` in the browser to see the results.