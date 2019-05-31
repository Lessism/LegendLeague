<?php include '../include/header.php';?>
<section class="ui black segment text container">
	<form class="ui form" id="loginForm" action="<?=$path?>/db/account/login.php" method="post">
		<h1 class="ui center aligned header f k r">로그인</h1>
		<hr>
		<div class="ui field">
			<div class="ui labeled input">
				<label class="ui basic label llab f k r" for="id">아이디</label>
				<input type="text" name="id" id="id" placeholder="ID">
			</div>
		</div>
		<div class="ui field">
			<div class="ui labeled input">
				<label class="ui basic label llab f k r" for="pw">암호</label>
				<input type="password" name="pw" id="pw" placeholder="Password">
			</div>
		</div>
		<hr>
	</form>
	<form id="masterForm" method="post" action="<?=$path?>/db/account/login.php">
		<input type="hidden" name="id" value="Master">
		<input type="hidden" name="pw" value="Master">
	</form>
	<div class="ui center aligned container">
		<input class="ui black button f k r" id="login" type="button" value="로그인">
		<a class="ui button f k r" href="<?=$path?>/league/league.php">메인</a>
		<input class="ui black button f k r" id="master" type="button" value="Master">
	</div>
</section>
<script>
$(function(){

	$('#login').click(function(){
		$('#loginForm').submit()
	})

	$('#master').click(function(){
		$('#masterForm').submit()
	})

})
</script>
<?php include '../include/footer.php';?>
