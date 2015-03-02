<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Hubububu Search</title>
		<link rel="stylesheet" type="text/css" href="./assets/styles/css/styles.css">
		<script type="text/javascript" src="./assets/js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="./assets/js/main.js"></script>
	</head>
	<body>
		<h1>Hubububu Search</h1>

		<div id="form-container">
			<?php
				echo form_open();

				$params = array(
						'name' => 'query',
						'class' => 'search_input',
						'placeholder' => 'Search anything...',
						'id' => 'query'
					);
				echo form_input($params);
				echo form_submit('submit', 'Submit', "class='submit'");
				echo form_close();
			?>
		</div>

		<div id="repeat-result"></div>

		<div id="results-container">
			
		</div>
	</body>
</html>