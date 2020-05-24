<?php
	// debugger function
	function debugger($data, $is_die = false) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if ($is_die) {
			exit();
		}
	}

	// sanitize function
	function sanitize($str) {
		return trim(stripcslashes(strip_tags($str)));
	}

	// tokenize fucntion
	function tokenize($len = 100) {
		$char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$char_len = strlen($char);
		$token = '';
		for ($i = 0; $i < $len; $i++) {
			$token .= $char[rand(0, $char_len - 1)] ;
		} 
		return $token;
	}

	// redirect function
	function redirect($loc, $key="", $message="") {
		$_SESSION[$key] = $message;
		@header('location: '.$loc);
	}

	// message flash function start
	function flashMessage() {
		$message_type = array('error', 'warning', 'success');
		foreach($message_type as $key) {
			if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
				echo "<span class='alert alert-".$key."'>".$_SESSION[$key]."</span>";
				unset($_SESSION[$key]);
				break;
			}
		}
?>

	<script type="text/javascript">
		setTimeout(function() {
			$('.alert').slideUp('slow');
		},3000);
	</script>


<?php
	}
	// message flash function end
?>