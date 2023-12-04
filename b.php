<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<input type="text" name="name" id="name" onchange="getValue()">


<script type="text/javascript">
    //  $(document).ready(function() {


	function getValue()
	{
		var name = document.getElementById('name').value;
		alert(name);
	}

// });

</script>
</body>
</html>