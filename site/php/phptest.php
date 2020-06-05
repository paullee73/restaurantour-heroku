<!DOCTYPE HTML>  
    <html>
        <head>
        </head>
    <body>
        Name
        <br />
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <input type="text" name="name" />
            <br />
            Password
            <br/>
            <input type="text" name="password"/>
            <br />
            <button type="submit" value="Submit"> Submit </button>
            <br />
        </form>


        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $user = 'root';
                $pass = '';
                $db = 'mysql';

                $con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

                if(mysqli_connect_errno())
                {
                echo "No bueno";
                }
                if (empty($_POST['name']) || empty($_POST['password'])){
                    echo "<center><font color='red'><i>Please fill out all fields</i></font> <br /></center>";
                }
                else
                {
                    $userName = $_POST['name'];
                    $statement = $con->prepare("select * FROM Users where name=?");
                    $statement->bind_param('s',$userName);
                    $statement->execute();
                    $statement->store_result();
                    $statement->bind_result($id,$name,$password);
                    echo ($statement->num_rows);
                    if($statement->num_rows>0) { 
                        while($statement->fetch()){
                            if($_POST['password'] == $password)
                            {
                                echo "you are logged in!";
                            }
                            else
                            {
                                echo "Wrong information input";
                            }
                        }
                    } 
                    else
                    {
                        echo "<center><font color='red'><i>User not found. Please create an account.</i></font> <br /></center>";
                    }
                }
            }
        ?>

    </body>
</html>