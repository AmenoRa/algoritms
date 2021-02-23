<?php
	include('RyF.php');


	$RyF = RyF::Instance();

	

	$add = $RyF->Insert('test')
				->values(array('name'=>'some','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia non velit optio nam doloribus illo expedita recusandae voluptate dicta, distinctio.'))
				->execute();

	$update = $RyF->Update('test')
				->values(array('name'=>'some tester'))
				->where(array('id'=>'10'))
				->execute();

	$delete = $RyF->Delete('test')
				->where(array('id'=>1))
				->execute();

	$id = 1;
	$data = $RyF->Select('test')
				->where(array('id'=>$id))
				->execute();
				
	echo '<pre>';
	var_dump($data);
	echo '</pre>';

	$pdo = $RyF->get_pdo();
	$query = $pdo->prepare('SELECT * FROM `test`');
	$query->execute();

	echo '<pre>';
	var_dump($query->fetchAll());
	echo '</pre>';
?>