
function tellStory(){
	//Gathers the information
	var friendName = document.getElementById("friendName");
	var dayAdj = document.getElementById("dayAdj");
	var secFriendName = document.getElementById("secFriendName");
	var game = document.getElementById("game");
	var number = document.getElementById("number");
	var gameItem = document.getElementById("gameItem");
	var liquid = document.getElementById("liquid");
	var emotion = document.getElementById("emotion");
	var output = document.getElementById("output");
	
	//Variables for story
	var firstFriend = friendName.value;
	var dayAdj = dayAdj.value;
	var secondFriend = secFriendName.value;
	var game = game.value;
	var number = number.value;
	var gameItem = gameItem.value;
	var liquid = liquid.value;
	var emotion = emotion.value;
	
	
	var story = "Hey " + firstFriend + ", <br/>";
	story += "I hope you are having a " + dayAdj + " day! <br/>" ; 
	story += "Last night I was hanging with " + secondFriend +  " playing " +  game + ", and you MISSED IT! <br/>" ;
	story += secondFriend + " had to respawn " + number + " times! <br/>";  
	story += "Because no matter how hard they tried, they could not get the " + gameItem + " to work on " + game + ". <br/>" ;
	story += "They kept pouring " + liquid + " all over it! It was a very " + emotion + " time. <br/>" ;
	story += "Well other than that, there was not much that happened! <br/> ";
	story += "Anywho, how has your day been?";
	
	//Tells the Story
	output.innerHTML = story;
}