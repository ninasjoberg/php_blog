<?php
include '../partials/header.php';

$db = new DataBase_blog($pdo);
$commentList = $db->getAllFrom('comments');

echo "<ul>";
foreach ($commentList as $row) {
?>    
    <div style='border:solid black 1px;'>
        <h3> <?php echo $row["text"] ?> </h3>
    </div>
    <p> Created: <?php echo $row["created"] ?> </p>
    <form action="functions/delete.php" method="POST">
        <input type="hidden" value="<?php echo $row["id"]?>" name="id">
        <input type="submit" value="Delete">
     </form>
     <form action="functions/editPost.php" method="POST">
        <input type="hidden" value="<?php echo $row["id"]?>" name="id">
        <input type="submit" value="Edit">
     </form>
<?php    
}
echo "</ul>";

include '../partials/footer.php';
?>