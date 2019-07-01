<?php 
/* Kelas Multiplier yang merupakan kelas untuk operator perkalian
 yang mengimplementasi method dari interface OperatorInterface*/
	class Multiplier implements OperatorInterface
	{
		function run($operands){
			return (float)$operands[0] * $operands[1];
		}
	}
?>