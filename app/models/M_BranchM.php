<?php
 class M_BranchM{
     private $db;

     public function __construct(){
         $this->db = new Database();
     }
     public function addCashier($data){
         $this->db->query('INSERT INTO cashier (Name, Contact, Address, Email, Join_Date, Password) VALUES(:Name, :Contact, :Address, :Email, :Join_Date, :Password)');
         $this->db->bind(':Name', $data['Name']);
         $this->db->bind(':Contact', $data['Contact']);
         $this->db->bind(':Address', $data['Address']);
         $this->db->bind(':Email', $data['Email']);
         $this->db->bind(':Join_Date', $data['Join_Date']);
         $this->db->bind(':Password', $data['Password']);

         //execute query
         if($this->db->execute()){
             return true;
         } else {
             return false;
         }
     }
 }
?>