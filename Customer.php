<?php

interface SayHello{
    function sayHello(): string;
}


trait IndonesiaGender{
    function inIndonesia():string{
        return match($this){
            Gender::Male => "Tuan",
            Gender::Female => "Nyonya"
        };
    }
}

// enum boleh inheritance hanya sebatas interface dan trait saja
enum Gender: string implements SayHello{
    use IndonesiaGender;

    case Male = "Mr.";
    case Female="Mrs.";

    const name="Fajar";

    function sayHello(): string{
        return "Hello ". $this->value;
    }

  

    static function fromIndonesia(string $value): Gender{
        return match($value){
            "Tuan" => Gender::Male,
            "Nyonya" => Gender::Female,
            default => throw new Exception("Unsuported Indonesian Value")
        };
    }
}

class Customer{

    public function __construct(public string $id, public string $name, public Gender $gender){

    }
}

function sayHello(Customer $customer): string{
    // if($customer->gender == Gender::Male){
    //     return "Hello Mr.".$customer->name;
    // }else if($customer->gender == Gender::Female){
    //     return "Hello Mrs.".$customer->name;
    // }else{
    //     return "Hello ".$customer->name;
    // }

    if($customer->gender == null){
        return "Hello ".$customer->name;
    }else{
        return "Hello ".$customer->gender->value.$customer->name;
    }
}

var_dump(sayHello(new Customer("1","Fajar", Gender::Male)));
var_dump(sayHello(new Customer("1","Zainab", Gender::Female)));

var_dump(Gender::cases());

var_dump(Gender::Male->sayHello());
var_dump(Gender::Female->sayHello());
var_dump(Gender::Male->inIndonesia());
var_dump(Gender::Female->inIndonesia());

var_dump(Gender::fromIndonesia("Tuan"));
var_dump(Gender::fromIndonesia("Nyonya"));

var_dump(Gender::name);