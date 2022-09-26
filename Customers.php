<?php

class Customers{
    public $id;
    public $name;
    public $surname;
    public $phone;
    public $email;
    public $address;
    public $position;
    public $company_id;

    private $company;

    public function __construct($name, $surname, $phone, $email, $address, $position, $company_id, $id=null )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->position = $position;
        $this->company_id = $company_id;
    }

    public function getCompany(){
        if ($this->company==null){
            $this->company= Companies::getCompany($this->company_id);
        }

        return  $this->company;
    }

    public static function getCustomer($id=null){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM customers WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $customer=new Customers($c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['position'],$c['company_id'],$c['id']);
        return $customer;

    }

    public static function getCustomers($company_id=null){
        $pdo=DB::getPDO();
        if ($company_id!==null){
            $stm=$pdo->prepare("SELECT * FROM customers WHERE company_id=?");
            echo "SELECT * FROM customers WHERE companyy_id=$company_id <br>";
            $stm->execute([$company_id]);
        }else{
            $stm=$pdo->prepare("SELECT * FROM customers ");
            $stm->execute([]);
        }
        $customers=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $customers[]=new Customers($c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['position'],$c['company_id'],$c['id']);
        }
        return $customers;
    }
}
