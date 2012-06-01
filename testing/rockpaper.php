<!html>
<head>
<title>Row Sham Bow - Branch Testing</title>
<link href="assets/css/rockpaper.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var images = new Array()
		function preload() {
			for (i = 0; i < preload.arguments.length; i++) {
				images[i] = new Image()
				images[i].src = preload.arguments[i]
			}
		}
		preload(
			"assets/images/miscStuff/rockpaper/rock.gif",
			"assets/images/miscStuff/rockpaper/paper.gif",
			"assets/images/miscStuff/rockpaper/scissor.gif"
		)
		
		$('#sp').click(function(){
			$('#single-player').show();
		});
		$('#spgo').click(function(){
			var user1choice = parseInt($("input[@name=choice]:checked").val());
			var user2choice = parseInt(randChoice());

			$('#side1img').html(getType(user1choice));
			$('#side2img').html(getType(user2choice));
			
			var roundResult = parseInt(score(user1choice,user2choice));
			var user1score = parseInt($('#user1score').html());
			var user2score = parseInt($('#user2score').html());

			switch(roundResult)
			{
				case 0:
					alert('This round was a tie.');
					$("input[@name=choice]:checked").prop('checked', false);
				break;
				case 1:
					alert('YOU SUCK, you lose this round.');
					var newScore = user2score + 1;
					$('#user2score').html(newScore);
					$("input[@name=choice]:checked").prop('checked', false);
				break;
				case 2:
					alert('YOU ROCK, you win this round.');
					var newScore = user1score + 1;
					$('#user1score').html(newScore);
					$("input[@name=choice]:checked").prop('checked', false);
				break;
			}
			var user1scorenew = parseInt($('#user1score').html());
			var user2scorenew = parseInt($('#user2score').html());
			if(user1scorenew == 3 || user2scorenew == 3)
			{
				if(user2scorenew == 3)
				{
					alert("You Lose");
				}
				else
				{
					alert("You Win");	
				}
				
				$('#user1score').html('');
				$('#user2score').html('');
				$('#side1img').html('');
				$('#side2img').html('');
				$("input[@name=choice]:checked").prop('checked', false);
			}
		});
	});
	
	function randChoice()
	{
		var choice = Array();
		choice[0] = 'rock';
		choice[1] = 'paper';
		choice[2] = 'scissors';
		
		return Math.floor ( Math.random() * choice.length ); 
	}

	function getType(num)
	{
		switch(num)
		{
			case 0:
				return '<img src="assets/images/miscStuff/rockpaper/rock.gif" />';
			break;
			case 1:
				return '<img src="assets/images/miscStuff/rockpaper/paper.gif" />';
			break;
			case 2:
				return '<img src="assets/images/miscStuff/rockpaper/scissor.gif" />';
			break;
		}
	}
	//returns 0,1 or 2 0 = tie, 1 = lose, 2 = win
	//@params user1choice,user2choice - values: 0 = Rock, 1 = Paper, 2 = Scissors
	function score(user1choice,user2choice)
	{
		switch(user1choice)
		{
			case 0:
				switch(user2choice)
				{
					case 0:
						return 0;
					break;
					case 1:
						return 1;
					break;
					case 2:
						return 2;
					break;
				}
			break;
			case 1:
				switch(user2choice)
				{
					case 0:
						return 2;
					break;
					case 1:
						return 0;
					break;
					case 2:
						return 1;
					break;
				}
			break;
			case 2:
				switch(user2choice)
				{
					case 0:
						return 1;
					break;
					case 1:
						return 2;
					break;
					case 2:
						return 0;
					break;
				}
			break;
		}
	}

</script>
</head>

<body>
		<div id="middle">
			<h2 style="color:#fff;">Rock - Paper - Scissors</h2>
			
			<h3 style="color:#fff;"><a href="#" id="sp">Single Player</a> - MultiPlayer</h3>
			<div id="single-player" style="display:none;">
					<div id="single-player-top">
						<div id="side1">
							Player:<br />
							<div id="side1img">
								
							</div>
							Score: <span id="user1score">0</span>
						</div>
						<div id="side2">
							AI:<br />
							<div id="side2img">
								
							</div>
							Score: <span id="user2score">0</span>
						</div>
					</div>

					<div id="single-player-bottom" style="margin-top:20px;">
						<input type="radio" name="choice" value="0" /> Rock
						<input type="radio" name="choice" value="1" /> Paper
						<input type="radio" name="choice" value="2" /> Scissors
						<input type="button" value="Go" id="spgo" />
					</div>
			</div>
		</div>
</body>
</html>