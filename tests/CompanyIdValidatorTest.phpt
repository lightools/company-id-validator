<?php

namespace Lightools\Tests;

use Lightools\CompanyIdValidator\CompanyIdValidator;
use Tester\Assert;
use Tester\Environment;
use Tester\TestCase;

require __DIR__ . '/../vendor/autoload.php';

Environment::setup();

/**
 * @testCase
 * @author Jan Nedbal
 */
class CompanyIdValidatorTest extends TestCase {

    public function testValidation() {
        $validator1 = new CompanyIdValidator();

        Assert::true($validator1->isValidId('27082440'));
        Assert::true($validator1->isValidId('25596641'));
        Assert::true($validator1->isValidId('01859951'));
        Assert::true($validator1->isValidId('1859951'));

        Assert::false($validator1->isValidId('11223344'));
        Assert::false($validator1->isValidId('12345678'));
        Assert::false($validator1->isValidId('1234'));
        Assert::false($validator1->isValidId('foo'));
        Assert::false($validator1->isValidId(''));

        $validator2 = new CompanyIdValidator(FALSE);

        Assert::true($validator2->isValidId('01859951'));
        Assert::false($validator2->isValidId('1859951'));
        Assert::false($validator2->isValidId('1234'));
        Assert::false($validator2->isValidId('foo'));
        Assert::false($validator2->isValidId(''));
    }

}

$test = new CompanyIdValidatorTest;
$test->run();
