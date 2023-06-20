
<?php include './includes/form.html'; ?>


<form action="#" method="post">

<div class="card col-md-4 mx-auto my-1">

<label for="connaissances">Connaissances</label>

<div class="languages">

<input type="checkbox" name="knowledge" value="HTML">HTML</input>
<input type="checkbox" name="knowledge" value="CSS">CSS</input>
<input type="checkbox" name="knowledge" value="JavaScript">JavaScript</input>
<input type="checkbox" name="knowledge" value="PHP">PHP</input>
<input type="checkbox" name="knowledge" value="MySQL">MySQL</input>
<input type="checkbox" name="knowledge" value="Bootstrap">Bootstrap</input>
<input type="checkbox" name="knowledge" value="Symfony">Symfony</input>
<input type="checkbox" name="knowledge" value="React">React</input>

</div>

<div class="colors">

<label for="favcolor">Couleur préférée</label>
<input type="color" id="favouritecolor" name="favouritecolor" value="#000000">

</div>

<div class="date of birth">
<label for="birthday">Date de naissance</label>
<input type="date" id="birthday" name="birthday">

</div>



</div>




<div class="card col-11 mx-auto my-1">

<label for="picture"> Joindre une image (jpg ou png) </label>

<div action="index.php" method="POST" enctype="multipart/form-data">
        <label for="file">Parcourir</label>
        <input type="file" name="file">
        <!-- <button type="submit">Enregistrer</button> -->

</div>

</div>



</form>