<?php

declare(strict_types=1);


use PHPUnit\Framework\TestCase;
use src\CleanHardFloor;

class CleanHardFloorTest extends TestCase
{

  /**
   * Test invalida area type
   */
  public function testInvalidArgumentType(): void
  {
    $this->expectException(TypeError::class);
    $objCleanHardFloor = new CleanHardFloor('testthis');
  }

  /**
   * Test invalid area
   */
  public function testInvalidArea(): void
  {
    $this->expectException(InvalidArgumentException::class);
    $objCleanHardFloor = new CleanHardFloor(0);
  }

  /**
   * Test Success
   */
  public function testCleanSuccess(): void
  {
    $objCleanHardFloor = new CleanHardFloor(60);
    $cleanStatus = $objCleanHardFloor->clean();
    $this->assertEquals(true, $cleanStatus);
  }
}
