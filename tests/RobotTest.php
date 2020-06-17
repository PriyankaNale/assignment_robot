<?php

declare(strict_types=1);

require_once('robot.php');

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{

  public function testInvalidArgumentType(): void
  {
    $this->expectException(TypeError::class);
    cleanFloor('testthis');
  }

  /**
   * Test invalid command
   */
  public function testInvalidCommand(): void
  {
    $arrArgs = [
      "robot.php",
      "wrongClean",
      "--floor=carpet",
      "--area=70"
    ];
    $this->expectException(InvalidArgumentException::class);
    cleanFloor($arrArgs);
  }

  /**
   * Test invalid param
   */
  public function testInvalidParam(): void
  {
    $arrArgs = [
      "robot.php",
      "clean"
    ];
    $this->expectException(InvalidArgumentException::class);
    cleanFloor($arrArgs);
  }

  /**
   * Test invalid param
   */
  public function testInvalidFloor(): void
  {
    $arrArgs = [
      "robot.php",
      "wrongClean",
      "--floor=carpets",
      "--area=70"
    ];
    $this->expectException(InvalidArgumentException::class);
    cleanFloor($arrArgs);
  }

  /**
   * Test invalid param
   */
  public function testInvalidArea(): void
  {
    $arrArgs = [
      "robot.php",
      "wrongClean",
      "--floor=carpets",
      "--area=70s"
    ];
    $this->expectException(InvalidArgumentException::class);
    cleanFloor($arrArgs);
  }
}
