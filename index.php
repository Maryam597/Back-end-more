<?php
session_start();

?>






<?php include './includes/head.inc.html'; ?>
<?php include './includes/header.inc.html'; ?>


<div class="container-fluid">
  <div class="row">

    <nav class="col-md-3">


      <a href="index.php"> <button name="homebutton" type="button" class="btn btn-dark">Home</button></a>


      <?php  if (!isset($_GET['add'])) {


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
      } 
      
      
      
      
      elseif (isset($_POST['form'])) {


        $table = [
          'firstname' => $_POST['firstname'],
          'lastname' => $_POST['lastname'],
          'age' => $_POST['age'],
          'height' => $_POST['height'],
          'gender' => $_POST['gender']
        ];
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


        echo '<h2> Concaténation </h2>';

        echo ( '<p>' . 'M.' . ' ' . ucfirst($_SESSION['table']['firstname']) . ' ' . strtoupper($_SESSION['table']['lastname']));


        echo '<p>' . ' J\'ai' .' ' . $_SESSION['table']['age'] .' ' . 'ans et je mesure' .' ' . $_SESSION['table']['height'] .' ' . 'mètre.';



        // str_replace(',', '.', ['table']['height']);


        }
         
     
        if (isset($_GET['loop'])) {

          echo '<h2>Boucle</h2>';
					echo '<h3> = = => Lecture du tableau à l\'aide d\'une boucle foreach</h3>';
					
          foreach ($_SESSION['table'] as $key => $value) {

            echo '<h5>' .$key . ':' . $value . '</h5>';

          }
        }


          if (isset($_GET['function'])) {
            $table = $_SESSION['table'];
            echo '<h2>Fonction</h2>';
						echo '<h3>===> Lecture du tableau à l\'aide d\'une boucle foreach</h3>';

            function readTable($table) {
              $n = 0;
              foreach ($_SESSION['table'] as $key => $value ) {

                echo 'à la ligne n°' . $n++ . ' ' . 'correspond la clé' . ' ' . '"' . $key . '"' . ' ' . 'et contient' . ' ' . '"' . $value . '"' . "<br>";
              }
            }

            readTable($table);


          }
        

          
      elseif (isset($_GET['del'])) {

        session_destroy();
      }


        elseif (isset($_POST['form2']))

      ?>




    </section>
  </div>
</div>

<?php
include './includes/footer.html';
?>