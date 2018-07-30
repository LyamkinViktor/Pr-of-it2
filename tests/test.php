<?php
require __DIR__ . '/../autoload.php';


/*
 *     public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        $res = $sth->execute($params);
        if (true == $res) {
            return true;
        } else {
            $arr = $sth->errorInfo();
            var_dump($arr);
            return false;
        }
    }
 */

$data = new \App\Db();


$query1 = 'DELETE FROM `persons` WHERE `persons`.`id` = 1;';
$test1 = $data->execute($query1);
echo $query1; //DELETE FROM `persons` WHERE `persons`.`id` = 1;
var_dump($test1);
// boolean true



$query2 = 'INSERT INTO `person` (`id`, `lastname`, `age`) VALUES (NULL, \'Потапова\', \'29\')'; //указано несуществующее имя таблицы person
$test2 = $data->execute($query2);
echo $query2; //INSERT INTO `person` (`id`, `lastname`, `age`) VALUES (NULL, 'Потапова', '29')
/*
 * Информация об ошибке
 * array (size=3)
  0 => string '42S02' (length=5)
  1 => int 1146
  2 => string 'Table 'php2.person' doesn't exist' (length=33)
 */
var_dump($test2);
// boolean false



$query3 = 'INSERT INTO `persons` (`id`, `lastname`, `age`) VALUES (NULL, \'\', \'\')'; //указаны пустые данные
$test3 = $data->execute($query3);
echo $query3; // INSERT INTO `persons` (`id`, `lastname`, `age`) VALUES (NULL, '', '')
/*
 * Информация об ошибке
 * array (size=3)
  0 => string 'HY000' (length=5)
  1 => int 1366
  2 => string 'Incorrect integer value: '' for column 'age' at row 1' (length=53)
 */
var_dump($test3);
// boolean false


$query4 = 'UPDATE `persons` SET `age` = \'29\' WHERE `persons`.`id` = 2';
$test4 = $data->execute($query4);
echo $query4; // UPDATE `persons` SET `age` = '29' WHERE `persons`.`id` = 2
var_dump($test4);
// boolean true


