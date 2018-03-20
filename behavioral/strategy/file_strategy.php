<?php

interface FileStrategy
{

    public function getFile($filename);

}

class Strategy
{

    public $strategy;

    public function aplyStrategy($filename)
    {

        $this->strategy->getFile($filename);
    }
}

class txtFile implements FileStrategy
{

    public function getFile($filename)
    {
        echo 'TXT';
    }
}

class pdfFile implements FileStrategy
{

    public function getFile($filename)
    {
        echo 'PDF';
    }
}

class docFile implements FileStrategy
{

    public function getFile($filename)
    {
        echo 'DOC';
    }
}

$filename = 'Haha';

$file = new Strategy();

$file->strategy = new pdfFile();

$file->aplyStrategy($filename);
