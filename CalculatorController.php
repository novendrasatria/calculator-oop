<?php
	function __construct($class) { //kelas dengan method konstruktor untuk autoloader
    	include 'classes/' . $class . '.php';
	}
	spl_autoload_register('__construct'); //autoloader supaya terakses sec otomatis

	$c = new Calculator(); //pembuatan objek Calculator dari kelas Calculator

	$data = $_GET; //menggunakan method GET
/*Menggunakan Fungsi isset() untuk memeriksa apakah objek form telah didefenisikan
atau telah di-set sebelumnya,Fungsi isset() akan menghasilkan nilai true jika sebuah variabel 
telah didefenisikan, dan false jika variabel tersebut belum dibuat.*/

	if (isset($data['OperandPertama']) && isset($data['OperandKedua'])) { 
		$operands = array($data['OperandPertama'], $data['OperandKedua']);
		$c->setOperands($operands);
	}

	if (isset($data['operator'])) {
		switch ($data['operator']) {
			case 'adder':
			$c->setOperator(new Adder()); //set operator dengan kelas Adder(penjumlahan)
			break;
			case 'subtractor':
			$c->setOperator(new Subtractor()); //set operator dengan kelas Subtractor(pengurangan)
			break;
			case 'multiplier':
			$c->setOperator(new Multiplier()); //set operator dengan kelas Multiplier(perkalian)
			break;
			case 'divider':
			$c->setOperator(new Divider()); //set operator dengan kelas Divider(pembagian)
			break;

		}
	}
	
	$c->calculate();
	echo $c->getResult();
?>