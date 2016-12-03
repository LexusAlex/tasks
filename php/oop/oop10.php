<?php
/*
 * Exception - предназначен для вывода ошибок и информации о них
 * throw - выбросить исключение
 * catch - поймать исключение
 * try - код где перехватывается ислючение
 * finally - вызывается всегда независимо не от чего с целью очистки чего-либо
 * Можно создавать свои подклассы исключений
 */
namespace oop10;

// выбросить исключение можно так
if (!file_exists('./file')){
    //throw new \Exception('file not found');
}

// но лучше сделать так, отслеживание ошибок
try {

    if (!file_exists('./file')){
        throw new \Exception('file not found'); // что будем выбрасывать
    }

} catch ( \Exception $e) { // как будем об этом говорить
    echo 'Message of contructor: '. $e->getMessage() .'<br>';
    echo 'Code error of contructor: '. $e->getCode() .'<br>';
    echo 'file name exception: '. $e->getFile() .'<br>';
    echo 'String number exception: '. $e->getLine() .'<br>';
    echo 'Previous exception: '. $e->getPrevious() .'<br>';
    echo 'getTrace: '; var_dump($e->getTrace());
    echo 'getTraceAsString: '; var_dump($e->getTraceAsString());
} finally {
    echo 'code done';
}


class MyException extends \Exception
{

}