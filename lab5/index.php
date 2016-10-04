<body>
    <a href="create.php">Create</a>
    <a href="add.php">Add</a>
    <a href="update.php">Update</a>
    <a href="find.php">Find</a>
    <?php
        if (!empty($_GET['task']))
        {
            $task = $_GET['task'];
            
            if ($task == 'create')
            {
                echo "<p>The item was successfully created.</p>";
            }
            if ($task == 'delete')
            {
                echo "<p>The item was successfully deleted.</p>";
            }
            if ($task == 'update')
            {
                echo "<p>The item was successfully updated.</p>";
            }
        }
    ?>
</body>


