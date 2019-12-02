# Buto-Plugin-WfArray
Handle arrays.

## PHP
```
/**
 * Create object.
 */
$data = new PluginWfArray();
/**
 * Set data.
 */
$data->set('name', 'James');
$data->set('travel/2018', array('London', 'Stockholm'));
$data->set('travel/2018/', 'Barcelona');
/**
 * Merge.
 */
$data->merge(array('name' => 'John'));
/**
 * Set by tag.
 */
$data->set('colors', 'rs:colors');
$data->setByTag(array('colors' => array('red', 'blue', 'green')));
```
