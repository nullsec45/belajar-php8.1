<?php

class Category{
    // public readonly string $id;
    // public  readonly string $name;

    // bisa langsung juga inisialisasi/promote diconstruct
    public function __construct(public readonly string $id,
                                public readonly string $name){
        // $this->id=$id;
        // $this->name=$name;
    }
    public function getId():string{
        return $this->id;
    }

    public function getName():string{
        return $this->name;
    }
}

$category=new Category("1","Gadget");
var_dump($category->id);