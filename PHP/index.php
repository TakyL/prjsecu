
<html>
    <head>
    <?php

$db_config = array();
$db_config['SGBD'] = 'mysql';
$db_config['HOST'] = 'devbdd.iutmetz.univ-lorraine.fr';
$db_config['DB_NAME'] = 'leduc41u_projetsecu';
$db_config['USER'] = 'leduc41u_appli';
$db_config['PASSWORD'] = '32010660';
// ==========================
// connection avec PDO
try
{
$objPdo = new PDO($db_config['SGBD'] .':host='. $db_config['HOST']
.';dbname='. $db_config['DB_NAME'], $db_config['USER'],
$db_config['PASSWORD']) ;
unset($db_config);
echo "ok";
}
catch( Exception $exception )
{
die($exception->getMessage()) ;
}
?>
    </head>

</html>

