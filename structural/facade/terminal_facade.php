<?php

final class Machine {

    public $state = 'notRunning';

    public function startMachine(){
        echo 'Starting....';
        $this->state = 'ready';
        $this->state = 'running';
        echo 'MACHINE IS RUNNING';
    }

    public function stopMachine(){
        echo 'Finishing....';
        $this->state = 'notRunning';
        echo 'MACHINE IS STOP';
    }
}


final class RequestManager {
    public $isConnected = false;

    public function connectToTerminal(){
        echo 'Connecting to terminal...';
        $this->isConnected = true;
    }

    public function disconnectToTerminal(){
        echo 'Disconnecting to terminal...';
        $this->isConnected = false;
    }

    public function getStatusRequest($machine){
        echo 'Sending status request...';
        return $machine;
    }

    public function sendStartRequest($machine){
        echo 'Sending request to start the machine...';
        return $machine->startMachine();
    }

    public function sendStopRequest($machine){
        echo 'Sending request to stop the machine...';
        return $machine->stopMachine();
    }
}





interface Facade {
    public function stertMacine();
}

final class ConcreteFacade implements Facade{

    public function stertMacine()
    {
        $machine = new Machine();

        $manager = new RequestManager();

        if(!$manager->isConnected){
            $manager->connectToTerminal();
        }

        if(!$manager->getStatusRequest($machine) == 'ready'){
            echo 'Машина готова до запуску';
            $manager->sendStartRequest($machine);
        }
    }
}

$simpleInterface = new ConcreteFacade();
$simpleInterface->stertMacine();