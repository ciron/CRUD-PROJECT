<?php 
    include_once 'header.php';
    include_once 'config.php';

?>
<?php 
    $db=new Database();
    if(isset($_POST['submit'])){
        $name=mysqli_real_escape_string($db->link, $_POST['names']);
        $email=mysqli_real_escape_string( $db->link,$_POST['email']);
        $skill=mysqli_real_escape_string( $db->link,$_POST['skill']);
        if($name == '' || $email == '' || $skill == ''){
        $error = "Filed must not be Empty";

        }else {
            $insert="INSERT INTO  tbl_user(names,email,skill) Values ('$name','$email','$skill')";
            $create= $db->inserted($insert);
        }
    }
?>
<section class="insert">
    <div class="container">
        <div class="insert-form">
        <?php 
                if(isset($error)){
                    echo ".$error.";
                }
            ?>
        <form action="insert.php" method="POST">
            <table class="tblone">
                <tr>
                    <td class="name-label">Name</td>
                    <td class="name-input"><input id="tbl-input" type="text" name="names"placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td class="name-label">Email</td>
                    <td class="name-input" ><input id="tbl-input" type="email" name="email"placeholder="Enter your email"></td>
                </tr>
                <tr>
                    <td class="name-label">Skill</td>
                    <td class="name-input"><input id="tbl-input" type="text" name="skill"placeholder="Enter your skill"></td>
                </tr>
               
            </table>
            <div class="table-footer">
                <a href="read.php" class="back">Go Back</a>
                <input class="submit" type="submit" name="submit" value="Submit">
                <input class="reset" type="reset" value="Cancel">
            </div>
        </form>
        </div>
    </div>
</section>
<?php include_once 'footer.php';?>