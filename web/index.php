<!DOCTYPE html>
<html>

	<head> <title>Weather Crowdsourcing Visualization</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script>
			$(document).ready(function(){

				$("#submit-button").click(function(){

					var num_time_instances = $("#num-time-instances").val();
					var type_ = $("input[name=isOffline]:checked").val();
					var type_budget_ = $("input[name=fixedbudget]:checked").val();
					var num_distributions = $("#num-gauss-distribution").val();
					var budget_ = $("#budget").val();
					var tMean = $("#tMean").val();
			        $.ajax({
			        	url: "process.php", 
			        	data: {'instances': num_time_instances,

			        			'isOffline': type_,
			        			'distributions': num_distributions,
			        			'budget': budget_,
			        			'fixedbudget': type_budget_,
			        			'tMean':tMean
			        		  },

			        	success: function(result){
			            $("#main-top").html(result);
			        }});
    			});
			});
		</script>
	</head>
	<body>
		<div id="left">

				Number of time instances: <br>
				<input id="num-time-instances" type="text"><br>
				On/Offline: <br>
				<input type="radio" name="isOffline" value="true"> Offline
				<br>
				<input type="radio" name="isOffline" value="false">Online
				<br> 

				Budget: <br>
				<input type="radio" name="fixedbudget" value="true"> Fixed
				<br>
				<input type="radio" name="fixedbudget" value="false">Dynamic
				<br>

				Task generation: <br>
				Number of mixed gaussian distributions: <br> 
				<input type="text" id="num-gauss-distribution"><br>
				tMean: <br>
				<input type="text" id="tMean"><br>

				Total budget: <br>
				<input type="text" id="budget"><br>

				<button id="submit-button">Submit </button>

		</div>
		<div id="main-top">
		</div>
		<div id="main-bottom">
		</div>

	</body>
	

</html>