<?php

class Conversations{
    public $id;
    public $customer_id;
    public $date;
    public $conversation;


    public function __construct($customer_id, $date, $conversation,$id=null)
    {
        $this->customer_id=$customer_id;
        $this->date=$date;
        $this->conversation=$conversation;
        $this->id=$id;
    }

    public static function getConversations(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM conversations");
        $stm->execute([]);
        $conversations=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $conv) {
            $conversations[]=new Conversations($conv['customer_id'],$conv['date'],$conv['conversation']);
        }
        return $conversations;
    }
}