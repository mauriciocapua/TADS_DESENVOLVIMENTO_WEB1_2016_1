<?php
function ambos($result,$conn){
			if($result) { 
				echo '<table>';
				echo '<tr><td>Login:</td><td>Senha:</td></tr>';
				while ($row=pg_fetch_assoc($result)) {
						echo '<tr>';
            			echo '<td>'.$row['login'].'</td><td>'.$row['senha'].'</td>';
            			echo '</tr>';
        		}
        		echo '</table>';
    	}
    		pg_close($conn);
}

function logins($result,$conn){
			if($result) { 
				echo '<table>';
				echo '<tr><td>Login:</td></tr>';
				while ($row=pg_fetch_assoc($result)) {
						echo '<tr>';
            			echo '<td>'.$row['login'].'</td>';
            			echo '</tr>';
        		}
        		echo '</table>';
    	}
    		pg_close($conn);
}

function senhas($result,$conn){
			if($result) { 
				echo '<table>';
				echo '<tr><td>Senha:</td></tr>';
				while ($row=pg_fetch_assoc($result)) {
						echo '<tr>';
            			echo '<td>'.$row['senha'].'</td>';
            			echo '</tr>';
        		}
        		echo '</table>';
    	}
    		pg_close($conn);
}
?>
