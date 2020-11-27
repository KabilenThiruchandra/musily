<?php
$song = $_GET['song'];
include('./database/config.php');
$sql = "SELECT * FROM music WHERE ID='$song' ";
$result = mysqli_query($db, $sql);

$row = mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Musily | <?php echo $row['title']; ?></title>
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

    <main class="main-bg" style="padding-bottom: 0px">

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

        <div class="lyric-page-padding">

            <div class="album-card">
                <img class="music-thumbnail-big" src="./upload/images/<?php echo $row['image']; ?>" alt="Avatar">
                <div class="music-info">
                    <h2><strong><?php echo $row['title']; ?></strong></h2>
                    <h3><?php echo $row['artist']; ?></h3>
                    <h3><?php echo $row['album']; ?></h3>
                </div>
            </div>

            <div class="lyric-card">
                <?php echo $row['lyrics']; ?>
            </div>

        </div>

        <div class="audio-padding">
            <audio class="mp3" controls controlsList="nodownload" src="./upload/audios/<?php echo $row['audio']; ?>" type="audio/mpeg"></audio>
        </div>

    </main>

    <footer>
        <p>Musily &copy; Copyright 2020 | All Rights Reserved</p>
    </footer>

    <script type="text/javascript" src="./js/navigation.js"></script>

</body>

</html>