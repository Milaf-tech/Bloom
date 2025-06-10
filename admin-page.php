<?php $page = "admin-page"; include("include/header.php"); ?>
<?php require_once("include/db_conn.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php
if (!isset($_COOKIE['admin'])) {
	exit(header('Location:login.php'));
}

$items = getAllItems(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$rating = isset($_POST['rating']) ? $_POST['rating'] : '';
  	$body = isset($_POST['body']) ? $_POST['body'] : ''; echo $item_id;
  	
	$item_review = addItemReview($item_id, $name, $rating, $body);
}
?>

		<section class="page-header" id="home">
			<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1><br><span>Restaurants</span></h1>
				</div>
			</div>
		</section>

		<section class="restaurants" id="restaurants">
			<div class="restaurants-margin">

				<h1>HEALTHY FOOD</h1>
				<hr />

				<ul class="grid">
				<?php foreach ($items as $key => $item) { ?>
					<?php if ($item['category_id'] == 1)  { ?>
						<li>
						<a href="restaurant-info.php?id=<?= $item['id'] ?>">
							<img src="<?= $item['logo'] ?>" alt="<?= $item['name'] ?>" />
							<div class="text">
								<p><?= $item['name'] ?></p>
								<p><a href="edit-restaurant.php?id=<?= $item['id'] ?>"> Edit </a> | <a class="delete"
										href="delete-restaurant.php?id=<?= $item['id'] ?>"> Delete </a> </p>
							</div>
						</a>
					</li>
					<?php } ?>
				<?php } ?>
				</ul>

				<h1>INTERNATIONAL Restaurants</h1>
				<hr />

				<ul class="grid">
				<?php foreach ($items as $key => $item) { ?>
					<?php if ($item['category_id'] == 2)  { ?>
					<li>
						<a href="restaurant-info.php?id=<?= $item['id'] ?>">
							<img src="<?= $item['logo'] ?>" alt="<?= $item['name'] ?>" />
							<div class="text">
								<p><?= $item['name'] ?></p>
								<p><a href="edit-restaurant.php?id=<?= $item['id'] ?>"> Edit </a> | <a class="delete"
										href="delete-restaurant.php?id=<?= $item['id'] ?>"> Delete </a> </p>
							</div>
						</a>
					</li>
					<?php } ?>
				<?php } ?>					
				</ul>

				<h1>FAST FOOD</h1>
				<hr />
				<ul class="grid">
				<?php foreach ($items as $key => $item) { ?>
					<?php if ($item['category_id'] == 3)  { ?>
					<li>
						<a href="restaurant-info.php?id=<?= $item['id'] ?>">
							<img src="<?= $item['logo'] ?>" alt="<?= $item['name'] ?>" />
							<div class="text">
								<p><?= $item['name'] ?></p>
								<p><a href="edit-restaurant.php?id=<?= $item['id'] ?>"> Edit </a> | <a class="delete"
										href="delete-restaurant.php?id=<?= $item['id'] ?>"> Delete </a> </p>
							</div>
						</a>
					</li>
					<?php } ?>
				<?php } ?>
				</ul>

				<div class="clear"></div>

			</div>

		</section>
		<?php include("include/footer.php"); ?>