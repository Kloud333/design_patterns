<?php

interface Cofee
{
    public function cost();

    public function ingredients();
}

final class Espresso implements Cofee
{

    public function cost()
    {
        return 100;
    }

    public function ingredients()
    {
        return 'Espresso';
    }
}

class CoffeDecoretor implements Cofee {

    private $coffe;

    public function __construct($coffe)
    {
        $this->coffe = $coffe;
    }

    public function cost()
    {
        return $this->coffe->cost();
    }

    public function ingredients()
    {
        return $this->coffe->ingredients();
    }
}


final class Milk extends CoffeDecoretor{

    public function cost()
    {
        return parent::cost() + 20;
    }

    public function ingredients()
    {
        return parent::ingredients() . 'Milk';
    }
}

final class Whip extends CoffeDecoretor{

    public function cost()
    {
        return parent::cost() + 30;
    }

    public function ingredients()
    {
        return parent::ingredients() . 'Whip';
    }
}

final class Chocolate extends CoffeDecoretor{

    public function cost()
    {
        return parent::cost() + 50;
    }

    public function ingredients()
    {
        return parent::ingredients() . 'Chocolate';
    }
}


$espresso = new Espresso();

$capuchino = new Whip(new Milk($espresso));

$cappuchinoWithCocolate = new Chocolate($capuchino);


echo $espresso->ingredients();
echo $espresso->cost();
echo '</br>';
echo $capuchino->ingredients();
echo $capuchino->cost();
echo '</br>';
echo $cappuchinoWithCocolate->ingredients();
echo $cappuchinoWithCocolate->cost();
echo '</br>';