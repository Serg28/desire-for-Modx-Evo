<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.04.2017
 * Time: 22:32
 */
class desire
{

    public $items;
    public $storage;
    public $modx;
    public $cookieKey = 'desire-list';

    public function __construct($modx,$storage){
        $this->modx = $modx;
        $this->storage = $storage;
        $items = [];
        if(!empty($_COOKIE[$this->cookieKey])){
            $items = json_decode($_COOKIE[$this->cookieKey],true);
        }
        $this->items = $items;
    }
    public function addToDesire($id){
        $this->items[$id]=$id;
        $this->save();
    }
    public function deleteFromDesire($id){
        if(!empty($this->items[$id])){
            unset($this->items[$id]);
        }
        $this->save();
    }
    public function setPlaceholder(){
        $this->modx->setPlaceholder($this->cookieKey,implode(',',$this->items));
    }
    public function getList(){
        return json_encode($this->items);
    }
    public function save(){
        setcookie ($this->cookieKey, json_encode($this->items),time()+3600*24*30,"/");
    }
}