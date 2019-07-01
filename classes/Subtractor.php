<?php 
/* Kelas Subtractor yang merupakan kelas untuk operator pengurangan
 yang mengimplementasi method dari interface OperatorInterface*/
	class Subtractor implements OperatorInterface
	{
		function run($operands){
			return (float)$operands[0] - $operands[1];
		}
	}
?>