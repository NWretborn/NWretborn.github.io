------------------CSS position property------------------------

	position: relative	(relative to html position)
	position: absolute 	(relative to parent object)
	position: fixed		(relative to viewport)
	position: static	(html position)

---------------------------------------------------------------

<style type="text/css">
	#c{	text-align: center;	}
	#l{	text-align: left;	}
	#r{	text-align: right;	}
	
	/* Rounded Corner */
	.tb5 {
		background-color: #10454e;
		border:1px solid #10454e;
		border-radius:20px;
		font-size:1.5vw;
		font-family: monospace;
		width: 143%;
	}
	.tb4 {
		
		background-color: #10454e;
		border:0px solid #29afc4;
		border-radius:20px;
		font-family: helvetica;
		font-size: 1.5vw;
	}
	.center{
		
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}
	.hCenter{
		left: 58.5%;
		transform: translate(-50%, 0);
	}
	div{
		font-size:1.5vw;
		position: fixed;
	}
	.box{
		height: 20vh;
		color: #79969a;
		font-family: monospace;
		background-color: black;
		width: 30vw;
		border: 2px solid #10454e;
		border-radius:10px;
		padding: 20px;
	}
	.tb4:hover{
		border:2px solid #29afc4;
		border-radius: 20px;
	}
	input:focus {
		border: 2px solid #29afc4;
		border-radius: 20px;
		outline: none;
	}

	.logo{
		position:fixed;
		display: block;
		background: url(img/logo_blue.png) no-repeat;
		background-position: center; 
		background-size: contain;
		width: 15vw; 
		height: 15vh; 
		left:8vw;
		bottom:8vh;
		transform: translate(-50%, 50%);		
	}
	.logo:hover{
		background: url(img/logo_about_gray.png) no-repeat;		
		background-position: center; 
		background-size: contain;
		height:18vh;
	}
</style>

-----------------about site's css------------------------------

<style type="text/css">
		#c{	text-align: center;	}
		#l{	text-align: left;	}
		#r{	text-align: right;	}
		
		/* Rounded Corner */
		.tb5 {
			background-color: #10454e;
			border:1px solid #10454e;
			border-radius:20px;
			font-size:1.5vw;
			font-family: monospace;
		}
		.tb4 {
			
			background-color: #10454e;
			border:0px solid #29afc4;
			border-radius:20px;
			font-size: 1vw;
		}
		.center{
			
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
		}
		.hCenter{
			left: 70%;
			transform: translate(-50%, 0);
		}
		p{
			color: #10454e;
			text-align: left;
			font-size: 90%;
		}
		p.subtext{
			font-size: 80%;
			text-align: right;
		}
		div{
			font-size:1.5vw;
			position: fixed;
		}
		.box{
			height: 70vh;
			color: #79969a;
			font-family: monospace;
			background-color: black;
			width: 30vw;
			border: 2px solid #10454e;
			border-radius:10px;
			padding: 20px;
		}
		.tb4:hover{
			border:1px solid #29afc4;
			border-radius: 20px;
		}
		input:focus {
			border: 1px solid #29afc4;
			border-radius: 20px;
			outline: none;
		}
		.logo{
			position: fixed;
			height:15vh;
			left:8%;
			bottom:8vw;
			transform: translate(-50%, 50%);
		}
	</style>