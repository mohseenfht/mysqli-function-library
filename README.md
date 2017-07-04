# mysqli-function-library
mysqli function library for easy inserting , updating , selecting and deleting records

#How to use this library into your project:
1)	Include the db.php into your project
2)	Change the database configuration with your database connection details
3)	Create a object of the DB class I,e  
$db = new DB;
4)	To Save a data in table:

#Syntax  of save method:
$db->save(‘table_name’ , array_of_parameter_to_insert);

#Example :
$insertParameter = array(‘column_1’ => ‘value_1’ , ‘column_2’ => ‘value_2’ , ‘column_3’ => ‘value_3’ , … );
$db->save(‘demo’ , $insertParameter);

#Note : it will return last inserted id of the record

5)	To Update  a data in table for a particular record:  

Syntax  of update  method:
$db->update(‘table_name’ , array_of_parameter_to_update  , array_of_where_ parameter);

Example :
$updateParameter = array(‘column_1’ => ‘value_1’ , ‘column_2’ => ‘value_2’ , ‘column_3’ => ‘value_3’ , … );
$whereParameter = array(‘column_1’ => ‘value_1’ , ‘column_2’ => ‘value_2’ , ‘column_3’ => ‘value_3’ , …);
$db->update(‘demo’ , $ updateParameter ,$ whereParameter);

6)	To Delete  a data in table for a particular record:  

Syntax  of delete  method:
$db->delete(‘table_name’ , array_of_where_parameter);

Example :
$whereParameter = array(‘column_1’ => ‘value_1’ , ‘column_2’ => ‘value_2’ , ‘column_3’ => ‘value_3’ , …);
$db->delete(‘demo’ , $ updateParameter ,$ whereParameter);



7)	To Select all rows  from  table:  

Syntax  of findAll  method:
$db->findAll(‘table_name’ , array_of_column_to_fetch , array_of_where_parameter , array_order_parameter);

Example :
a)	$fetchParameter = array(‘column_1’  , ‘column_2’, ‘column_3’, …); 
// this will fetch specified columns

b)	$fetchParameter = array(‘*’); 
// this will fetch all  column

$whereParameter = array(‘column_1’ => ‘value_1’ , ‘column_2’ => ‘value_2’ , ‘column_3’ => ‘value_3’ , …);
//You can send null if you don’t have where condition

$orderParameter = array(‘column_name’ ,  ‘sort_order ’);
// sort_order can be ASC or DESC

$result = $db-> findAll (‘demo’ , $ fetchParameter,$ whereParameter , $orderParamert);
//result will be  array of object

8)	To Select One rows  from  table:  

Syntax  of findOne  method:
$db->findOne(‘table_name’ , array_of_column_to_fetch , array_of_where_parameter , array_order_parameter);

Example :
a)	$fetchParameter = array(‘column_1’  , ‘column_2’, ‘column_3’, …); 
// this will fetch specified columns

b)	$fetchParameter = array(‘*’); 
// this will fetch all  column

$whereParameter = array(‘column_1’ => ‘value_1’ , ‘column_2’ => ‘value_2’ , ‘column_3’ => ‘value_3’ , …);
//You can send null if you don’t have where condition

$orderParameter = array(‘column_name’ ,  ‘sort_order ’);
// sort_order can be ASC or DESC

$result = $db-> findOne (‘demo’ , $ fetchParameter,$ whereParameter , $orderParamert);
//result will be  single record



