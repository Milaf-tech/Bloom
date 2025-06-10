<?php $page = "salons-cat"; include("include/header.php"); ?>


		<section class="page-header" id="home">
			<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1><br><span>Restaurants Categories</span></h1>
				</div>
			</div>
		</section>

		<section class="restaurants-categories" id="restaurants-categories">
			<h2 class="title">where all what you <br>desire under one roof</h2>
			<hr />

			<div class="col" onclick="window.location.href='restaurant.html'">
				<div class="circle circle-one"></div>
				<h2>HEALTHY FOOD</h2>
			</div>

			<div class="col" onclick="window.location.href='restaurant.html'">
				<div class="circle circle-two"></div>
				<h2>INTERNATIONAL RESTURANTS</h2>
			</div>

			<div class="col" onclick="window.location.href='restaurant.html'">
				<div class="circle circle-three"></div>
				<h2>FAST FOOD</h2>
			</div>
		</section>

		<?php include("include/footer.php"); ?>