<div style="margin-top:150px"><br></div>
<script>
$(function(){

	$('#rail, #subrail').sticky()

	$('.dropdown').dropdown()

	$('.ui.modal').modal()

	$('.tabular.item').tab()

	$('.ui.accordion').accordion()

	$('#menu').click(function(){
		$('.sidebar').sidebar('toggle')
	})

	$('#logout').click(function(){
		$('#logout_form').submit()
	})

	for (i = 0; i < $('.nav.item').length; i++){
		var menu = $('.nav.item').eq(i)
		var path = 'http://' + window.location.hostname + ':8088' + window.location.pathname
		if (menu.attr('href').split('/')[4] == path.split('/')[4]){
			if ((menu.attr('href').split('/')[4] == 'account') == (menu.attr('href').split('/')[5] == path.split('/')[5])){
				menu.addClass('active')
				$.post('<?=$path?>/db/rest/visit.php', { menu : path.split('/')[4], submenu : path.split('/')[5].split('.')[0]})
			} else if (menu.attr('href').split('/')[4] != 'account'){
				menu.addClass('active')
				$.post('<?=$path?>/db/rest/visit.php', { menu : path.split('/')[4], submenu : path.split('/')[5].split('.')[0]})
			}
		}
	}

	$.post('<?=$path?>/db/rest/stay.php', function(data){
		$('#visit_now').text(data)
	})
	setInterval(function(){
		$.post('<?=$path?>/db/rest/stay.php', function(data){
			$('#visit_now').text(data)
		})
	}, 5000)

})
</script>
</body>
</html>
