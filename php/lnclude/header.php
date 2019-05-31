<?php
  session_start();
  $path = 'http://'.$_SERVER['HTTP_HOST'].'/php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Legend League</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/php/other/Lcss.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif+KR:500&amp;subset=korean">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
	<script src="https://semantic-ui.com/javascript/library/tablesort.js"></script>
</head>
<body>
<header class="ui inverted vertical segment f k r">
	<div class="ui inverted menu container">
		<div class="ui inverted left menu">
			<a class="ui inverted button" href="https://github.com/Lessism">Lessism</a>
		</div>
		<div class="ui inverted secondary pointing right menu f k r">
      <?php if (empty($_SESSION['login'])) : ?>
				<a class="nav item" href="<?=$path?>/account/login.php">Login</a>
				<a class="nav item" href="<?=$path?>/account/join.php">Join</a>
      <?php else : ?>
        <a class="nav item" href="<?=$path?>/account/logout.php">Logout</a>
        <?php if ($_SESSION['role'] == 'Master') : ?>
					<a class="ui inverted button" href="<?=$path?>/master/master.php">Master</a>
        <?php else : ?>
					<a class="nav item" href="<?=$path?>/account/information.php"><?=$_SESSION['id']?></a>
        <?php endif; ?>
      <?php endif; ?>
		</div>
	</div>
	<nav class="ui inverted secondary pointing menu container f k r">
		<a class="item" id="menu">Menu</a>
		<a class="nav item" href="<?=$path?>/league/league.php">League</a>
		<a class="nav item" href="<?=$path?>/fifa/fifa.php">FIFA</a>
		<a class="item" href="<?=$path?>/fifa/profile.php?role=Club&name=Barcelona">Club</a>
		<a class="item" href="<?=$path?>/fifa/profile.php?role=Manager&name=Pep Guardiola">Manager</a>
		<a class="item" href="<?=$path?>/fifa/profile.php?role=Player&name=Lionel Messi">Player</a>
	</nav>
</header>
<?php include '../include/sidebar.php'; ?>
