<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use src\CleanCarpetfloor;

class CleanCarpetfloorTest extends TestCase
{

  /**
   * Test invalida area type
   */
  public function testInvalidArgumentType(): void
  {
    $this->expectException(TypeError::class);
    $objCleanCarpet = new CleanCarpetfloor('testthis');
  }

  /**
   * Test invalid area
   */
  public function testInvalidArea(): void
  {
    $this->expectException(InvalidArgumentException::class);
    $objCleanCarpet = new CleanCarpetfloor(0);
  }

  /**
   * Test Success
   */
  public function testCleanSuccess(): void
  {
    $objCleanCarpet = new CleanCarpetfloor(70);
    $cleanStatus = $objCleanCarpet->clean();
    $this->assertEquals(true, $cleanStatus);
  }
}
