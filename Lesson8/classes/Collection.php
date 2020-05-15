<?php


class Collection implements ArrayAccess, Iterator
{

    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    function clear(){
        $this->items = [];
        return $this;
    }

    function get($key, $default = null){

        return $this->items[$key] ?? $default;
    }

    function set($key, $value){
        $this->items[$key] = $value;
        return $this;
    }

    public function __get($name)
    {
      return $this->get($name);
    }

    public function __set($name, $value)
    {
      $this->set($name,$value);
    }

    function toArray() : array {
        return $this->$this->items;
    }

    function toJson() : string {
        return json_encode($this->toArray());
    }

    function exist($key) : bool {
        return isset($this->items[$key]);
    }

    function delete($key) {
        unset($this->items[$key]);
        return $this;
    }
    
    public function offsetExists($key) : bool  {
        return $this->exist($key);
    }

    public function offsetGet($key) {
        return $this->get($key);
    }

    public function offsetSet($offset, $value){
        $this->set($offset,$value);
    }

    public function offsetUnset($offset){
        $this->delete($offset);
    }


    function keys(){
        return array_keys($this->toArray());
    }

    protected $possition = 0;

    public function rewind(){
        $this->possition = 0;
    }

    public function next(){
        $this->possition++;
    }

    public function current(){
       return $this->get($this->key());
    }

    public function key(){
        $keys = $this->keys();
        return $keys[ $this->possition ];
    }

    public function valid(){
        $keys = $this->keys();
        return isset( $keys[ $this->possition ] );
    }


    function __toString(){
        return $this->toJson();
    }

}
