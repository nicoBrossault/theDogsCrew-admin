<?php
class Collection {
    private $items;
    public function __construct() {
        $this->items=array();
    }
    public function add($anObject){
        $this->items[]=$anObject;
    }
    public function indexOf($anObject) {
        return array_search($anObject,$this->items);
    }
    public function delete($index){
        if(array_key_exists($index, $this->items)){
            unset($this->items[$index]);
            $this->items=array_values($this->items);
        }
    }
    public function getItem($index){
        return $this->items[$index];
    }
    public function size(){
        return sizeof($this->items);
    }
    public function getItems(){
        return $this->items;
    }
}
?>