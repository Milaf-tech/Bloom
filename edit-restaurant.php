<?php $page = "edit-restaurant"; include("include/header.php"); ?>
<?php require_once("include/db_conn.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php
if (!isset($_COOKIE['admin'])) {
	exit(header('Location:login.php'));
}

if (!isset($_GET['id'])) {
	exit(header('Location:admin-page.php'));
}

$item_id = $_GET['id'];
$item = getItemInfo($item_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$location = isset($_POST['location']) ? $_POST['location'] : '';
  	$open_time = isset($_POST['open_time']) ? $_POST['open_time'] : '';	  
  	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$logo = isset($_FILES['logo']) && is_uploaded_file($_FILES["logo"]["tmp_name"]) ? addslashes(file_get_contents($_FILES["logo"]["tmp_name"])): '';
  	
	$sucess_edit = editItem($id, $category_id, $name, $location, $open_time, $description, $logo);
}

?>

		<?php if (isset($sucess_edit) && $sucess_edit) { ?>

		<section class="page-content" id="page-content">
			<h2 class="title">Item was updated successfully.</h2>
			<hr>

			<div class="content" style="text-align:center; min-height: 380px;">
				<a href="restaurant-info.php?id=<?= $item_id ?>">Return to restaurant info page</a>
			</div>
		</section>

		<?php } else if ($item) { ?>
		<section class="page-header" id="home">
			<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1><br><span><?= $item['name'] ?></span></h1>
				</div>
			</div>
		</section>


		<section class="form_content" style="padding: 20px 0;">
			<div class="content">
				<h1>Edit Restaurant</h1>
				<hr />

				<div class="form">
					<form id="restaurant_form" action="edit-restaurant.html" method="post" enctype="multipart/form-data"
						onsubmit="return validateSalonForm();">

						<select class="text-field" name="category_id" id="category_id" placeholder="Restaurant Category"
							required>
							<option value="[Select Restaurant Category]">Select Category</option>
							<option value="Healthy food" selected>Healthy food</option>
							<option value="International Resturant">International Resturant</option>
							<option value="Fast food">Fast food</option>
						</select>

						<input type="text" name="name" id="name" placeholder="Restaurant Name" value="Restaurant 1" required />
						<input type="text" name="location" id="location" placeholder="restaurant Location"
							value="Wall Street, Bulding 70" required />
						<input type="text" name="open_time" id="open_time" placeholder="Restaurant Open Time"
							value="09 AM - 01 AM" required />

						<label class="field-label" for="image">Image</label>
						<input type="file" name="image" id="image" />

						<textarea id="description" name="description" placeholder="Description"
							required>Restaurant description</textarea>

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