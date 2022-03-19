<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <div id = "form-container">
        <h1>Add Record</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br/><br/>
            <label>Name:</label>
            <input type="input" name="name" id="add_Name" /> 
            <br/><br/>

            <label>Release Year:</label>
            <input type="input" name="release_year" required pattern = "[0-9]{4}">
            <br/><br/><br/><br/> 
            
            <label>Runtime:</label>
            <input type="input" name="runtime" required pattern = "[0-9]{3}">
            <br/><br/><br/><br/>

            <label>RT Score:</label>
            <input type="input" name="rotten_tomatoes_score" required pattern = "[0-9]{2}">
            <br/><br/>
            
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br/><br/>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Record">
            <br>
        </form>
            </div>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>