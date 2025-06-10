<?php $page = "login"; include("include/header.php"); ?>
<?php require_once("include/db_conn.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php
define ("FIVE_DAYS", 60 * 60 * 24 * 5);


if (isset($_COOKIE['admin'])) {
    exit(header('Location:admin-page.php'));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = isset($_POST['username']) ? $_POST['username'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  $user_id = loginAdmin($username, $password);

  if ($user_id > 0) {
	setCookie('admin', 'admin', time() + 86400);  // 86400 = 1 day
    exit(header('Location:admin-page.php'));
  }
}

?>


		<section class="form_content" id="contact">
			<img src="img/background/contact.jpg" />

			<div class="content">
				<h1>Login</h1>
				<hr />

				<div class="form">
					<form id="login-form" action="admin-page.html" method="post" enctype="text/plain">
						<input type="text" name="username" id="username" placeholder="Username" required />
						<input type="password" name="password" id="password" placeholder="Password" required />
						<input class="button" type="submit" value="Login" />
					</form>
				</div>
				<?php if ($success_msg) { ?>
					<div class="success-msg"><?= $success_msg ?></div>
				<?php } else if ($error_msg) { ?>
					<div class="error-msg"><?= $error_msg ?></div>
				<?php } ?>
			</div>
		</section>

<?php include("include/footer.php"); ?>