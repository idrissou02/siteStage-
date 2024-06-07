<?php include('\laragon\www\stage\site\includes\header.php'); ?>
<main>
    <h2>Catalogue</h2>
    <div class="categories">
        <?php
        include('../includes/db.php');
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            echo "<div class='category'>";
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</main>
<?php include('\laragon\www\stage\site\includes\footer.php'); ?>
