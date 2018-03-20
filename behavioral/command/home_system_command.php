<?php

class LightOutside
{

    public $intensivity = 1;

    public function switchOn()
    {
        echo 'Lights switched on';
    }

    public function switchOff()
    {
        echo 'Lights switched off';
    }

}

class HeatingCooling
{

    public $temperature = 21;
    public $mode;


    public function __construct()
    {
        $this->mode = $this->temperature >= 25 ? 'heating' : 'cooling';
    }

    public function start()
    {
        echo 'start ' . $this->mode;
    }

    public function end()
    {
        echo 'end  ' . $this->mode;
    }

}


interface Command
{
    public function execute();
}


class SwitchOnCommand implements Command
{
    public $light;

    public function __construct(LightOutside $light)
    {
        $this->light = $light;
    }

    public function execute()
    {
        $this->light->switchOn();
    }
}

class StartHeatingCommand implements Command
{
    /**
     * @var HeatingCooling
     */
    public $heater;

    public function __construct(HeatingCooling $heater)
    {
        $this->heater = $heater;
    }

    public function execute()
    {
        if ($this->heater->temperature < 25) {
            $this->heater->temperature = 25;
        }

        $this->heater->start();
    }
}


class Program
{

    public $commands = [];


    public function start()
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }

}


$light = new LightOutside();
$heater = new HeatingCooling();

$lightOnCOmmand = new SwitchOnCommand($light);
$heatCommand = new StartHeatingCommand($heater);


$eveningProgram = new Program();

$eveningProgram->commands[] = $lightOnCOmmand;
$eveningProgram->commands[] = $heatCommand;
$eveningProgram->start();










