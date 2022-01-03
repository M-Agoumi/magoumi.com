<!DOCTYPE html>
<html>
<style>
	body, html {
		height: 100%;
		margin: 0;
	}

	.bgimg {
		background-image: url('https://www.w3schools.com/w3images/forestbridge.jpg');
		height: 100%;
		background-position: center;
		background-size: cover;
		position: relative;
		color: white;
		font-family: "Courier New", Courier, monospace;
		font-size: 25px;
	}

	.topleft {
		position: absolute;
		top: 0;
		left: 16px;
	}

	.bottomleft {
		position: absolute;
		bottom: 0;
		left: 16px;
		-webkit-user-select: none; /* Safari */
		-moz-user-select: none; /* Firefox */
		-ms-user-select: none; /* IE10+/Edge */
		user-select: none; /* Standard */
	}

	.middle {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
	}

	hr {
		margin: auto;
		width: 40%;
	}
	@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap');

	* {
		margin: 0;
		padding: 0;
	}

	html {
		font-size: 20px;
		font-family: 'Roboto', sans-serif;
	}

	body {
		background: linear-gradient(90deg, #ff9966, #ff5e62);
	}

	.wrapper {
		height: 100vh;
		min-width: 600px;
		position: absolute;
		display: none;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		z-index: 10;
	}

	#bluer {
		height: 100%;
		width: 100%;
		background: rgba(0,0,0,0.7);
		position: absolute;
		top: 0;
		left: 0;
		display: none;
		cursor: pointer;
	}

	.fas.fa-envelope {
		color: #fff;
		font-size: 2rem;
		background: #333;
		padding: 1rem;
		border-radius: 100%;
		margin: 0 0 1rem 0;
	}

	.card-content {
		max-width: 30rem;
		background-color: #fff;
		position: relative;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		border-radius: 1rem;
		padding: 4rem .5rem;
		box-shadow: 1px 1px 2rem rgba(0,0,0,.3);
		text-align: center;
	}

	.card-content h1 {
		text-transform: uppercase;
		margin: 0 0 1rem 0;
	}

	.card-content p {
		font-size: .8rem;
		margin: 0 0 2rem 0;
	}

	input {
		padding: .8rem 1rem;
		width: 40%;
		border-radius: 5rem;
		outline: none;
		border: .1rem solid #d1d1d1;
		font-size: .7rem;
	}

	::placeholder {
		color: #d1d1d1;
	}

	.subscribe-btn {
		padding: .8rem 2rem;
		border-radius: 5rem;
		background: linear-gradient(90deg, #ff9966, #ff5e62);
		color: #fff;
		font-size: .7rem;
		border: none;
		outline: none;
		cursor: pointer;
	}
</style>
<body>

<div class="bgimg">
	<div class="topleft">
		<p>Magoumi</p>
	</div>
	<div class="middle">
		<?= $message ?>
		<h1>COMING SOON</h1>
		<hr>
		<p id="demo" style="font-size:30px"></p>
	</div>
	<div class="bottomleft">
		<p>working on it, <span><u style="cursor: pointer" onclick="subscribeNewsletterForm()">Subscribe to the newsletter</u> to get notified when I'm ready</span></p>
		<p>or simple send me an <a href="mailto:contact@magoumi.com">email</a></p>
	</div>
</div>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">

<div id="bluer" onclick="dismiss()"></div>
<div class="wrapper">
	<?php

	use Model\Newsletter;
	use Simfa\Form\Form;

	/** @var Newsletter $newsletter */
	$form = Form::begin('', "POST",'card-content');
	?>
		<div class="container">
			<div class="image">
				<i class="fas fa-envelope"></i>
			</div>
			<h1>Subscribe</h1>
			<p>Subscribe to our newsletter and stay updated.</p>
		</div>
		<div class="form-input">
			<label for="email"></label>
			<?php
			echo $form->field($newsletter, 'email')->emailField()->setHolder('Your Email')->noLabel();
			?>
			<button class="subscribe-btn">Subscribe</button>
		</div>
	<?php
	Form::end();
	?>
</div>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Mar 15, 2022 00:00:00").getTime();

    // Update the count down every 1 second
    var countdownfunction = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(countdownfunction);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

    function subscribeNewsletterForm()
    {
        let form = document.getElementsByClassName('wrapper');
        form = form[0];

        form.style.display = 'block';
        const bluer = document.getElementById('bluer');
        bluer.style.display = 'block';
    }

    function dismiss()
    {
        let form = document.getElementsByClassName('wrapper');
        form = form[0];

        form.style.display = 'none';
        const bluer = document.getElementById('bluer');
        bluer.style.display = 'none';
    }
</script>

</body>
</html>
