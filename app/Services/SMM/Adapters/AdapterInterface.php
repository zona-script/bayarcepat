<?php


namespace App\Services\SMM;


interface AdapterInterface
{
    public function getBalance();
    public function getProfile();
    public function getProduct();
    public function order($payload);
    public function statusOrder();
}
