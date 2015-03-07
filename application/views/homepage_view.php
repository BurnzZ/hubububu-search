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
			<div id="algo-1">
				<h3>Algo 1</h3>
				<div class="pseudo-code">base_score() - ( unmatched() / total() )</div>
				<span class="num-results"></span>
				<table>
					<tbody>
					</tbody>
				</table>
			</div>


			<div id="algo-2">
				<h3>Algo 2</h3>
				<div class="pseudo-code">base_score() - ( unmatched() / total() ) <br> - ( trimmed[ unmatched() / total() ] / 10  )</div>
				<span class="num-results"></span>
				<table>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>