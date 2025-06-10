<?php $page = "add-restaurant"; include("include/header.php"); ?>
<?php require_once("include/db_conn.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php
if (!isset($_COOKIE['admin'])) {
	exit(header('Location:login.php'));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$location = isset($_POST['location']) ? $_POST['location'] : '';
  	$open_time = isset($_POST['open_time']) ? $_POST['open_time'] : '';	  
  	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$logo = isset($_FILES['logo']) && is_uploaded_file($_FILES["logo"]["tmp_name"]) ? addslashes(file_get_contents($_FILES["logo"]["tmp_name"])): '';
  	
	$item_id = addItem($category_id, $name, $location, $open_time, $description, $logo);
}

?>

		<section class="page-header" id="home">
			<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1><br><span>Add Restaurant</span></h1>
				</div>
			</div>
		</section>
		<?php if (isset($item_id)) { ?>

			<section class="page-content" id="page-content">
			<h2 class="title">Restaurant was added successfully.</h2>
			<hr>

			<div class="content" style="text-align:center; min-height: 380px;">
				<a href="restaurant-info.php?id=<?= $item_id ?>">Go to Restaurants page</a>
			</div>
		</section>

		<?php } else { ?>

		<section class="form_content" style="padding: 20px 0;">
			<div class="content">
				<h1>Add Restaurant</h1>
				<hr />

				<div class="form">
					<form id="add_Restaurant" action="add-restaurant.html" method="post" enctype="multipart/form-data"
						onsubmit="return validateRestaurantForm();">

						<select class="text-field" name="category_id" id="category_id" placeholder="Restaurant Category"
							required>
							<option selected value="[Select Restaurant Category]">Select Category</option>
							<option value="Healthy food">Healthy food</option>
							<option value="International Restaurant">International Restaurant</option>
							<option value="Fast food">Fast food</option>
						</select>

						<input type="text" name="name" id="name" placeholder="Restaurant Name" required />
						<input type="text" name="location" id="location" placeholder="Restaurant Location" required />
						<input type="text" name="open_time" id="open_time" placeholder="Restaurant Open Time" required />

						<label class="field-label" for="image">Image</label>
						<input type="file" name="image" id="image" />

						<textarea id="description" name="description" placeholder="Description" required></textarea>

						<input class="button" type="submit" value="Add Restaurant" />
						</form>
				</div>
				<?php if ($success_msg) { ?>
					<div class="success-msg"><?= $success_msg ?></div>
				<?php } else if ($error_msg) { ?>
					<div class="error-msg"><?= $error_msg ?></div>
				<?php } ?>
			</div>
		</section>

		<?php } ?>


<?php include("include/footer.php"); ?>