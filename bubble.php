<html>
<head>
	<script src="js/jquery.js"></script>
	<style type="text/css">
		html {
			font-family: Ubuntu, sans-serif;
			-webkit-animation: fadein 0s;
			-moz-animation: fadein 0s;
			-ms-animation: fadein 0s;
			-o-animation: fadein 0s;
			animation: fadein 0s;
		}

		.bubble {
			position: relative;
			margin-left: 300px;
			width: 300px;
			min-height: 120px;
			padding: 0px;
			background: #007fff;
			border-radius: 25px;
		}

		.bubble span {
			display: block;
			margin-left: auto;
			font-size: 18px;
			text-align: center;
			color: #FFF;
		}

		.bubble img {
			display: block;
			margin: auto;
			max-width: 95%;
		}

		.bubble p {
			display: block;
			margin: auto;
			font-size: 16px;
			text-align: center;
			color: #FFF;
		}

		.bubble2 {
			position: relative;
			width: 300px;
			min-height: 120px;
			padding: 0px;
			background: #CCC;
			border-radius: 25px;
		}

		.bubble2 span {
			display: block;
			margin-left: auto;
			font-size: 18px;
			text-align: center;
			color: #333;
		}

		.bubble2 img {
			display: block;
			margin: auto;
			max-width: 95%;
		}

		.bubble2 p {
			display: block;
			margin: auto;
			font-size: 16px;
			text-align: center;
			color: #333;
		}
	</style>
</head>

<body>
	<div id="mensagens"></div>
	<a href="#" id="bottom"></a>
</body>
<script>
	$(document).ready(function() {
		buscaMensagensChat();
	});

	var timeout = setInterval(buscaMensagensChat, 1000);

	function buscaMensagensChat() {
		$('#mensagens').load('ajax/buscaChatMensagens.php?from=<?php echo $_GET['from']?>#bottom');
	}


</script>
</html>