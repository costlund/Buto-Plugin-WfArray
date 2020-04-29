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


## Method

### setByTag

Yml data

```
-
  type: span
  innerHTML: rs:minutes
-
  type: span
  innerHTML: rs:calc_date_to/minutes
```

```
$element->setByTag(array('minutes' => 33, 'calc_date_to' => array('minutes' => 44)));
```

```
-
  type: span
  innerHTML: 33
-
  type: span
  innerHTML: 44
```
