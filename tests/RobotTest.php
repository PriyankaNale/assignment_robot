<?php

declare(strict_types=1);

require_once('robot.php');

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{

  public function testInvalidArgumentType(): void
  {
    $this->expectException(TypeError::class);
    $cleanFloor = cleanFloor('testthis');
    $this->assertEquals(false, $cleanFloor);
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
    
    $cleanFloor = cleanFloor($arrArgs);
    $this->assertEquals(false, $cleanFloor);

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
    $cleanFloor = cleanFloor($arrArgs);
    $this->assertEquals(false, $cleanFloor);
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
    $cleanFloor = cleanFloor($arrArgs);
    $this->assertEquals(false, $cleanFloor);
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
    $cleanFloor = cleanFloor($arrArgs);
    $this->assertEquals(false, $cleanFloor);
  }
}
