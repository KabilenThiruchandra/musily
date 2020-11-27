<!DOCTYPE html>
<html lang="en">

<head>
    <title>Musily | Musics and Lyrics</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./css/styles.css" type="text/css" />
    <link rel="stylesheet" href="./css/w3.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body>

    <nav>
        <div class="navigation-wrapper">
            <div class="navigation-button">
                <i class="fa fa-bars"></i>
            </div>

            <div class="navigation-menu">
                <ul>
                    <li><a href="./index">HOME </a></li>
                    <li><a href="./about">ABOUT</a></li>
                    <li><a href="./feedback">FEEDBACK</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-bg">
        <header>
            <a href="./index.php">
                <h1 class="logo">musily</h1>
            </a>

            <center>
                <div class="search-bar">
                    <form action="./index.php" method="POST" enctype="multipart/form-data">
                        <input type="text" placeholder="Search" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </center>
            
        </header>

        <!-- Song List Area -->
        <div class="w3-content music-page-padding" style="max-width: 1564px;">

            <div class="w3-row-padding">

                <?php
                include('./database/config.php');
                if (isset($_POST['search'])) {

                    global $db, $error;

                    $search = $_POST['search'];

                    if ($search == '') {
                        array_push($error, "The input is empty");
                    }

                    if (count($error) == 0) {

                        $sql = "SELECT * FROM music WHERE album LIKE '%$search%' OR artist LIKE '%$search%' OR title LIKE '%$search%'";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $x = 1;
                            while ($row = mysqli_fetch_assoc($result)) {

                ?>

                                <!-- Song Card -->
                                <div class="w3-col l3 m6 w3-margin-bottom">
                                    <div class="w3-display-container">
                                        <a href="./music?song=<?php echo $row['ID']; ?>"><img class="music-thumbnail-small" src="./upload/images/<?php echo $row['image']; ?>" alt="Thumbnail"></a>
                                        <div class="w3-display-bottom w3-white w3-padding btm-corner w3-center">
                                            <h4 class="music-name"><?php echo $row['title']; ?></h4>
                                            <p><?php echo $row['artist']; ?></p>
                                            <p><?php echo $row['album']; ?></p>
                                        </div>
                                    </div>
                                </div>

                        <?php

                            }
                        }
                    }
                } else {
                    global $db, $error;
                    $sql = "SELECT * FROM music ORDER BY ID DESC";
                    $result = mysqli_query($db, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                        <!-- Song Card -->
                        <div class="w3-col l3 m6 w3-margin-bottom">
                            <div class="w3-display-container">
                                <a href="./music?song=<?php echo $row['ID']; ?>"><img class="music-thumbnail-small" src="./upload/images/<?php echo $row['image']; ?>" alt="Thumbnail" /></a>
                                <div class="w3-display-bottom w3-white w3-padding btm-corner w3-center">
                                    <h4 class="music-name"><?php echo $row['title']; ?></h4>
                                    <p><?php echo $row['artist']; ?></p>
                                    <p><?php echo $row['album']; ?></p>
                                </div>
                            </div>
                        </div>

                <?php }
                } ?>

            </div>
        </div>
    </main>

    <footer>
        <p>Musily &copy; Copyright 2020 | All Rights Reserved</p>
    </footer>

    <script type="text/javascript" src="./js/navigation.js"></script>
</body>

</html>