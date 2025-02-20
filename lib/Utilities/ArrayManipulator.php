<?php

declare(strict_types=1);

namespace Data\Utilities;

use Data\Custom\CustomReturner;

final class ArrayManipulator extends CustomReturner
{
  /**
   * Override and store updated value to prepare returns and other compilation.
   * 
   * @param mixed $value [required]
   * @return void
   */
  public function __construct(&$value)
  {
    $this->value = &$value;
    parent::__construct($value);
  }

  /**
   * 
   * 
   * @param mixed $value  [required]
   * @param mixed $values [optional]
   * 
   * @return \Data\Utilities\NumericManipulator
   */
  public function push($value, ...$values)
  {
    return $this->return(\array_push($this->value, $value, ...$values), $this->value);
  }

  /**
   * 
   * 
   * @param array $array  [required]
   * @param array $arrays [optional]
   * 
   * @return \Data\Utilities\ArrayManipulator
   */
  public function merge(array $array, array ...$arrays)
  {
    return $this->return($this->phpModel('array_merge', $this->value, $array, ...$arrays));
  }

  /**
   * 
   * 
   * @return \Data\Utilities\ArrayManipulator
   */
  public function pop()
  {
    return $this->return(\array_pop($this->value), $this->value);
  }

  /**
   * 
   * 
   * @return \Data\Utilities\ArrayManipulator
   */
  public function shift()
  {
    return $this->return(\array_shift($this->value), $this->value);
  }

  /**
   * 
   * 
   * @param mixed $value  [required]
   * @param mixed $values [optional]
   * 
   * @return \Data\Utilities\NumericManipulator
   */
  public function unshift($value, ...$values)
  {
    return $this->return(\array_unshift($this->value, $value, ...$values), $this->value);
  }

  /**
   * 
   * 
   * @param array|string $separator [optional]
   * @return \Data\Utilities\StringManipulator
   */
  public function implode($separator = "")
  {
    return $this->return($this->phpModel('implode', $separator, $this->value));
  }

  /**
   * 
   * 
   * @param array|string $separator [optional]
   * @return \Data\Utilities\StringManipulator
   */
  public function join($separator = "")
  {
    return $this->return($this->phpModel('join', $separator, $this->value));
  }

  /**
   * 
   * 
   * @param int $flag [optional]
   * @return \Data\Utilities\ArrayManipulator
   */
  public function unique(int $flag = \SORT_STRING)
  {
    return $this->return($this->phpModel('array_unique', $this->value, $flag));
  }

  /**
   * 
   * 
   * @param array $values [required]
   * @return \Data\Utilities\ArrayManipulator
   */
  public function combine(array $values)
  {
    return $this->return(\array_combine($this->value, $values), $this->value);
  }

  /**
   * 
   * 
   * @param int      $offset       [optional]
   * @param int|null $length       [optional]
   * @param bool     $preserve_key [optional]
   * 
   * @return \Data\Utilities\ArrayManipulator
   */
  public function slice(int $offset = 0, int $length = null, bool $preserve_key = false)
  {
    return $this->return($this->phpModel('array_slice', $this->value, $offset, $length, $preserve_key));
  }
}
?>