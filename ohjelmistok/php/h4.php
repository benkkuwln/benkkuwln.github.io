<!DOCTYPE html>
<html>
   <head>
      <title>Harjoitus 4</title>
      <style>
         body {
         background-color: #66ff99;
         }
      </style>
   </head>
   <body>
      <form method="post" action="">
         <label for="songs">Valitse haluamasi Radiohead kappaleet:</label><br>
         <input type="checkbox" name="songs[]" value="Fog">Fog<br>
         <input type="checkbox" name="songs[]" value="Talk Show Host">Talk Show Host<br>
         <input type="checkbox" name="songs[]" value="The Trickster">The Trickster<br>
         <input type="checkbox" name="songs[]" value="Lull">Lull<br>
         <input type="checkbox" name="songs[]" value="Palo Alto">Palo Alto<br>
         <input type="checkbox" name="songs[]" value="Pearly">Pearly<br>
         <input type="checkbox" name="songs[]" value="These Are My Twisted Words">These Are My Twisted Words<br>
         <input type="checkbox" name="songs[]" value="The Amazing Sounds Of Orgy">The Amazing Sounds Of Orgy<br>
         <input type="checkbox" name="songs[]" value="Let Down">Let Down<br><br>
         <input type="submit" name="submit" value="Osta valitut">
      </form>
<?php

if(isset($_POST['submit'])) {
   
   $songs = array(
      "Fog" => 1,
      "Talk Show Host" => 1.25,
      "The Trickster" => 1,
      "Lull" => 1,
      "Palo Alto" => 1,
      "Pearly" => 1,
      "These Are My Twisted Words" => 1,
      "The Amazing Sounds Of Orgy" => 1.25,
      "Let Down" => 1.25
   );
   
   $totalCost = 0;

   foreach($_POST['songs'] as $selectedSong){
      $totalCost += $songs[$selectedSong];
   }
   
   echo "Hinta yhteensä on " . $totalCost . " euroa.";
}

?>

</body>
</html>