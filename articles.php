<?php

$db = new DataBase_blog($pdo);
$articleList = $db->getAllFrom('pages1');

echo "<ul>";
foreach ($articleList as $row) {
    ?>    
    <div style='border:solid black 1px;'>
        <h3> <?php echo $row["title"] ?> </h3>
        <p> <?php echo $row["body"] ?> </p>
    </div>
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

?>