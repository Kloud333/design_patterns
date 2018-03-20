<?php

class DataReadingAlgorithm
{


//    Методи які можуть бути переопреділині, але також описані стандартно
    public function openResource()
    {
        echo 'This method must be overriden in subclass' . '<br>';
    }

    public function extractData()
    {
        echo 'Extracting data' . '<br>';
    }

    public function parseData()
    {
        echo 'Parsing data' . '<br>';
    }

    public function processData()
    {
        echo 'Processing data' . '<br>';
    }

    public function closeResource()
    {
        echo 'This method must be overriden in subclass' . '<br>';
    }

//    final щоб наслідники не могли перевизначити послідовність
// Алгоритм
    final function readData()
    {
        $this->openResource();
        $this->extractData();
        $this->parseData();
        $this->processData();
        $this->closeResource();
    }

}

//клас в якому ми переоприділяємо методи які нам потрібно
class FileReader extends DataReadingAlgorithm
{

    public function openResource()
    {
        echo 'Open file' . '<br>';
    }

    public function closeResource()
    {
        echo 'Close file' . '<br>';
    }
}


//клас в якому ми переоприділяємо методи які нам потрібно
class BuferReader extends DataReadingAlgorithm
{

    public function openResource()
    {
        echo 'Open bufer' . '<br>';
    }

    public function closeResource()
    {
        echo 'Close bufer' . '<br>';
    }
}

//клас в якому ми переоприділяємо методи які нам потрібно
class DBReader extends DataReadingAlgorithm
{

    public function openResource()
    {
        echo 'Open DB' . '<br>';
    }

    public function closeResource()
    {
        echo 'Close DB' . '<br>';
    }
}

$fileRead = new FileReader();
$fileRead->readData();

$fileRead = new BuferReader();
$fileRead->readData();

$fileRead = new DBReader();
$fileRead->readData();