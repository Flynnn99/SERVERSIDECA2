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


<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $records['recordID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
                   value="<?php echo $records['categoryID']; ?>">
                   <br/><br/><br/><br/>

            <label>Name:</label>
            <input type="input" name="name"
                   value="<?php echo $records['name']; ?>">
                   <br/><br/><br/><br/>

            <label>Release Year:</label>
            <input type="input" name="release_year"
                   value="<?php echo $records['release_year']; ?>">
                   <br/><br/><br/><br/>

            <label>Runtime:</label>
            <input type="input" name="runtime"
                   value="<?php echo $records['runtime']; ?>">
                   <br/><br/>

            <label>Rotten Tomatoes Score:</label>
            <input type="input" name="rotten_tomatoes_score"
                   value="<?php echo $records['rotten_tomatoes_score']; ?>">
                   <br/><br/><br/><br/>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br/><br/><br/><br/>          
            <?php if ($records['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>