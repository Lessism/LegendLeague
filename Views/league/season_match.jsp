<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ include file="../include/header.jsp" %>
<section class="ui black segment container">
<c:set var="rail" value="league"/>
<%@ include file="../include/rail.jsp" %>
<div id="rankchart" style="max-width:500px;"></div>
</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
<script>
window.onload = function () {
	var chart = new CanvasJS.Chart("rankchart", {
		title	:{text: "2019/20 Season"},
		data	: [{
			type: "line",
			dataPoints: [
				{ x: new Date(2012, 00, 1), y: 450 },
				{ x: new Date(2012, 01, 1), y: 414 },
				{ x: new Date(2012, 02, 1), y: 520 },
				{ x: new Date(2012, 03, 1), y: 460 },
				{ x: new Date(2012, 04, 1), y: 450 },
				{ x: new Date(2012, 05, 1), y: 500 },
				{ x: new Date(2012, 06, 1), y: 480 },
				{ x: new Date(2012, 07, 1), y: 480 },
				{ x: new Date(2012, 08, 1), y: 410 },
				{ x: new Date(2012, 09, 1), y: 500 },
				{ x: new Date(2012, 10, 1), y: 480 },
				{ x: new Date(2012, 11, 1), y: 510 }
		  ]
		}]
	})
	
	chart.render();
}
</script>
<jsp:include page="../include/footer.jsp"/>