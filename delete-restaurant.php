<?php $page = "delete-salon"; include("include/header.php"); ?>
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
$item = deleteItem($item_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$location = isset($_POST['location']) ? $_POST['location'] : '';
  	$open_time = isset($_POST['open_time']) ? $_POST['open_time'] : '';	  
  	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$logo = is_uploaded_file($_FILES["logo"]["tmp_name"]) ? addslashes(file_get_contents($_FILES["logo"]["tmp_name"])): '';
  	
	$item_id = addItem($category_id, $name, $location, $open_time, $description, $logo);
}

?>
		<section class="page-content" id="page-content">
			<h2 class="title">Restaurant was deleted successfully.</h2>
			<hr>

			<div class="content" style="text-align:center; min-height: 380px;">
				<a href="admin-page.html">Return to admin page</a>
			</div>
		</section>


		<?php include("include/footer.php"); ?>