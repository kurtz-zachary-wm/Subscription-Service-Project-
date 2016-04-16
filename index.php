<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gainz Crate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
            min-height:200px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="upload.php">Tip/Tricks</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="http://cdn2.hubspot.net/hubfs/459335/img/brand/op/hero-stonyfield-op-family.jpg" alt="Image">
            <div class="carousel-caption">
                <h3 style="color: greenyellow;">Protein Shakes</h3>
                <p style="color: greenyellow;">   </p>
            </div>
        </div>

        <div class="item">
            <img src="http://gobeorganics.com/wp-content/uploads/2014/09/protein-bar-1200x400.jpg" alt="Image">
            <div class="carousel-caption">
                <h3 style="color: greenyellow">Protein Bars</h3>
                <p style="color: greenyellow;">For Pre or Post Workout</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container text-center">
    <h3 id="about">What Does Our Service Provide for The Consumer?</h3><br>
    <p>
        We send packages containing different products containing protein. These packages get sent every two weeks.
    </p>
    <div class="row">
        <div class="col-sm-4">
            <img src="http://i0.wp.com/www.liveworktrain.com/wp-content/uploads/2015/10/Blog-Post-6236.jpg?resize=360%2C200" class="img-responsive" style="width:100%" alt="Image">
            <p>Examples from package #1</p>
        </div>
        <div class="col-sm-4">
            <img src="http://healthy-magazines.com/wp-content/uploads/2014/06/HM-protein101-360x200.jpg" class="img-responsive" style="width:100%" alt="Image">
            <p>Examples of package #2</p>
        </div>
        <div class="col-sm-4">
            <div class="well">
                <h2 id="prices">
                    Package #1 $20
                </h2>
                <p>Includes: 4 shakes, 6 bars, and 4 scoops of protein. </p>
                <button onclick="one()">
                    Order
                </button>
            </div>
            <div class="well">
                <h2>
                    Package #2 $30
                </h2>
                <p>Includes: 6 shakes, 8 bars, and 6 scoops of protein. </p>
                <button onclick="one()">
                    Order
                </button>
            </div>
        </div>
    </div>
</div><br>

<footer class="container-fluid text-center">
    <p>&copy; Zachary Kurtz 2016</p>
</footer>

</body>
</html>
<script>
    function one() {
        alert ('Your order has been submitted.');
    }
</script>
