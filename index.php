<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Bansue du peuble</title>
        
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        	<link href="css/responsive.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>

        <br />
        <div class="container">

        <br />
        <div class="row">

            <br />
              <h2>Client</h2>
            <p>

        </div>
        <p>
            <br />
            <div class="row">
                <a href="controller/add.php" class="btn btn-success">Ajouter un client</a>                           
                <br />
                <div class="table-responsive">
                    <br />
                    <table class="table table-hover table-bordered">

                        <br />
                        <thead>

                            <th>Name</th>
                            <p>

                            <th>Prenom</th>
                            <p>

                            <th>Age</th>
                            <p>

                            <th>Tel</th>
                            <p>

                            <th>region</th>
                            <p>

                            <th>Email</th>
                            <p>

                        </thead>
                        <p>
                        <br />
                        <tbody>
                            <?php include 'controller/database.php'; 
                            //on inclut notre fichier de connection 
                            $pdo = Database::connect(); 
                            //on se connecte à la base
                            $sql = 'SELECT * FROM client ORDER BY  	idClient DESC';
                            
                              //on formule notre requete
                              foreach($pdo->query($sql) as $row){
                                  
                                 //on cree les lignes du tableau avec chaque valeur retournée
                                    echo'<br /><tr>';
                                    echo'<td>' . $row['name'] . '</td><p>';
                                    echo'<td>' . $row['firstname'] . '</td><p>';
                                    echo'<td>' . $row['age'] . '</td><p>';
                                    echo'<td>' . $row['tel'] . '</td><p>';
                                    echo'<td>' . $row['email'] . '</td><p>';
                                    echo'<td>' . $row['region'] . '</td><p>';
                                   
                                    
                                    echo '<td>';
                                    echo '<a class="btn btn-success" href="controller/update.php? idClient=' . $row['idClient'] . '">Update</a>';// un autre td pour le bouton d'update
                                    echo '</td><p>';
                                    echo'<td>';
                                    echo '<a class="btn btn-danger" href="controller/delete.php? 	idClient=' . $row['idClient'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
                                    echo '</td><p>';
                                    echo '</tr><p>';
                                        
                                     Database::disconnect(); //on se deconnecte de la base;
                               }
                            ?>    
                        </tbody>
                        <p>
                    </table>
                    <p>
                </div>
                <p>
            </div>
            <p>
        </div>
        <p>

    </body>
</html>