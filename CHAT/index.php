<!DOCTYPE html>
<html>
<head>
	<title>CHAT</title>
	<meta charset="utf-8">
	<?php
	$connect = mysqli_connect("127.0.0.1", "root", "root", "chat");
	?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<style type="text/css">
	.form {
		zoom: 200%;
	}
	body {
		text-align: center;
	}
	#messages_chat {
		zoom: 150%;
	}
</style>

<br>
<br>


<script type="text/javascript">
	function GetSelect() {
		$("#messages_chat").load("/ #messages_chat");
	}
	GetSelect();
	var interval = 1000;
	setInterval('GetSelect()', interval);
</script>

<div id="messages_chat">

	<?php

	$sel_m = mysqli_query($connect, "SELECT * FROM `messages`");
	while ($sel_m_wh = mysqli_fetch_assoc($sel_m)) {
		?>
		<p><b><?php echo $sel_m_wh['user_name']; ?>:</b> <?php echo $sel_m_wh['message']; ?></p>
		<?php
	}

	?>
	
</div>

<br>

<form class="form" method="post" action="/">
	<input type="text" name="user_name" placeholder="Name">
	<br>
	<textarea name="message" placeholder="Message"></textarea>
	<br>
	<button name="subSendMessage" type="submit">Send</button>
</form>

<?php


if (isset($_POST['subSendMessage'])) {
	if ($_POST['user_name'] == '') {
		echo "Write name!";
	} elseif ($_POST['message'] == '') {
		echo "Write message!";
	} else {
		$name = $_POST['user_name'];
		$message = $_POST['message'];
		
		$name = htmlspecialchars($name);
		$message = htmlspecialchars($message);

		mysqli_query($connect, "INSERT INTO `messages` (`id`, `user_name`, `message`, `date`) VALUES (NULL, '$name', '$message', current_timestamp());");
		header('Location:/');
	}
}


?>

</body>
</html>
