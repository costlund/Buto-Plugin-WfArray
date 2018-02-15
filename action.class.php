<?php

/**
 * Handle yml files easily. 
 */
class PluginWfArray{
  public $array = null;
  /**
   * 
   * @param type $array
   */
  function __construct($array = array()) {
    $this->array = $array;
  }
  /**
   * 
   * @param type $path_to_key
   * @return type
   */
  public function get($path_to_key = null){
    if(strlen($path_to_key)){
      return wfArray::get($this->array, $path_to_key);
    }else{
      return $this->array;
    }
  }
  
  public function size($path_to_key = null){
    if(strlen($path_to_key)){
      return sizeof(wfArray::get($this->array, $path_to_key));
    }else{
      return sizeof($this->array);
    }
  }
  
  /**
   * Filter by key and value.
   * @param type $filter_by_key
   * @param type $filter_by_value
   */
  public function filter($filter_by_key, $filter_by_value){
    if($this->array){
      foreach ($this->array as $key => $value) {
        if(wfArray::get($value, $filter_by_key) && wfArray::get($value, $filter_by_key)!=$filter_by_value){
          $this->array = wfArray::setUnset($this->array, $key);
        }
      }
    }
  }
  
  
  /**
   * 
   * @param type $value
   * @param type $path_to_key String is the path to array key. If true unassociative array key will be set.
   */
  //public function set($value, $path_to_key = null){
  public function set($path_to_key, $value){
    if($path_to_key || $path_to_key === 0){
      if($path_to_key === true){
        $this->array[] = $value;
      }else{
        $this->array = wfArray::set($this->array, $path_to_key, $value);
      }
    }else{
      $this->array = $value;
    }
  }
  
  public function dump($path_to_key = null){
    if(strlen($path_to_key)){
      wfHelp::yml_dump(wfArray::get($this->array, $path_to_key));
    }else{
      wfHelp::yml_dump($this->array);
    }
  }
  public function sort($key, $desc = false){
    if($this->get()){
      $this->set(null, wfArray::sortMultiple($this->get(), $key, $desc));
    }
  }
  
  /**
   * Unset function.
   * @param type $path_to_key
   */
  public function setUnset($path_to_key){
    $this->array = wfArray::setUnset($this->array, $path_to_key);
  }
  
  /**
   * Set by id.
   * @param type $id
   * @param type $key
   * @param type $value
   */
  public function setById($id, $key = null, $value){
    wfPlugin::includeonce('wf/arraysearch');
    $wf_arraysearch = new PluginWfArraysearch();
    $wf_arraysearch->data = array('key_name' => 'id', 'key_value' => $id, 'data' => $this->array);
    $data = $wf_arraysearch->get();
    if(sizeof($data)>0){
      $path_to_key = $data[0];
      $path_to_key = substr($path_to_key, 1);
      $path_to_key = str_replace('/attribute/id', '', $path_to_key);
      if($key){
        $this->set($path_to_key.'/'.$key, $value);
      }else{
        $this->set($path_to_key, $value);
      }
    }else{
      echo 'Could not find element with id '.$id.'.<br>';
    }
  }
}