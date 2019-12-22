<?php 
        require 'database.php'; 
        $id = null; 
        if ( !empty($_GET['idClient'])) {
             $idClient = $_REQUEST['idClient'];
            } 
        if ( null==$idClient ) {
             header("Location: index.php");
            } 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { // on initialise nos erreurs 
            $nameError = null;
            $firstnameError = null; 
            $ageError = null; 
            $telError = null; 
            $emailError = null; 
            $regionError = null;
             // On assigne nos valeurs 
            $name = $_POST['name'];
            $firstname = $_POST['firstname']; 
            $age = $_POST['age']; 
            $tel = $_POST['tel']; 
            $email = $_POST['email']; 
            $region = $_POST['region']; 
            // On verifie que les champs sont remplis 
            $validClient = true; 
            if (empty($name)) { 
                $nameError = 'Please enter Name';
                $validClient = false; 
            } 
            if (empty($firstname)) { 
                $firstnameError = 'Please enter firstname';
                $validClient = false; 
            } if (empty($email)) { 
                $emailError = 'Please enter Email Address'; 
                $validClient = false; 
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                $emailError = 'Please enter a valid Email Address'; 
                $validClient = false; 
            } 
            if (empty($age)) { 
                $ageError = 'Please enter your age'; 
                $validClient = false; 
            } 
            if (empty($tel)) { 
                $telError = 'Please enter phone'; 
                $validClient = false; 
            } if (!isset($region)) { 
                $regionError = 'Please select a country';
                $validClient = false; 
            } 
            
            if ($validClient) { 
            $pdo = Database::connect(); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "UPDATE client SET name = ?,firstname = ?,age = ?,tel = ?, email = ?, region = ? WHERE idClient = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$firstname, $age, $tel,$region, $email,$idClient));
            Database::disconnect();
            header("Location: index.php");
            }
        }else {

              $pdo = Database::connect();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "SELECT * FROM client where idClient = ?";
             $q = $pdo->prepare($sql);
             $q->execute(array($idClient));
             $data = $q->fetch(PDO::FETCH_ASSOC);
             $name = $data['name'];
             $firstname = $data['firstname'];
             $age = $data['age'];
             $tel = $data['tel'];
             $email = $data['email'];
             $region = $data['region'];
             Database::disconnect();
         }
        
     ?>

<!DOCTYPE html>
<html>
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>Crud-Update</title>
         <link href="css/bootstrap.min.css" rel="stylesheet">
     <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />

 </head>
 <body>
  

    <br />
    <div class="container">

        <br />
        <div class="row">

            <br />
            <h3>Modifier un contact</h3>
            <p>

        </div>
        <p>

        <br />
        <form method="post" action="update.php?idClient=<?php echo $idClient ;?>">

            <br />
            <div class="control-group <?php echo!empty($nameError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>

                <br />
                <div class="controls">
                    <input name="name" type="text"  placeholder="Name" value="<?php echo!empty($name) ? $name : ''; ?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>



            <br />
            <div class="control-group<?php echo!empty($firstnameError) ? 'error' : ''; ?>">
                <label class="control-label">firstname</label>

                <br />
                <div class="controls">
                    <input type="text" name="firstname" value="<?php echo!empty($firstname) ? $firstname : ''; ?>">
                    <?php if (!empty($firstnameError)): ?>
                        <span class="help-inline"><?php echo $firstnameError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>


            <br />
            <div class="control-group<?php echo !empty($ageError)?'error':'';?>">
                    <label class="control-label">Age</label>

                    <br />
                    <div class="controls">
                        <input type="date" name="age" value="<?php echo !empty($age)?$age:''; ?>">
                        <?php if(!empty($ageError)):?>
                        <span class="help-inline"><?php echo $ageError ;?></span>
                        <?php endif;?>
                    </div>
                    <p>

                </div>
            <p>



            <br />
            <div class="control-group <?php echo!empty($emailError) ? 'error' : ''; ?>">
                <label class="control-label">Email Address</label>

                <br />
                <div class="controls">
                    <input name="email" type="text" placeholder="Email Address" value="<?php echo!empty($email) ? $email : ''; ?>">
                    <?php if (!empty($emailError)): ?>
                        <span class="help-inline"><?php echo $emailError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>



            <br />
            <div class="control-group <?php echo!empty($telError) ? 'error' : ''; ?>">
                <label class="control-label">Telephone</label>

                <br />
                <div class="controls">
                    <input name="tel" type="text" placeholder="Telephone" value="<?php echo!empty($tel) ? $tel : ''; ?>">
                    <?php if (!empty($telError)): ?>
                        <span class="help-inline"><?php echo $telError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>



            <br />
            <div class="control-group<?php echo!empty($regionError) ? 'error' : ''; ?>">
                <select name="region">

                <option value="Dakar">Dakar</option>

                <option value="Diourbel"> Diourbel</option>

                <option value="Fatick">Fatick</option>
                <option value="Kaffrine">Kaffrine</option>

                <option value="Kaolack">Kaolack</option>

                <option value="Kédougou">Kédougou</option>

                <option value="Kolda"> Kolda</option>

                <option value="Louga"> Louga</option>

                <option value="Matam"> Matam</option>

                <option value="Saint-Louis"> Saint-Louis</option>

                <option value="Sédhiou">Sédhiou</option>

                <option value="Tambacounda">Tambacounda</option>

                <option value="Thiès">Thiès</option>

                <option value="Ziguinchor">Ziguinchor</option>


                </select>
                <?php if (!empty($regionError)): ?>
                    <span class="help-inline"><?php echo $regionError; ?></span>
                <?php endif; ?>
            </div>
            <p>

            <br />
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <a class="btn" href="../index.php">Retour</a>
            </div>
            <p>

        </form>
        <p>



    </div>
    <p>


 </body>
</html>