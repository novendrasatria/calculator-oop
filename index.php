<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kalkulator PBO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="assets/css/jumbotron-narrow.css" rel="stylesheet">
	<style type="text/css">
		#result{
			width: 100%;
			margin-bottom: 5px;
		}
		.btn {
			width:23%;
			margin-bottom: 10px;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="header clearfix">
			
			<h1 class="text-muted"><center>Kalkulator PBO</center></h1>
		</div>
		<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="text" class="" id="result" placeholder="0" readonly>
				</div>
				<div class="col-sm-4 col-sm-offset-4">					
					<button class="btn btn-default numberBtn" type="submit">7</button>
					<button class="btn btn-default numberBtn" type="submit">8</button>
					<button class="btn btn-default numberBtn" type="submit">9</button>
					<button id="divider" class="btn btn-default operatorBtn" type="submit">/</button>
				</div>
				<div class="col-sm-4 col-sm-offset-4">					
					<button class="btn btn-default numberBtn" type="submit">4</button>
					<button class="btn btn-default numberBtn" type="submit">5</button>
					<button class="btn btn-default numberBtn" type="submit">6</button>
					<button id="multiplier" class="btn btn-default operatorBtn" type="submit">x</button>
				</div>
				<div class="col-sm-4 col-sm-offset-4">					
					<button class="btn btn-default numberBtn" type="submit">1</button>
					<button class="btn btn-default numberBtn" type="submit">2</button>
					<button class="btn btn-default numberBtn" type="submit">3</button>
					<button id="subtractor" class="btn btn-default operatorBtn" type="submit">-</button>
				</div>
				<div class="col-sm-4 col-sm-offset-4">					
					<button class="btn btn-default numberBtn" type="submit">0</button>
					<button class="btn btn-default floatBtn" type="submit">.</button>
					<button class="btn btn-default resultBtn" type="submit">=</button>
					<button id="adder" class="btn btn-default operatorBtn" type="submit">+</button>
				</div>
		</div>
		<div class="row marketing">
			
		</div>
		<footer class="footer">
			<p><i>_Novendra Satria Putra/ 175610028/ Sistem Informasi</i></p>
		</footer>

	</div> <!-- /container -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	
	var isFloat = false; //True jika hasilnya float
	var operator = '';
	var operatorTekan = false; //True jika tombol terakhir yang ditekan adalah operator
	var hasilTekan = false; //Benar jika tombol terakhir yang ditekan adalah tombol hasil (=)
	var OperandPertama = '';
	var OperandKedua = '';
	function ajaxGetResult(OperandPertamaAjax, OperandKeduaAjax, operatorAjax) {
		//alert(OperandPertamaAjax);
    	$.ajax({
    		type: 'GET',
    		url: 'CalculatorController.php',
    		data: 'OperandPertama=' + OperandPertamaAjax + '&OperandKedua=' + OperandKeduaAjax + '&operator=' + operatorAjax,
    		success: function(response){    			
    			$("#result").val(response);
    			OperandPertama = response;  
    		}
    	});

    };
    $(document).ready(function() {
    	$("#result").val('');
	});
	$(".numberBtn").click(function() {
		if (operatorTekan) {
			$("#result").val('');
		};
		oldResult = $("#result").val();
		newResult = oldResult += $(this).html();
	   	$("#result").val(newResult);
	   	operatorTekan = false;
    });

    $(".floatBtn").click(function() {
		if (!isFloat) {			
			if ($("#result").val() == "" || operatorTekan) {
				$("#result").val(0+$(this).html());
				operatorTekan = false;
			}
			else {
				$("#result").val($("#result").val()+$(this).html());
			}
	   		isFloat = true;
		}
    });
    $(".operatorBtn").click(function() {
    	if (!operatorTekan && OperandPertama != '') {
    		OperandKedua = $("#result").val();
    		ajaxGetResult(OperandPertama, OperandKedua, operator);

    	};
    	operatorTekan = true;
    	OperandPertama = $("#result").val();
    	operator = $(this).attr("id");
    	isFloat = false;
    	hasilTekan = false;
    });
    $(".resultBtn").click(function() {
    	if (!hasilTekan && OperandPertama) {
    		OperandKedua = $("#result").val();
    		ajaxGetResult(OperandPertama, OperandKedua, operator);
    		hasilTekan = true;
    		operatorTekan = true;
    	};
    });
</script>
</body>
</html>