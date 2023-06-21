<?php
session_start();
?>






<?php include './includes/head.inc.html'; ?>
<?php include './includes/header.inc.html'; ?>


<div class="container-fluid">
  <div class="row">

    <nav class="col-md-3">


      <a href="index.php"> <button name="homebutton" type="button" class="btn btn-dark">Home</button></a>


      <?php if (!isset($_GET['add'])) {


        echo '<a href="index.php?add"> <button type="button" class="btn btn-dark">Ajouter des données</button></a>';
      }


      if (!isset($_GET['addmore'])) {


        echo '<a href="index.php?addmore"> <button type="button" class="btn btn-dark">Ajouter plus de données</button></a>';
      }


      if (isset($_SESSION['table'])) {
        include_once './includes/ul.inc.html';
      }
      ?>



    </nav>


    <section class="col-md-9">

      <?php




      if (isset($_GET['add'])) {
        include_once './includes/form.html';
      }

      if (isset($_GET['addmore'])) {
        include_once './includes/form2.php';
      } elseif (isset($_POST['form']) || (isset($_POST['form2']))) {


        $table = [
          'firstname' => $_POST['firstname'],
          'lastname' => $_POST['lastname'],
          'age' => $_POST['age'],
          'height' => $_POST['height'],
          'gender' => $_POST['gender'],
        ];


        if (isset($_POST['favouritecolour'])) {  // vérification de l'existence de ''
          $table['favouritecolour'] = $_POST['favouritecolour']; // ajouter la valeur dans $table
        }

        if (isset($_POST['date of birth'])) {
          $table['date of birth'] = $_POST['date of birth'];
        }

        if (isset($_POST['HTML'])) {
          $table['HTML'] = $_POST['HTML'];
        }

        if (isset($_POST['CSS'])) {
          $table['CSS'] = $_POST['CSS'];
        }

        if (isset($_POST['JavaScript'])) {
          $table['JavaScript'] = $_POST['JavaScript'];
        }

        if (isset($_POST['PHP'])) {
          $table['PHP'] = $_POST['PHP'];
        }

        if (isset($_POST['MySQL'])) {
          $table['MySQL'] = $_POST['MySQL'];
        }

        if (isset($_POST['Bootstrap'])) {
          $table['Bootstrap'] = $_POST['Bootstrap'];
        }
        if (isset($_POST['Symfony'])) {
          $table['Symfony'] = $_POST['Symfony'];
        }
        if (isset($_POST['React'])) {
          $table['React'] = $_POST['React']; // $table clé    post valeur
        }


        if (isset($_FILES['file'])) {
          var_dump($_FILES);
          $tmpName = $_FILES['file']['tmp_name'];
          $type = $_FILES['file']['type'];
          $name = $_FILES['file']['name'];
          $size = $_FILES['file']['size'];
          $error = $_FILES['file']['error'];



          $tabExtension = explode('.', $name); // séparer les caractères des points
          $extension = strtolower(end($tabExtension)); // permet de mettre en min pour éviter les erreurs de lecture 

          $extensions = ['jpg', 'png'];

          $maxSize = 200000;

          if (in_array($extension, $extensions) && $size <= $maxSize) { // vérification taille et extension
            move_uploaded_file($tmpName, './uploaded/' . $name); // stocker image dans un dossier
          } else {
            echo "Mauvaise extension ou taille trop grande";
          }
          $table['img'] = array( //création d'un tableau dans un tableau
            'tmp_name' => $tmpName, // clé
            'type' => $type,
            'name' => $name,
            'size' => $size,
            'error' => $error,
          );



        }




        $_SESSION['table'] = $table;
        echo '<h3>Données sauvegardées</h3>';
      } elseif (isset($_SESSION['table'])) {


        if (isset($_GET['debugging'])) {

          echo '<pre>';

          print_r($_SESSION['table']);
        }

        echo '</pre>';
      }






      if (isset($_GET['concatenation'])) {


        // $tab = $_SESSION['table'];
        // function gender($tab){
        //   if ($tab['gender'] === 'Homme'){
        //     echo 'M.';
        //   }
        //   else{
        //     echo 'Mme';
        //   }
        // }

        echo '<h2> Concaténation </h2> <br>

        <h3> ===> Construction d\'une phrase avec le contenu du tableau </h3>';


        echo ('<p>' . 'M.' . ' ' . ($_SESSION['table']['firstname']) . ' ' . ($_SESSION['table']['lastname']));


        echo '<p>' . ' J\'ai' . ' ' . $_SESSION['table']['age'] . ' ' . 'ans et je mesure' . ' ' . $_SESSION['table']['height'] . ' ' . 'mètre.';


       echo '<h3> ===> Construction d\'une phrase après MAJ du tableau </h3>';



        echo ('<p>' . 'M.' . ' ' . ucfirst($_SESSION['table']['firstname']) . ' ' . strtoupper($_SESSION['table']['lastname']));


        echo '<p>' . ' J\'ai' . ' ' . $_SESSION['table']['age'] . ' ' . 'ans et je mesure' . ' ' . $_SESSION['table']['height'] . ' ' . 'mètre.';



        echo '<h3> ===> Affichage d\'une virgule à la place du point pour la taille </h3>';


        echo ('<p>' . 'M.' . ' ' . ucfirst($_SESSION['table']['firstname']) . ' ' . strtoupper($_SESSION['table']['lastname']));


        echo '<p>' . ' J\'ai' . ' ' . $_SESSION['table']['age'] . ' ' . 'ans et je mesure' . ' ' .         str_replace('.', ',',  $_SESSION['table']['height']) . ' ' . 'mètre.';



      }


      if (isset($_GET['loop'])) {

        echo '<h2>Boucle</h2>';
        echo '<h3> = = => Lecture du tableau à l\'aide d\'une boucle foreach</h3>';

        $n = 0;

        foreach ($_SESSION['table'] as $key => $value) {
          if ($key != 'img') {
            echo 'à la ligne n°' . $n++ . ' ' . 'correspond la clé' . ' ' . '"' . $key . '"' . ' ' . 'et contient' . ' ' . '"' . $value . '"' . "<br>";
          }
          else {
            // echo '<img src="./uploaded/' . $value["name"] . " 'alt="image" . >';

            echo "à la ligne n°" . $n++ . " correspond la clé " . $key . " et contient <br>";

            echo "<img class='mw-100' src='./uploaded/" . $value['name'] . "' alt='Image " . $value['name'] . "'><br><br>";


          }


        }
      }


      if (isset($_GET['function'])) {
        $table = $_SESSION['table'];
        echo '<h2>Fonction</h2>';
        echo '<h3>===> Lecture du tableau à l\'aide d\'une boucle foreach</h3>';

        function readTable($table)
        {
          $n = 0;
          foreach ($_SESSION['table'] as $key => $value) {

            echo 'à la ligne n°' . $n++ . ' ' . 'correspond la clé' . ' ' . '"' . $key . '"' . ' ' . 'et contient' . ' ' . '"' . $value . '"' . "<br>";
          }
        }

        readTable($table);
      } elseif (isset($_GET['del'])) {

        session_destroy();
      } elseif (isset($_POST['form2']))

        // if(isset($_POST['submit'])) //to run PHP script on submit
        // {   
        // if(!empty($_POST['check_list'])){
        // // Loop to store and display values of individual checked checkbox.
        // foreach($_POST['check_list'] as $selected){
        // echo $selected."</br>";
        // }
        // }
        // }

      ?>







    </section>
  </div>
</div>

<?php
include './includes/footer.html';
?>