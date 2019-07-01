<?php 
	class Calculator //kelas Calculator
	{
		private $operands; //properti $operands
		private $operator; //properti $operator
		private $hasil; //properti $hasil
		function setOperator(OperatorInterface $operator) { //method setOperator
			$this->operator = $operator;
		}

		function setOperands($operands) { //method setOperands
			$this->operands = $operands;
		}
		
		function calculate() { //method calculate
			$this->hasil = $this->operator->run($this->operands);
		}

		function getResult() { //method getResult
			return $this->hasil;
		}
	}
?>