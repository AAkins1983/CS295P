<html>
<body>
<h1>This page gets input from the user</h1>
<form id="page1" name="page1" method="post" action="lab1cOutput.php">
	<table>
		<tr>
			<td>Your Name: </td>
			<td><input type="text" id="studentName" name="studentName" /></td>
		</tr>
		<tr>
			<td>Your Favorite Teacher: </td>
			<td><input type="text" id="teacherName" name="teacherName" /></td>
		</tr>	
		<tr>
			<td>Your Favorite Programming Language: </td>
			<td><input type="text" id="progLanguage" name="progLanguage" /></td>
		</tr>
		<tr>
			<td><input type="submit" id="submit" name="submit" value="Echo Input" /></td>
			<td><input type="reset" id="reset" name="reset" value="Clear" /></td>
		</tr>
	</table>
</form>
</body>
</html>