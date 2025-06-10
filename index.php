<?php $page = "home"; include("include/header.php"); ?>
<?php require_once("include/db_conn.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php
$items = getNewItems(3);
?>


		<section class="page-header" id="home">
			<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1>Welcome to Bloom</h1>
					<h1 style="line-height: 0.8;"><span>Where all what you desire is <br> around you
						</span></h1>
				</div>
			</div>
		</section>

		<section class="restaurants-categories" id="restaurants-categories">
			<h2 class="title">Resturants Categories</h2>
			<hr />

			<div class="column-one" onclick="window.location.href='restaurant.html'">
				<div class="circle-one"></div>
				<h2>Healthy food</h2>
			</div>

			<div class="column-two" onclick="window.location.href='restaurant.html'">
				<div class="circle-two"></div>
				<h2>International Resturants</h2>
			</div>

			<div class="column-three" onclick="window.location.href='restaurant.html'">
				<div class="circle-three"></div>
				<h2>Fast food</h2>
			</div>
		</section>

		<div class="clear"></div>

		<section class="restaurants" id="restaurants">


			<div class="restaurants-margin">

				<h1>Recently added RESTURANTS</h1>
				<hr />

				<ul class="grid">
					
					<li>
						<a href="restaurant-info.html?id=1">
							<img src="img/restaurant/mac.jpg" alt="McDonalds" />
							<div class="text">
								<p>McDonalds </p>
							</div>
						</a>
					</li>
					<li>
						<a href="restaurant-info.html?id=2">
							<img src="img/restaurant/piatto.jpg" alt="Piatto"  />
							<div class="text">
								<p>Piatto</p>
							</div>
						</a>
					</li>
					<li>
						<a href="restaurant-info.html?id=3">
							<img src="img/restaurant/th.jpg"alt="Saldwich" />
							<div class="text">
								<p>Saldwich</p>
							</div>
						</a>
					</li>
				</ul>

				<div class="clear"></div>

				

			</div>

		</section>

		<div class="clear"></div>

		<section class="form_content" id="contact">
			<img src="img/background/contact.jpg" />

			<div class="content">
				<h1>contact</h1>
				<hr />

				<div class="form">
					<form action="#" method="post" enctype="text/plain">
						<input name="your-name" id="your-name" placeholder="YOUR NAME" />
						<input name="your-email" id="your-email" placeholder="YOUR E-MAIL" />
						<textarea id="message" name="message" placeholder="MESSAGE"></textarea>
						<input class="button" type="submit" value="SEND" />
					</form>
				</div>
			</div>
		</section>
		<?php include("include/footer.php"); ?>