<?php 
require 'database.php';
 $idClient=0;
  if(!empty($_GET['idClient'])){
       $idClient=$_REQUEST['idClient'];
     }
 if(!empty($_POST)){ 
    $idClient= $_POST['idClient']; 
    $pdo=Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM client  WHERE idClient = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idClient));
    Database::disconnect();
    header("Location: index.php");

    }
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
                <link href="css/bootstrap.min.css" rel="stylesheet">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
        </head>
        
        <body>

            <br />
            <div class="container">
                

            <br />
            <div class="span10 offset1">

            <br />
                <div class="row">

                <br />
                <h3>Delete a Client</h3>
                <p>

                </div>
            <p>

                                
            <br />
            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="idClient" value="<?php echo $idClient;?>"/>
                                
                Cofirmation de suppersion du client  ?

                <br />
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn" href="../index.php">No</a>
                </div>
                <p>

            </form>
                <p>
                </div>
                <p>

                            
            </div>
            <p>
            <!-- /container -->
        </body>
    </html>