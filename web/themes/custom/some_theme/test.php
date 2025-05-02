<?php

/**
 * @file
 * Test-linter.php.
 */

require_once 'somefile.php';

/**
 *
 */
class testclass {
  public $Var1 = "hello";
  private $var2 = 123;
  protected $VAR3;

  public function __construct() {
    echo "Testclass constructed";
    $this->Var1 = "Hi";
  }

  /**
   *
   */
  public function doSomething($param1, $param2) {
    if ($param1 = $param2) {
      echo "Params equal!";
    }
    else {
      echo 'Params not equal!';
    }
  }

  /**
   *
   */
  public function unusedFunction() {
    $temp = 100;
  }

  /**
   *
   */
  public function calcSum($a, $b) {
    $result = $a + $b;
    // Undefined variable.
    return $Result;
  }

  /**
   *
   */
  public function veryLongFunctionNameThatDoesNotMakeSenseAndIsTooVerboseToBeUsefulOrReadable1234567890() {
    for ($i = 0; $i < 10; $i++) {
      echo $i;
      for ($j = 0; $j < 5; $j++) {
        echo $j;
      }
    }
  }

}

// Missing semicolon.
$test = new testclass()

$test->doSomething(5, "5");

/**
 *
 */
function anotherFunc($arg1, $arg2, $arg3, $arg4, $arg5) {
  echo "This function has too many arguments";
}

$arr = ["one", "two", "three"];
foreach ($arr as $key => $value) {
  echo $value
}

$someStr = "Hello";
if ($someStr = "World") {
  echo "Assigned instead of compared";
}

// Extra closing brace.
}
