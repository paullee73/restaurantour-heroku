<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="index.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- addin jQuery to the file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>Restaurantour</title>
</head>

<body>
    <!-- navigation bar -->
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Restaurantour</a>
                </div>
                <!-- elements in navbar to collapse into button -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="restaurants.html">Restaurants</a>
                        </li>
                        <li>
                            <a href="review.html">Reviews</a>
                        </li>
                        <li>
                            <a href="writeReview.php">Write a Review</a>
                        </li>
                        <li>
                            <a href="writeRestaurant.html">Upload a Restaurant</a>
                        </li>
                        <li>
                            <a href="searchDishes.html">Search Dish</a>
                        </li>
                        <li>
                            <a href="createDishes.php">Upload Dish</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="signup.html">
                                <span class="glyphicon glyphicon-user"></span> Sign Up</a>
                        </li>
                        <li>
                            <a href="login.html">
                                <span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                        <li>
                            <a href="./php/logout.php">
                                <span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container" id="signup-form">
        <br />
        <br />
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8" id="form">
                <div class="form-group">
                    <form action="./php/submitReview.php" method="post">
                        <div class="form-group">
                            <label for="restaurant">Restaurant:</label>
                            <?php 
                            include_once("./php/library.php"); // To connect to the database
                            $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                            $sql = "SELECT * FROM restaurants";
                            $result = mysqli_query($con, $sql);
                            echo "<select name='restID'>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['restID'] ."'>" . $row['restName'] ."</option>";
                            }
                            echo "</select>";
                            ?>

                        <div class="form-group">
                            <label for="stars">Stars:</label>
                            <select name="stars">
                                <option input type="number" step="1">1</option>
                                <option input type="number" step="2">2</option>
                                <option input type="number" step="3">3</option>
                                <option input type="number" step="4">4</option>
                                <option input type="number" step="5">5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="review">Review:</label>
                            <textarea name="review" class="form-control"
                                ng-model="password">Enter a review...</textarea>
                        </div>

                        <button type="submit" value="Submit" name="submit" class="btn btn-default">
                            Submit
                        </button>
                        </br>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
<footer class="footer">
    <div class="container" id="footer">
        <small>
            <center>
                Copyright © 2017 Restaurantour Technologies
            </center>
        </small>
    </div>
</footer>

</html>