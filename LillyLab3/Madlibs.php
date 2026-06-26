<?php
$pageTitle = "Mad-Libs";
require_once "_header.php";
?>
			<main class="w3-container">
				<link rel = "stylesheet" type = "text/css" href = "madLibs.css" />
				<script type="text/javascript"
					src = "madLibs.js">
				</script>

				<body>
					<h1> Crazy MadLibs: Gamer Things </h1>
							<form action="">
								<fieldset>
									<label for = "friendName"> A Friends Name </label>
									<input type = "text"
										id = "friendName"/>
									
									<label for = "dayAdj"> Adjective About Your Day </label>
									<input type = "text"
										id = "dayAdj"/>
									
									<label for = "secFriendName"> A Second Friends Name </label>
									<input type = "text"
										id = "secFriendName"/>
									
									<label for = "game"> Your Favorite Game </label>
									<input type = "text"
										id = "game"/>
									
									<label for = "number"> A Random Number </label>
									<input type = "text"
										id = "number"/>
									
									<label for = "gameItem"> An Item From Your Game </label>
									<input type = "text"
										id = "gameItem"/>
									
									<label for = "liquid"> A Liquid </label>
									<input type = "text"
										id = "liquid"/>
									
									<label for = "emotion"> An Emotion </label>
									<input type = "text"
										id = "emotion"/>
									
									<button onclick = "tellStory()" 
										type = "button">
										Tell the Story
									</button>
								</fieldset>
							</form>
				
						<div id = "output" > 
				
					</div>	
				</body>
			</main>
	<div class="clear"></div>

<?php require_once "_footer.php"; ?>