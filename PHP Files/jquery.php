<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#aa").keyup(function(){
				data=jQuery(this).val();
				$.ajax({
					type:"post",
					url:"aa.php",
					data:{"a":data},
					success:function(data1){
						jQuery("#aa1").html(data1);
					}
				});
			});
		});
	</script>
</head>
<body>
	<form>
		Username <input type="text" name="t1" id="aa">
		<h1 id="aa1">Response</h1>		
	</form>
</body>
</html>