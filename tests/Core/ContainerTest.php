<?php declare(strict_types=1);

namespace Spin\tests\Core;

use PHPUnit\Framework\TestCase;

class ContainerObject
{
  protected $property = '';

  public function getProperty()
  {
    return $this->property;
  }

  public function setProperty(string $value)
  {
    $this->property = $value;
  }
}


class ContainerTest extends TestCase
{
  /**
   * Setup test
   */
  public function setUp(): void
  {
  }

  /** Test Container STRING */
  public function testContainerString()
  {
    $a = 'My Container String';

    # Set it
    container('string', $a);

    # Get it
    $b = container('string');

    $this->assertEquals($a, $b);
  }

  /** Test Container ARRAY */
  public function testContainerArray()
  {
    $a = [ 'a'=>'a value','b'=>'b value','c'=>'c value' ];

    # Set it
    container('array', $a);

    # Get it
    $b = container('array');

    $this->assertEquals($a, $b);
  }

  /** Test Container Object */
  public function testContainerObject()
  {
    $a = new ContainerObject();
    $a->setProperty('I get set, therefore I exist');

    # Set it
    container('object', $a);

    # Get it
    $b = container('object');

    $this->assertEquals($a->getProperty(), $b->getProperty());
  }

  /** Test Container Callable */
  public function testContainerAnonymousFunction()
  {
    # Set it
    container('anon',
      function() {
        return 1234;
      }
    );

    $this->assertEquals(1234, container('anon')); //$value);
  }

}