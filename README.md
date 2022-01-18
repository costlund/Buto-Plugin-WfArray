# Buto-Plugin-WfArray
Handle arrays.

## Methods
### Object
```
$data = new PluginWfArray();
```
Add data on construct.
```
$data = new PluginWfArray(array('name' => 'Sandra'));
```
### set
How to set data.
```
$data->set('name', 'James');
$data->set('travel/2018', array('London', 'Stockholm'));
$data->set('travel/2018/', 'Barcelona');
```
### get
How to get data.
```
echo $data->get('name');
```
Output
```
James
```
### merge
```
$data->merge(array('name' => 'John'));
```
### setByTag
Yml data to change with method setByTag().
```
-
  type: span
  innerHTML: rs:minutes
-
  type: span
  innerHTML: rs:calc_date_to/minutes
```
PHP code.
```
$element->setByTag(array('minutes' => 33, 'calc_date_to' => array('minutes' => 44)));
```
Result
```
-
  type: span
  innerHTML: 33
-
  type: span
  innerHTML: 44
```
### is_set
To check if a key exist.
Returns true or false.
```
$element->is_set('calc_date_to/minutes');
```
