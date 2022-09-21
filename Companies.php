<?php

class Companies
{
    public $id;
    public $name;
    public $address;
    public $vat_code;
    public $company_name;
    public $phone;
    public $email;

    public function __construct($name, $address, $vat_code, $company_name, $phone, $email, $id=null)
    {
        $this->name=$name;
        $this->address=$address;
        $this->vat_code=$vat_code;
        $this->company_name=$company_name;
        $this->phone=$phone;
        $this->email=$email;
        $this->id=$id;
    }

    public function save() {
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("UPDATE companies SET name=?, address=?, vat_code=?, company_name=?, phone=?, email=? WHERE id=?");
        $stm->execute([$this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email, $this->id]);
    }

    public function delete(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("DELETE FROM companies WHERE id=?");
        $stm->execute([ $this->id ]);
    }
    public static function getCompany($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM companies WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $company=new Companies($c['name'],$c['address'],$c['vat_code'],$c['company_name'],$c['phone'],$c['email'],$id);
        return $company;
    }
    public function insert($name, $address, $vat_code, $company_name, $phone, $email) {
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO companies (name, address, vat_code, company_name, phone, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stm->execute([$name, $address, $vat_code, $company_name, $phone, $email]);
    }

}
