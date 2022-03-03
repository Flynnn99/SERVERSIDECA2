<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>





<section>
<!-- display a table of records -->
<h1 class="buttons">
    <a href="add_record_form.php">Add Record</a>
    <a href="category_list.php">Manage Categories</a>
</h1>
<h1 class="catName" ><?php echo $category_name; ?></h2>

<div class="table-container">
<table>    
<tr class="tablehead">
<th>Image</th>
<th>Name</th>
<th>Release</th>
<th>Runtime</th>
<th>Rotten Tomatoes Score</th>
<th></th>
<th></th>
</tr>
<?php foreach ($records as $record) : ?>
<tr class="tbody">
<td><img src="image_uploads/<?php echo $record['image']; ?>" width="150px" height="150px" /></td>

<td><?php echo $record['name']; ?></td>
<td class="right"><?php echo $record['release_year']; ?></td>
<td class="right"><?php echo $record['runtime']; ?> </td> 
<td class="right"><?php echo $record['rotten_tomatoes_score']; ?> </td>

<td><form action="delete_record.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<input class="del_btn" type="submit" value="Delete">

</form></td>
<td><form action="edit_record_form.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<input class ="ed_btn" type="submit" value="Edit">
</form></td>

</tr>
<?php endforeach; ?>
</table>
</div>
</section>
<?php
include('includes/footer.php');
?>