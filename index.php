<?php

    include_once ("DB.php");
    include_once ("Companies.php");

    //Update:
    //$comp=Companies::getCompanies(2);
    //echo "Company $comp->name, address $comp->address";
    //$comp->vat_code=7;
    //$comp->save();
    //.........

    //Delete:
    //$comp=Companies::getCompanies(2);
    //$comp->delete();
    //........

    //Insert:
    $comp=new Companies("UAB Meskiukai", "Saules zuikuciu 4 Vilnius", "77780", "UAB Meskinas", "867564623", "hah@oho.lt");
    print_r($comp);
    $comp->insert($comp->name, $comp->address, $comp->vat_code, $comp->company_name, $comp->phone, $comp->email);