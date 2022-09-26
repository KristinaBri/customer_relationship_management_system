<?php
include_once "DB.php";
include_once "Companies.php";
include_once "Customers.php";
include_once "Conversations.php";
include_once "lib/BladeOne.php";
use eftec\bladeone\BladeOne;

$companies=Companies::getCompanies();
$customers=Customers::getCustomers();
$conversations=Conversations::getConversations();

if ($_GET['delete_id']){
    $company=Companies::getCompanies($_GET['delete_id']);
    $company->delete();
}

$blade=new BladeOne();
echo $blade->run("companies", ["title"=>"Companies", "companies"=>$companies]);
echo $blade->run("customers", ["title"=>"Customers", "customers"=>$customers]);
echo $blade->run("conversations", ["title"=>"Conversations", "conversations"=>$conversations]);






