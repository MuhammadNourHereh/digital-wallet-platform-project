<?php
require "model.php";

class BalanceModel extends Model{
    public int $id;
    public int $user_id;
    public float $amount;

    public function __construct(int $id, int $user_id, float $amount) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->amount = $amount;
    }
}