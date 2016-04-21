<?php
/*

Closure


Countable
OuterIterator,
RecursiveIterator
SeekableIterator
SplObserver
SplSubject


AppendIterator
ArrayIterator
ArrayObject
BadFunctionCallException
BadMethodCallException
CachingIterator
CallbackFilterIterator
DirectoryIterator
DomainException
EmptyIterator
FilesystemIterator
FilterIterator
GlobIterator
InfiniteIterator
InvalidArgumentException
IteratorIterator
LengthException
LimitIterator
LogicException
MultipleIterator
NoRewindIterator
OutOfBoundsException
OutOfRangeException
OverflowException
ParentIterator
RangeException
RecursiveArrayIterator
RecursiveCachingIterator
RecursiveCallbackFilterIterator
RecursiveDirectoryIterator
RecursiveFilterIterator
RecursiveIteratorIterator
RecursiveRegexIterator
RecursiveTreeIterator
RegexIterator
RuntimeException
SplDoublyLinkedList
SplFileInfo
SplFileObject
SplFixedArray
SplHeap
SplMinHeap
SplMaxHeap
SplObjectStorage
SplPriorityQueue
SplQueue
SplStack
SplTempFileObject
UnderflowException
UnexpectedValueException */

/* Closure */
/*$func = function(){
    return __FILE__;
};
var_dump($func);*/


/*$str  = 'Hello';
$closure = function() use ($str) {echo $str;};
$closure();*/

/*$add = function ($num){
  return function($x) use ($num){
      return $x + $num;
  };
};
$a = $add(2);
$b = $add(3);
var_dump($a(5));
var_dump($b(5));*/

/* Встроенные итераторы */

Traversable::class;
Iterator::class;
ArrayAccess::class;
IteratorAggregate::class;
Serializable::class;
Generator::class;
Closure::class;

// Итератор - это шаблон проектирования , позволяет перебирать коллекцию без учета реализации
// Нестандартный подход перебора обьектов и массивов





