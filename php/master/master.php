<?php include '../include/header.php';?>
<section class="ui black segment f k r">
<div class="ui center aligned container">
	<h1 class="f k r">
		<a class="link f k r" href="<?=$path?>/master/master.php">
			Master
		</a>
	</h1>
	<h4 class="f k r">
		Administrator
	</h4>
</div>
<div class="ui divider"></div>
<div class="ui grid">
	<div class="two wide column">
    <?php
      $rail = 'master';
      include '../include/rail.php';
    ?>
	</div>
	<div class="fourteen wide column">
		<div class="ui black segment">
			<h4 class="ui header f k r">
				Project
			</h4>
			<div class="ui divider"></div>
					<div class="ui active black progress">
						<div class="bar" style="width:80%;">
							<div class="progress f k r" style="color:white">
								80%
							</div>
						</div>
						<div class="label f k r" style="color:black">
							프로젝트 진행률
						</div>
					</div>
			<div class="ui two column grid f k r">
				<div class="ui center aligned column">
				<h4 class="ui header f k r">
					보완해야 할 항목
				</h4>
				<div class="ui divider"></div>
					<div class="f k r">Validate / 회원가입, 로그인, 리그 진행 도중 로스터 편집 불가능</div><br>
					<div class="f k r">FIFA Member / 기본 팀 추가, 회원정보 수정 및 상호작용</div><br>
					<div class="f k r">Error Page / 403, 404, 500</div><br>
				</div>
				<div class="ui center aligned column">
				<h4 class="ui header f k r">
					추가할 컨텐츠
				</h4>
				<div class="ui divider"></div>
					<div class="f k r">Shop / Stadium 재건축, OVR 상승, 포지션 및 전술 변경</div><br>
					<div class="f k r">Transfer / Club, Manager, Player 간의 이적 및 진행상황</div><br>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php include '../include/footer.php';?>
