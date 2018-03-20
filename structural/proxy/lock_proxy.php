<?php

final class Lock implements LockingSystem {

    public function open(){

        echo 'Unlock';
    }


    public function close(){

        echo 'Lock';
    }

}

interface LockingSystem {
    public function open();
    public function close();
}

final class ProxyLock implements LockingSystem {

    public $lock;

    public function __construct()
    {
        $this->lock = new Lock();

    }

    public function open(){
        echo 'Additional operations....'; // do some operations

        if (AdditionalOperation::$autenticated){
            $this->lock->open();
        }else{
            echo 'Доступ заборонено';
        }

    }


    public function close(){
        $this->lock->close();
    }
}

final class AdditionalOperation {
    public static $autenticated = false;

}



$lock = new ProxyLock();
$lock->open();

