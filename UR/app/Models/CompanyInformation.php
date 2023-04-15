<?php declare(strict_types=1);
namespace App\Models;
class CompanyInformation {
    private object $data;

    function __construct (object $data){
        $this->data = $data;
    }

    function getName (){
        return $this->data->name;
    }

    function getRegistrationNumber(){
        return $this->data->regcode;
    }

    function getAddress(){
        return $this->data->address;
    }

}