<?php

namespace app\tests;

use PHPUnit\Framework\TestCase;

class PowTest extends TestCase
{
  /** @dataProvider providerPow */

  public function testPow($a, $b) {
    $this->assertEquals($b, $a * $a);
  }
  public function providerPow() {
    return [
        [2, 4],
        [3, 9],
        [4, 16]
    ];
  }
}