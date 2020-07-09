<?php
include("header.php");
?>
<html>
<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<center><h2>Resultados para "<?php echo $_GET['query']; ?>"</h2><br /></center><hr>
			<?php
			$query = $_GET['query'];

			$min_length = 3;

			if (strlen($query) >= $min_length) {
				$query = htmlspecialchars($query);

				$query = mysqli_real_escape_string($conexao, $query);

				$raw_results = mysqli_query($conexao, "SELECT * FROM users WHERE (`nome` LIKE '%" . $query . "%')") or die(mysqli_error());

				if (mysqli_num_rows($raw_results) > 0) {
					while ($results = mysqli_fetch_array($raw_results)) {
						echo '<a href="profile.php?id=' . $results["id"] . '" name="p"><br /><p name="p"><h3>' . $results["nome"] . ' (' . $results["apelido"] . ')</h3></p><br /></a><br /><hr /><br />';
					}
				} else {
					echo "<br /><h3>Não foram encontrados resultados...</h3>";
				}
			} else {
				echo "<br /><h3>Escreva no mínimo 3 letras...</h3>";
			}
			?>
		</div>
	</div>
</body>

</html>