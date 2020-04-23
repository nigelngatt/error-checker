<?php
/**
* @Copyright MIT License / No copying
* @Author Nigel Gatsfield
* @Version 1.0
*
*/

/*
 *@class Errors
 *@extends Exception
*/
class Errors extends Exception
{
//Errors
//Add sp to display msg
//Come up with where a function would come in handy
//Restrict uploading capacities

  private function getErrors(Exception $e):string
  {
   $e->getMessage();
  }

  function __construct()
  {
    print_r($argc, $argv, php_check_syntax(__FILE__));
    echo $php_errormsg;
    error_reporting(E_ALL);
    var_dump(error_get_last());
    flush();
  }

  public function __invoke()
  {
    set_exception_handler();
    if (true) {
      trigger_error("Error caused by fatal error", E_ERROR|E_USER_ERROR);
      error_log("Error", 0, $_SERVER['PHP_ADMIN']);
      exit;
    } elseif (false) {
       print_r(error_get_last());
    } else exit;

/*$defined = array(PCRE => 'PCRE', OTHER => 'Other', PCNTL => 'Process', SOCKET => 'Socket', MAIL => 'Mail', MYSQL => 'Database', POSIX => 'Posix', DATE => 'Date'); - Removed 2019-03-06 */
define('ERRORS', array('PCRE', 'OTHER', 'PCNTL', 'SOCKET', 'MAIL', 'MYSQL', 'POSIX', 'DATE'));

foreach((new Helper)->Finder($dir)/*scandir(__DIR__)*/ as $class){
 $c = new ReflectionClass((new Helper)->Finder2($class))->getName()/*Removed 2019-03-06 ->getMethod()*/;

/*foreach(ERRORS as $methodErrors) - Removed 2019-03-08 17:43{
 if((new ReflectionClass($c))->getReturnType() === $methodErrors){return Errors::__invoke();}
}*/

if((new ReflectionClass($c))->getReturnType() === FALSE or NULL){
  //
}

if((new ReflectionClass($c))->getReturnType() === PCRE){
print/*return*/ preg_last_error(PREG_INTERNAL_ERROR|PREG_BACKTRACK_LIMIT_ERROR|PREG_UNMATCHED_AS_NULL|PREG_PATTERN_ORDER);
} elseif((new ReflectionClass($c))->getReturnType() === OTHER){
print $php_errormsg;
} elseif((new ReflectionClass($c))->getReturnType() === PCNTL){
print new Process::error();
} elseif((new ReflectionClass($c))->getReturnType() === SOCKET){
print new Socket::error();
} elseif((new ReflectionClass($c))->getReturnType() === MAIL){
printf('%s %s', imap_errors(), imap_last_error());
} elseif((new ReflectionClass($c))->getReturnType() === MYSQL){
print mysqli_connect_error();
} elseif((new ReflectionClass($c))->getReturnType() === POSIX){
print posix_get_last_error();
} elseif((new ReflectionClass($c))->getReturnType() === DATE){
print date_get_last_errors();
} else exit;
error_clear_last();
 }
}

  function __call($name, $value):string{
    $dir = (new Helper)->Finder($dir);
    foreach($class = new ReflectionClass((new Helper)->Finder2($dir)) as $classes){
     try {
	      return $classes;
        throw new Errors("Error Processing Request", 1);
    } catch (Exception $e) {/*new ArrayIterator $e = new Exception();*/
      var_dump(
        $e
          ->getMessage(),
          ->getCode(),
          ->getFile(),
          ->getLine(),
          ->getSeverity(),
      );
    }
   }
 }

  private function halt_compiler():int{
   if (new Errors === false){
    return 0;
   } else exit;
  }

}

/*<!--*/
///*
//var_dump($e->current());
//echo __COMPILER_HALT_OFFSET__;
//if(class_method_exists($c, $method){
//if($method->getReturn() === FALSE || ERROR){
//print $method'/.\w+(?R)_error.\(\)'/;
//}}strtoupper(method);
/**///*/
//-->
?>
