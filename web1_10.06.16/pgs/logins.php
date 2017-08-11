<?php
require_once("../tmp/funcoes.php");
testaLogin();
require_once("../tmp/tabelas.php");
?>

						<?php 
						$conn = conectaDB();
						$query = query($conn);
						logins($query,$conn);
						?>
