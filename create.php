
<?php
$errors = array();
$lastname = "";
$firstname = "";
$email = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connect_database.php";

    if (isset($_POST['lastname']) and !empty($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
    } else
        $errors['lastname'] = "Last name is empty";

    if (isset($_POST['firstname']) and !empty($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
    } else
        $errors['firstname'] = "First name is empty";

    if (isset($_POST['email']) and !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else
        $errors['email'] = "Email is empty";
    $password;
    if (isset($_POST['password']) and !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else
        $errors['password'] = "Password is empty";

//    if(!isset($errors["email"]))
//    {
//        $res = $connect->query("select count(*) as total from mydb.tblusers where Email='{$email}'");
//        $data = $res->fetch_assoc();
//        if($data['total']>0)
//        {
//            $errors['email'] = "This email is in db";
//        }
//    }

    if (count($errors) == 0) {
        $query = "INSERT INTO `tblusers` (`Email`, `FirstName`, `LastName`, `Password`) VALUES ('{$email}', '{$firstname}', '{$lastname}', '{$password}')";
        $result = $connect->query($query);
        $linkIndex = "/index.php";
        header("Location: {$linkIndex}");
        exit;
    }
}
?>
<?php include_once "scripts.php" ?>
<?php include_once "_header.php" ?>

    <div class="container">
        <?php
        if (count($errors) != 0) {
            echo "
        <div class='alert alert-danger' role = 'alert' >
            Заповни поля
        </div >
        ";
        }
        ?>

        <h1>Add new user</h1>

        <form method="post" action="create.php">
            <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">First name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $firstname ?>"
                           class="form-control <?php if (isset($errors["firstname"])) {
                               echo "is-invalid";
                           } else {
                               echo "is-valid";
                           } ?>" name="firstname" id="firstname" placeholder="First name">
                    <label class="col-3"><?php if (isset($errors["firstname"])) {
                            echo $errors["firstname"];
                        } else {
                            echo "";
                        } ?></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Last name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $lastname ?>"
                           class="form-control <?php if (isset($errors["lastname"])) {
                               echo "is-invalid";
                           } else {
                               echo "is-valid";
                           } ?> " name="lastname" id="lastname" placeholder="Last name">
                    <label class="col-3"><?php if (isset($errors["lastname"])) {
                            echo $errors["lastname"];
                        } else {
                            echo "";
                        } ?></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-7 <?php if (isset($errors["email"])) {
                        echo "is-invalid";
                    } else {
                        echo "is-valid";
                    } ?> " name="email" value="<?php echo $email; ?>" id="email" placeholder="Email">
                    <label class="col-3"><?php if (isset($errors["email"])) {
                            echo $errors["email"];
                        } else {
                            echo "";
                        } ?></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control col-7 <?php if (isset($errors["password"])) {
                        echo "is-invalid";
                    } else {
                        echo "is-valid";
                    } ?> " name="password" id="password" placeholder="Password">
                    <label class="col-3"><?php if (isset($errors["password"])) {
                            echo $errors["password"];
                        } else {
                            echo "";
                        } ?></label>
                </div>
            </div>
            <button id="btnSubmit" type="submit" onmouseenter="myFunction(<?php echo count($errors)?>)" class="btn " >Create
            </button>
        </form>
    </div>
<script>
    function myFunction(cc) {
    let btnClass = (cc == 0) ? "btn-success" : "btn-danger";
    let element = document.getElementById("btnSubmit");
    element.classList.add(btnClass);
    }
</script>
<?php include_once "_footer.php" ?>


