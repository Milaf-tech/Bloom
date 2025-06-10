<?php $page = "restaurant-info"; include("include/header.php"); ?>
<?php require_once("include/db_conn.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php

if (!isset($_GET['id'])) {
	exit(header('Location:index.php'));
}

$item_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$rating = isset($_POST['rating']) ? $_POST['rating'] : '';
  	$body = isset($_POST['body']) ? $_POST['body'] : ''; echo $item_id;
  	
	$item_review = addItemReview($item_id, $name, $rating, $body);

	if ($item_review) {
		exit(header('Location:restaurant-info.php?id=' . $item_id));
	  }
}

$item = getItemInfo($item_id);

if ($item_id) {
	$reviews = getItemReviews($item_id);
}



?>

		<section class="page-header" id="home">
			<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1><br><span>RESTAURANTS</span></h1>
				</div>
			</div>
		</section>
<?php if ($success_msg) { ?>
			<div class="success-msg"><?= $success_msg ?></div>
		<?php } else if ($error_msg) { ?>
			<div class="error-msg"><?= $error_msg ?></div>
		<?php } ?>

		<?php if ($item) { ?>

		<section class="page-content" id="page-content">
			<h2 class="title">Restaurant 1</h2>
			<hr>
			<div class="restaurant-info">

				<div class="info">

					<h3 class="title">Restaurant Information</h3>

					<p><strong> Restaurant name: </strong> <?= $item['name'] ?></p>
					<p><strong> Restaurant location: </strong> <?= $item['location'] ?></p>
					<p><strong> Restaurant open time: </strong><?= $item['open_time'] ?></p>
					<p><strong> Rating: </strong> <?= $item['rating'] ?></p>
					<p><strong> Description: </strong></p>
					<p>
						<?= $item['description'] ?>
					</p>
				</div>
				<div class="img"><img src="<?= $item['logo'] ?>" alt="<?= $item['name'] ?>" /></div>

			</div>

			<div id="reviews">
				<h3>Comments</h3>

				<div class="reviews-list">
				<?php foreach ($reviews as $key => $review) { ?>

					<article>
						<header>
							<div class="rating">
							<?php for ($i = 0; $i < 5; $i++) {  ?>
								<?php if ($i <= ($review['rating'])) { ?>
								<span class="fa fa-star checked"></span>
								<?php } else { ?>
								<span class="fa fa-star"></span>
								<?php } ?>
							<?php } ?>
							</div>
							<div class="user"><?= $review['name'] ?></div>
							<time datetime="2045-04-06T08:15+00:00"><?= $review['time'] ?></time>
						</header>
						<div class="review">
							<p><?= $review['body'] ?></p>
						</div>
					</article>

					<?php } ?>
				</div>

				<div class="new-review">
					<h3>Write Your Review</h3>
					<div class="form">
						<form action="salon-info.php?id=<?= $item_id ?>" method="POST">
							<input type="text" name="name" id="name" placeholder="YOUR NAME" required />
							<input type="number" name="rating" id="rating" min="1" max="5" placeholder="Rate [0-5]"
								required />
							<textarea id="body" name="body" placeholder="MESSAGE"></textarea>
							<input class="button" type="submit" value="SEND" />
						</form>
					</div>
				</div>


			</div>


		</section>

		<?php } else { ?>

		<section class="page-content" id="page-content">
			<h2 class="title">Item not exists.</h2>
			<hr>

			<div class="content" style="text-align:center; min-height: 380px;">
				<a href="index.php">Go to home page</a>
			</div>
		</section>

		<?php } ?>

<?php include("include/footer.php"); ?>