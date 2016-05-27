<div id="passedOverlay" class="overlay">
	<div id="overlayTitle">
		<h1>Success</h1>
	</div>

	<h2 class="innerText">
	You scored: <span id="cScore"></span> / <span id="scorePass"></span>
	</h2>
	
	<div id="options">
		<a class="button" id="quit" href="index.php" rel="external">Quit&nbsp</a>
		<?php
			$level++;
			if ($level <= 3) {
				echo '<a name="link" class="button" id="start" href="level'.$level.'.php" rel="external">Next</a>';
			} else {
				echo '<a name="link" class="button" id="start" href="endless.php" rel="external">Next</a>';
			}
		?>
	</div>
</div>