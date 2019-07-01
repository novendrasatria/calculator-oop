<?php 
/* Kelas Divider yang merupakan kelas untuk operator pembagian
 yang mengimplementasi method dari interface OperatorInterface*/
	class Divider implements OperatorInterface
	{
		function run($operands){
			return (float)$operands[0] / $operands[1];
		}
	}
?>