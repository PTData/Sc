<?php
include './Especifico.php';
//$hora = new Horas('2013-04-22 12:29:17');
//$hora->get_horas();

//include './db.class.php';
//db::nova_ligacao('localhost', 'root', 'eurorscg', 'data_db');

//$db= new Conexao();
//$db->select('tabela', array('texto'));

$db = new Ispecifico();

$resultado = $db->select('select * from pessoa');
$db->printr($resultado);

$rs = $db->select('select * from pessoa where id_pessoa = 5');
$db->printr($rs);
# update
//$update = $db->update("insert into pessoa (nome_pessoa, sexo_pessoa, data_pessoa) values('Pedro', '2', '2013-04-29 00:00:00')", TRUE);



$db->close();

## League
include './Classes/Team.Class.php';
$team = new Team();
$team->players();



?>
