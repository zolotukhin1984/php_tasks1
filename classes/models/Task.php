<?php

namespace classes\models;

class Task
{
    public function __construct(...$args)
    {
        $this->term = $args[0];
        $this->decision = $args[1];
        $this->result = $args[2];
    }


    public $id;
    public $term;
    public $decision;
    public $result;

    public function getTerm()
    {
        return $this->term;
    }

    public function getDecision()
    {
        return $this->decision;
    }

    public function getResult()
    {
        return $this->result;
    }
}
