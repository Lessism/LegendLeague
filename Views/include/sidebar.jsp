<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib prefix="s" uri="http://www.springframework.org/security/tags" %>
<div class="ui vertical inverted menu sidebar f k r">
<s:authorize access="isAnonymous()">
	<div style="padding-top:400px; text-align:center;">
		<a class="item" href="${path}/account/login.ll">
			로그인이 필요합니다.<br>
			<button class="ui inverted black button f k r" style="margin-top:25px;">
				Login
			</button>
		</a>
	</div>
</s:authorize>
<s:authorize access="isAuthenticated()">
	<div class="ui inverted container" style="padding-top:100px;">
		<div class="ui inverted segment">
			<div class="ui inverted my accordion">
			</div>
		</div>
	</div>
<script>
$(function(){
	$('.sidebar').sidebar({
		onVisible: function(){
			if ($('.my.accordion').children().length < 1){
				$.post('/legendleague/leftbar', {id : '${id}'}, function(data){
					if (data.role == 'Club'){
						$('.my.accordion').append(
							'<div class="active title f k r">'+
							'	<img class="ui avatar image" src="${path}/image.ll?no='+data.personal.emblem+'" style="max-width:20px; max-height:20px;">'+
							'	<span class="f k r">'+data.personal.name+'</span>'+
							'</div>'+
							'<div class="active content">'+
							'	<div class="ui black inverted segment">'+
							'		<div class="ui secondary vertical menu">'+
							'			<div class="item">'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="${path}/fifa/country.ll?country='+data.personal.country+'"><i class="'+data.personal.country.toLowerCase()+' flag"></i>'+data.personal.country+'</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/stadium.ll?role=Club&name='+data.personal.name+'"><img class="ui avatar image" src="${path}/image.ll?role=Stadium&name='+data.personal.stadium+'" style="height:17.5px;width:17.5px">'+data.personal.stadium+'</a>'+
							'				</div>'+
							'				<div class="ui divider"></div>'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name='+data.personal.name+'">'+
							'						Information'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="${path}/fifa/profile.ll?role=Club&name='+data.personal.name+'">Profile</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/detail.ll?role=Club&name='+data.personal.name+'">Detail</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/squad.ll?role=Club&name='+data.personal.name+'">Squad</a>'+
							'				</div>'+
							'			</div>'+
							'			<div class="ui divider"></div>'+
							'			<div class="item">'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="${path}/fifa/title.ll?role=Club&name='+data.personal.name+'">'+
							'						History'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="${path}/fifa/title.ll?role=Club&name='+data.personal.name+'">Title</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/award.ll?role=Club&name='+data.personal.name+'">Award</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/record.ll?role=Club&name='+data.personal.name+'">Record</a>'+
							'				</div>'+
							'			</div>'+
							'		</div>'+
							'	</div>'+
							'</div>'
						)
					}
					if (data.role == 'Manager' || data.role == 'Player'){
						$('.my.accordion').append(
							'<div class="active title f k r">'+
							'	<img class="ui avatar image" src="${path}/image.ll?no='+data.personal.profile+'" style="max-width:20px; max-height:20px;">'+
							'	<span class="f k r">'+data.personal.name+'</span>'+
							'</div>'+
							'<div class="active content">'+
							'	<div class="ui black inverted segment">'+
							'		<div class="ui secondary vertical menu">'+
							'			<div class="item">'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="${path}/fifa/country.ll?country='+data.personal.country+'"><i class="'+data.personal.country.toLowerCase()+' flag"></i>'+data.personal.country+'</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/profile.ll?role=Club&name='+data.personal.club+'"><img class="ui avatar image" src="${path}/image.ll?role=Club&name='+data.personal.club+'" style="height:17.5px;width:17.5px">'+data.personal.club+'</a>'+
							'				</div>'+
							'				<div class="ui divider"></div>'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="${path}/fifa/profile.ll?role='+data.role+'&name='+data.personal.name+'">'+
							'						Information'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="${path}/fifa/profile.ll?role='+data.role+'&name='+data.personal.name+'">Profile</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/detail.ll?role='+data.role+'&name='+data.personal.name+'">Detail</a>'+
							'				</div>'+
							'			</div>'+
							'			<div class="ui divider"></div>'+
							'			<div class="item">'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="${path}/fifa/title.ll?role='+data.role+'&name='+data.personal.name+'">'+
							'						History'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="${path}/fifa/title.ll?role='+data.role+'&name='+data.personal.name+'">Title</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/award.ll?role='+data.role+'&name='+data.personal.name+'">Award</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/record.ll?role='+data.role+'&name='+data.personal.name+'">Record</a>'+
							'				</div>'+
							'			</div>'+
							'		</div>'+
							'	</div>'+
							'</div>'
						)
						if (data.club != null){
							$('.my.accordion').append(
								'<div class="title f k r">'+
								'	<img class="ui avatar image" src="${path}/image.ll?no='+data.club.emblem+'" style="max-width:20px; max-height:20px;">'+
								'	<span class="f k r">'+data.club.name+'</span>'+
								'</div>'+
								'<div class="content">'+
								'	<div class="ui black inverted segment">'+
								'		<div class="ui secondary vertical menu">'+
								'			<div class="item">'+
								'				<div class="ui secondary vertical pointing menu">'+
								'					<a class="rail item f k r" href="${path}/fifa/country.ll?country='+data.club.country+'"><i class="'+data.club.country.toLowerCase()+' flag"></i>'+data.club.country+'</a>'+
								'					<a class="rail item f k r" href="${path}/fifa/stadium.ll?role=Club&name='+data.club.name+'"><img class="ui avatar image" src="${path}/image.ll?role=Stadium&name='+data.club.stadium+'" style="height:17.5px;width:17.5px">'+data.club.stadium+'</a>'+
								'				</div>'+
								'				<div class="ui divider"></div>'+
								'				<h4 class="f k r">'+
								'					<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name='+data.club.name+'">'+
								'						Information'+
								'					</a>'+
								'				</h4>'+
								'				<div class="ui secondary vertical pointing menu">'+
								'					<a class="rail item f k r" href="${path}/fifa/profile.ll?role=Club&name='+data.club.name+'">Profile</a>'+
								'					<a class="rail item f k r" href="${path}/fifa/detail.ll?role=Club&name='+data.club.name+'">Detail</a>'+
								'					<a class="rail item f k r" href="${path}/fifa/squad.ll?role=Club&name='+data.club.name+'">Squad</a>'+
								'				</div>'+
								'			</div>'+
								'			<div class="ui divider"></div>'+
								'			<div class="item">'+
								'				<h4 class="f k r">'+
								'					<a class="link f k r" href="${path}/fifa/title.ll?role=Club&name='+data.club.name+'">'+
								'						History'+
								'					</a>'+
								'				</h4>'+
								'				<div class="ui secondary vertical pointing menu">'+
								'					<a class="rail item f k r" href="${path}/fifa/title.ll?role=Club&name='+data.club.name+'">Title</a>'+
								'					<a class="rail item f k r" href="${path}/fifa/award.ll?role=Club&name='+data.club.name+'">Award</a>'+
								'					<a class="rail item f k r" href="${path}/fifa/record.ll?role=Club&name='+data.club.name+'">Record</a>'+
								'				</div>'+
								'			</div>'+
								'		</div>'+
								'	</div>'+
								'</div>'
							)
						}
					}
				})
			}
		}
	})
})
</script>
</s:authorize>
</div>