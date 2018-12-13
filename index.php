<?php require_once "connect_database.php" ?>
<?php include_once "_header.php" ?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="droplist">
                <input type="text"
                       name="userInput"
                       id="userInput"
                       class="my-custom-select"
                       placeholder="search..."
                       />
                <div id="droplistContent" class="dropdown-content">

                </div>
            </div>

            <div class="row">
                <a href="create.php" class="btn btn-success">Add</a>
                <table class="table table-bordered">
                    <thread>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>LastName</th>
                            <th>Email</th>
                        </tr>
                    </thread>
                    <tbody>
                    <?php
                    $result = $connect->query("SELECT Id, FirstName, LastName, Email FROM tblusers");
                    while($row=$result->fetch_assoc()){
                        echo "
                        <tr>
                        <td>{$row['Id']}</td>
                        <td>{$row['FirstName']}</td>
                        <td>{$row['LastName']}</td>
                        <td>{$row['Email']}</td>
                        </tr>
                        ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

<?php include_once "_footer.php" ?>