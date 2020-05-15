<?php


class Queue implements Iterator
{
    protected $queue;

    public function __construct(){
        $this->queue = [];
    }

    public function pop(){
        return array_shift($this->queue);
    }

    public function push($value) : Queue{
        $this->queue[] = $value;
        return $this;
    }

    public function clear() : Queue{
        $this->queue = [];
        return $this;
    }

    public function current(){
        return $this->pop();
    }

    public function next(){
    }

    public function key(){
        return 0;
    }

    public function valid(){
        return isset($this->queue[$this->key()]);
    }

    public function rewind(){
    }
}