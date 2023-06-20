

<form action="./index.php" method="post" class="row" enctype="multipart/form-data">


<fieldset class="col-md-7">

<div class="form-floating mb-3 mt-3">
        <input  type="text" name="firstname" placeholder="Prénom" />


    </div>

    <br>

    <div class="form-floating mb-3">
        <input type="text" name="lastname" placeholder="Nom" />
    </div>


    <br>

    <div class="form-group">
        <label for="age">Age (18 à 70 ans)</label>
        <input type="number" name="age" min="18" max="60" value="Renseignez votre âge"
        placeholder="Renseignez votre age" class="form-control" id="age"/>
    </div>

  


    <br>

    <div class="form-group input-group">
        <div class="input-group-prepend">
        <label for="height" class="input-group-text">Taille (1,26m à 3m)</label>
    </div>

        <input type="number" class="form-control" name="height"  min="1.26" max="3.00" step="0.01" placeholder="Renseignez votre taille" />
    <div class="input-group-append">
        <span class="input-group-text">m</span>
      </div>
</div>


    <br>

    <div class="d-flex mb-3" >
        <input class="form-check-label" type="radio" name="gender" value="Homme">Homme
        <input class="form-check-label" type="radio" name="gender" value="Femme">Femme
    </div>

    <br>

   

</fieldset>

<fieldset class="col-md-3">

<!-- <div class="card col-md-4 mx-auto my-1"> -->

<legend>Connaissances</legend>

<div class="languages" type="submit">

<div>
<input type="checkbox" name="HTML" value="HTML"></input>
<label for="">HTML</label>

</div>

<div>
<input type="checkbox" name="CSS" value="CSS"></input>
<label for="">CSS</label>
</div>

<div>
<input type="checkbox" name="JavaScript" value="JavaScript"></input>
<label for="">JavaScript</label>
</div>

<div>
    <input type="checkbox" name="PHP" value="PHP"></input>
    <label for="">PHP</label>
    </div>

<div>
<input type="checkbox" name="MySQL" value="MySQL"></input>
<label for="">MySQL</label>
</div>


<div>
    <input type="checkbox" name="Bootstrap" value="Bootstrap"></input>
<label for="">Bootstrap</label>
    </div>

<div>
<input type="checkbox" name="Symfony" value="Symfony"></input>
<label for="">Symfony</label>
</div>

<div>

<input type="checkbox" name="React" value="React"></input>
<label for="">React</label>
</div>

</div>

<div class="colors">

<label for="favcolor">Couleur préférée</label>
<input type="color" id="favouritecolor" name="favouritecolour" value="#000000">

</div>

<div class="date of birth">
<label for="date of birth">Date de naissance</label>
<input type="date" id="date of birth" name="date of birth">

</div>




</fieldset>



<div class="card col-11 mx-auto my-1">

<label for="picture"> Joindre une image (jpg ou png) </label>

<div action="index.php" method="POST" enctype="multipart/form-data">
        <label for="file">Parcourir</label>
        <input type="file" name="file">

</div>

</div>
<div class="d-flex justify-content-end col-md-7">
        <input class="btn btn-primary"  type="submit" value="Enregistrer" name="form" />
        

    </div>

</form>