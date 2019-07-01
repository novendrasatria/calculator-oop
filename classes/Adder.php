<?php 
/* Kelas Adder yang merupakan kelas untuk operator penjumlahan
 yang mengimplementasi method dari interface OperatorInterface*/
	class Adder implements OperatorInterface 
	{
		function run($operands){
			return (float)$operands[0] + $operands[1];
		}
	}
?>