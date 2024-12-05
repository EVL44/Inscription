<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .profile-header {
            display: flex;
            align-items: flex-start; /* Modifié pour un meilleur alignement avec l'image rectangulaire */
            gap: 30px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .profile-image {
            width: 150px; /* Largeur augmentée */
            height: 200px; /* Hauteur définie pour le format rectangle */
            object-fit: cover;
            border: 2px solid #4CAF50;
            border-radius: 8px; /* Coins arrondis plus légers */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .profile-title {
            flex: 1;
            padding-top: 10px; /* Ajout d'un peu d'espace en haut */
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .profile-email {
            color: #666;
            font-size: 1.1em;
        }

        .profile-section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 1.2em;
            color: #4CAF50;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .info-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .info-item {
            flex: 1;
            min-width: 200px;
            background-color: #f8f8f8;
            padding: 15px;
            border-radius: 6px;
        }

        .info-label {
            font-weight: bold;
            color: #666;
            margin-bottom: 5px;
            font-size: 0.9em;
        }

        .info-value {
            color: #333;
            font-size: 1.1em;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag {
            background-color: #4CAF50;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
        }

        .back-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 30px auto 0;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #45a049;
        }

       
    </style>
</head>
<body>
    <?php 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lastName = $_POST['lastName'] ;
            $firstName = $_POST['firstName'];
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'] ;
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            $skills = $_POST['skills'];

            $targetFile = "uploads/" . basename($_FILES['profilePhoto']['name']);
            
        }
    ?>
    <div class="container">
        <!-- En-tête du profil -->
        <div class="profile-header">
            <?php 

                // Attempt to upload file
                if (move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $targetFile)) {
                    echo "<img src='$targetFile' alt='Photo de profil' class='profile-image'>";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            ?>
            <!--<img src='uploads/profil.png' alt='Photo de profil' class='profile-image'>!-->
            <div class="profile-title">
                <h1> <?php echo"$lastName $firstName"; ?> </h1>
                <div class="profile-email">
                    <?php echo"$email"; ?>
                </div>
            </div>
        </div>

        <!-- Informations personnelles -->
        <div class="profile-section">
            <div class="section-title">Informations personnelles</div>
            <div class="info-grid">
                
                <div class="info-item">
                    <div class="info-label">Sexe</div>
                    <div class="info-value"> <?php echo"$gender"; ?> </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Pays</div>
                    <div class="info-value"> <?php echo"$country"; ?> </div>
                </div>
            </div>
        </div>

        <!-- Compétences -->
        <div class="profile-section">
            <div class="section-title">Compétences</div>
            <div class="skills-list">
            
            <?php
                foreach( $skills as $skill ){
                    echo '<span class="skill-tag">', $skill , '</span>';
                }
            ?>
                  
            </div>
        </div>

        <a href="addUser.php" class="back-button">Retour au formulaire</a>
    </div>
</body>
</html>