<?php

/**
 * Pizza - basic building object
 */
class Pizza
{

    private $_pastry = "";
    private $_sauce = "";
    private $_garniture = "";

    public function setPastry($pastry)
    {
        $this->_pastry = $pastry;
    }

    public function setSauce($sauce)
    {
        $this->_sauce = $sauce;
    }

    public function setGarniture($garniture)
    {
        $this->_garniture = $garniture;
    }

}

/**
 * Builder - Abstract builder
 */
abstract class BuilderPizza
{

    protected $_pizza;

    public function getPizza()
    {
        return $this->_pizza;
    }

    public function createNewPizza()
    {
        $this->_pizza = new Pizza ();
    }

    abstract public function buildPastry();

    abstract public function buildSauce();

    abstract public function buildGarniture();

}

/**
 * BuilderConcret - Concrete builder 1
 */
class BuilderPizzaHawaii extends BuilderPizza
{

    public function buildPastry()
    {
        $this->_pizza->setPastry("normal");
    }

    public function buildSauce()
    {
        $this->_pizza->setSauce("soft");
    }

    public function buildGarniture()
    {
        $this->_pizza->setGarniture("jambon+ananas");
    }

}

/**
 * BuilderConcret - Concrete builder 2
 */
class BuilderPizzaSpicy extends BuilderPizza
{

    public function buildPastry()
    {
        $this->_pizza->setPastry("puff");
    }

    public function buildSauce()
    {
        $this->_pizza->setSauce("hot");
    }

    public function buildGarniture()
    {
        $this->_pizza->setGarniture("pepperoni+salami");
    }

}

/**
 * Director - Managing class that starts construction
 * PizzaBuilder - Implementing the Builder pattern, showing the delegation of the pizza creation process to the construct Pizza method
 */
class PizzaBuilder
{
    private $_builderPizza;

    public function setBuilderPizza(BuilderPizza $mp)
    {
        $this->_builderPizza = $mp;
    }

    public function getPizza()
    {
        return $this->_builderPizza->getPizza();
    }

    public function constructPizza()
    {
        $this->_builderPizza->createNewPizza();
        $this->_builderPizza->buildPastry();
        $this->_builderPizza->buildSauce();
        $this->_builderPizza->buildGarniture();
    }
}

// Peddler initialization
$pizzaBuilder = new PizzaBuilder();

// Initializing Available Products
$builderPizzaHawaii = new BuilderPizzaHawaii();
$builderPizzaPiquante = new BuilderPizzaSpicy();

// Preparation and receipt of the product
$pizzaBuilder->setBuilderPizza($builderPizzaHawaii);
$pizzaBuilder->constructPizza();
$pizza = $pizzaBuilder->getPizza();