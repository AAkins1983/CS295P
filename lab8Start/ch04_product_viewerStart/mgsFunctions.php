<?php
	
	function getConnection()
	{
		$dsn = 'mysql:host=localhost;dbname=my_guitar_shop2';
		$username = 'mgs_user';
		$password = 'pa55word';
		
		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $db;
	}
	
	function getCategory($db, $category_id)
	{
		$queryCategory = 'SELECT * FROM categories		
                      WHERE categoryID = :category_id';
		$statement1 = $db->prepare($queryCategory);
		$statement1->bindValue(':category_id', $category_id);
		$statement1->execute();
		$category = $statement1->fetch();	// "fetch" because we know they only want to return one record.
		$statement1->closeCursor();
		return $category;
	}
	
	/*function displayCategoryList($categories)
{
echo "<ul>";
foreach ($categories as $category)
{
echo "<li>";
echo "<a href='?category_id=" . $category['categoryID'] ."'>";
echo $category['categoryName'];
echo "</a>";
echo "</li>";
}
echo "</ul>";
}*/
	
	try
	{
		$db = getConnection();
		print_r(getCategory($db, 1));
		$db = null;		// lets go of PDO object connection
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}
	
?>
