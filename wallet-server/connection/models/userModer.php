<?php
require "model.php";

class userModel extends Model
{
    public int $id;
    public string $username;
    public string $password;
    public int $balance_id;

    public function __construct(int $id, string $username, string $password, int $balance_id)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->balance_id = $balance_id;
    }
}