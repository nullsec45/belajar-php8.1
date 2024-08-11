<?php

class Person{
    public function __construct(public string $name){
        
    }

    public function sayHello(string $name):string{
        return "Hello $name, my name $this->name";
    }
}

$person=new Person("Fajar");
$reference=$person->sayHello(...);

var_dump($reference("Zainab"));
// $reference2=str_contains(...);

// var_dump($reference2("Entong"));