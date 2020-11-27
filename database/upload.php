<!DOCTYPE html>
<html lang="en">

<head>
    <title>Musily | Upload Panel</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/styles.css" type="text/css" />
    <link rel="stylesheet" href="../css/upload.css" type="text/css" />
    <link rel="stylesheet" href="../css/w3.css" type="text/css" />
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
                    <li><a href="../index.php">HOME </a></li>
                    <li><a href="../about.php">ABOUT</a></li>
                    <li><a href="../pricing.php">PRICING</a></li>
                    <li><a href="../faqs.php">FAQS</a></li>
                    <li><a href="../feedback.php">FEEDBACK</a></li>
                    <li><a href="../contact-us.php">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-bg">

        <header>
            <a href="../index.php">
                <h1 class="logo">musily</h1>
            </a>
        </header>

        <div class="container">
            <form action="./config.php" method="POST" enctype="multipart/form-data">

                <h1>Upload Panel</h1>
                <h3>Please fill in this form to create new Lyrics.</h3>
                <hr>

                <label for="title"><b>Song Title :</b></label>
                <input type="text" placeholder="Enter song title" name="title" required>

                <label for="title"><b>Album Name :</b></label>
                <input type="text" placeholder="Enter song album" name="album" required>

                <label for="title"><b>Artist Name :</b></label>
                <input type="text" placeholder="Enter Artist name" name="artist" required>

                <label for="title"><b>Full Lyrics :</b></label>
                <textarea type="text" wrap="hard" placeholder="Enter the Lyrics" name="lyrics" style="height:200px" required></textarea>

                <label for="title"><b>Album Cover :</b></label>
                <input type="file" placeholder="Select Image" name="image" accept="image/x-png,image/jpeg,image/jpg" required>

                <label for="title"><b>Audio File :</b></label>
                <input type="file" placeholder="Select Audio" name="audio" accept="audio/mp3,audio/m4a" required>

                <button type=" submit" name="upload" class="registerbtn">Submit</button>

            </form>
        </div>

    </main>

    <footer>
        <p>Musily &copy; Copyright 2020 | All Rights Reserved</p>
    </footer>

    <script type="text/javascript" src="../js/navigation.js"></script>

</body>

</html>