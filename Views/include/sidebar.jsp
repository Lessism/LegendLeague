<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib prefix="s" uri="http://www.springframework.org/security/tags" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
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
	<%-- <div style="padding-top:400px; text-align:center;">
		<div class="ui inverted container" style="padding-top:50px;">
			<div class="ui center aligned black card segment" style="max-width:250px; margin:auto; border-top:5px solid #1b1c1d!important;">
				<div class="ui header f k r" style="margin:0; margin-top:10px;">
					<a class="link f k r" href="${path}/fifa/information.ll?role=Club">
						Club
					</a>
				</div>
				<div class="ui divider"></div>
				<div>
					<a class="image" href="${path}/fifa/profile.ll?role=Club&name=Barcelona">
						<img class="ui centered rounded image" src="${path}/image.ll?role=Club&name=Barcelona" style="height:150px;max-width:150px">
					</a>
				</div>
				<div class="ui divider"></div>
				<div class="ui header f k r" style="margin:0;">
					<a class="link f k r" href="${path}/fifa/profile.ll?role=Club&name=Barcelona">
					Barcelona
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/country.ll?country=Spain">
						<i class="spain flag"></i>
					spain
					</a>
				</div>
				<div class="ui meta f k r">
					<a class="link f k r" href="${path}/fifa/stadium.ll?role=Club&name=Barcelona">
						<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=Camp Nou" style="max-width:20px; max-height:20px;">
					Camp Nou
					</a>
				</div>
				<div class="description">
					<div class="ui active inverted black progress"style="margin-top:10px; margin-bottom:0;">
						<div class="bar" style="width:85%;">
							<div class="progress f k r">
							OVR <i class="dot circle outline white icon"></i>
								85
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ui inverted segment">
				<div class="ui inverted accordion">
					<div class="active title f k r">
						<img class="ui avatar image" src="${path}/image.ll?role=Club&name=Barcelona" style="max-width:20px; max-height:20px;">
						<span class="f k r">My Page</span>
					</div>
					<div class="active content">
						<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">개는 가정 동물의 한 유형입니다. </font><font style="vertical-align: inherit;">충성심과 신실함으로 알려진이 호텔은 전 세계의 많은 가정에서 환영받는 손님으로 볼 수 있습니다.</font></font></p>
					</div>
					<div class="title f k r">
						<i class="spain flag"></i>
						<span class="f k r">Spain</span>
					</div>
					<div class="content">
						<p>There are many breeds of dogs. Each breed varies in size and temperament. Owners often select a breed of dog that they find to be compatible with their own lifestyle and desires from a companion.</p>
					</div>
					<div class="title f k r">
						<img class="ui avatar image" src="${path}/image.ll?role=Stadium&name=Camp Nou" style="max-width:20px; max-height:20px;">
						<span class="f k r">Camp Nou</span>
					</div>
					<div class="content">
						<p>Three common ways for a prospective owner to acquire a dog is from pet shops, private owners, or shelters.</p>
						<p>A pet shop may be the most convenient way to buy a dog. Buying a dog from a private owner allows you to assess the pedigree and upbringing of your dog before choosing to take it home. Lastly, finding your dog from a shelter, helps give a good home to a dog who may not find one so readily.</p>
					</div>
				</div>
			</div>
		</div>
	</div> --%>
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
					if (data.role == 'Manager'){
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
							'					<a class="link f k r" href="${path}/fifa/profile.ll?role=Manager&name='+data.personal.name+'">'+
							'						Information'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="${path}/fifa/profile.ll?role=Manager&name='+data.personal.name+'">Profile</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/detail.ll?role=Manager&name='+data.personal.name+'">Detail</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/squad.ll?role=Manager&name='+data.personal.name+'">Squad</a>'+
							'				</div>'+
							'			</div>'+
							'			<div class="ui divider"></div>'+
							'			<div class="item">'+
							'				<h4 class="f k r">'+
							'					<a class="link f k r" href="${path}/fifa/title.ll?role=Manager&name='+data.personal.name+'">'+
							'						History'+
							'					</a>'+
							'				</h4>'+
							'				<div class="ui secondary vertical pointing menu">'+
							'					<a class="rail item f k r" href="${path}/fifa/title.ll?role=Manager&name='+data.personal.name+'">Title</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/award.ll?role=Manager&name='+data.personal.name+'">Award</a>'+
							'					<a class="rail item f k r" href="${path}/fifa/record.ll?role=Manager&name='+data.personal.name+'">Record</a>'+
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
					if (data.role == 'Player'){
						alert('aa')
					}
				})
			}
		}
	})
})
</script>
</s:authorize>
</div>