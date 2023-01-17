<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>JST etiquettes test</title>
  </head>
  <body>
    <center>
      <br><br><br>
      <h3>JST Generator</h3>
      <br><br><br><br>
      <form method="post" action="">
      <div class="form-group col-sm-6">
        <input type="text" name="name" class="form-control" id="name" placeholder="Nom">
      </div>
      <div class="form-group col-sm-6">
        <input type="text" name="email" class="form-control" id="email" placeholder="Email">
      </div>
      <button type="submit" name="generate" class="btn btn-primary">Générer</button>
    </form>
    <br>
    <?php 
      if (isset($_POST['generate'])) {
        $name = strtoupper($_POST['name']);
        $name_len = strlen($_POST['name']);
        $email = strtoupper($_POST['email']);
        $phone = "00221781083898";
        $phone1 = "00221781083898";
        $phone2= "00221781083898";
        $slash="/";
        $slash1="/";
        $copy="Please contact me back";
        $copy1="Merci de me contacter";
        $jst1="Save your document, save your time: Just Save It";
        $jst2="Vendu par / sold by: www.justsaveit.fr";
        $ln="-------------------------------------------------------------------------------------------------------------------------------";
        if ($email) {
          $font_size_occupation = 12;
          $font_size_copy=8;
          $font_size_jst=11;
        }

        if ($name == "" || $email == "") {
          echo 
          "
          <div class='alert alert-danger col-sm-6' role='alert'>
              Ensure you fill all the fields!
          </div>
          ";
        }else{
          echo 
          "
          <div class='alert alert-success col-sm-6' role='alert'>
             L'étiquette a été générée avec succés
          </div>
          ";

          //designed certificate picture
          $image = "etiquette.png";

          $createimage = imagecreatefrompng($image);

          //this is going to be created once the generate button is clicked
          $output = "etiquette1.png";
          $output1= "etiquette2.png";

          //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
          $white = imagecolorallocate($createimage, 205, 245, 255);
          $black = imagecolorallocate($createimage, 0, 0, 0);
          $red = imagecolorallocate($createimage, 237,29,36);


          //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
          $rotation = 0;
          $rotation1= 180;

          //we then set the x and y axis to fix the position of our text name
          $origin_x = 300;
          $origin_y=150;

          //we then set the x and y axis to fix the position of our text occupation
          $origin1_x = 530;
          $origin1_y=150;

          $origin_mailx = 545;
          $origin_maily=150;

          $origin_phonex = 360;
          $origin_phoney=180;
          
          $origin_phonex2 = 510;
          $origin_phoney2=180;


          $origin_copyx = 80;
          $origin_copyz=160;

          $origin_copyx1 = 85;
          $origin_copyz1=180;

          $origin_lnx = 0;
          $origin_lny=130;

          $origin_jstx = 680;
          $origin_jsty=110;
          
          $origin_jst1x = 640;
          $origin_jst1y=90;
   
          //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
          if($name_len<=7){
            $font_size = 25;
            $origin_x = 190;
          }
          elseif($name_len<=12){
            $font_size = 30;
          }
          elseif($name_len<=15){
            $font_size = 26;
          }
          elseif($name_len<=20){
             $font_size = 18;
          }
          elseif($name_len<=22){
            $font_size = 15;
          }
          elseif($name_len<=33){
            $font_size=11;
          }
          else {
            $font_size =10;
          }

          $certificate_text = $name;

          //font directory for name
          $drFont = dirname(__FILE__)."/developer.ttf";

          // font directory for occupation name
          $drFont1 = dirname(__FILE__)."/Gotham-black.otf";

          //function to display name on certificate picture
          for($i=0;$i<3;$i++){
          $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin_x, $origin_y, $black, $drFont1, $email);
          $text3 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1,$slash);
          $text4 = imagettftext($createimage, $font_size_occupation, $rotation, $origin_mailx, $origin_maily, $black, $drFont1,$phone);
          $text5 = imagettftext($createimage, $font_size_occupation, $rotation, $origin_phonex, $origin_phoney, $black, $drFont1,$phone1);
          $text6 = imagettftext($createimage, $font_size_occupation, $rotation, $origin_phonex2, $origin_phoney, $black, $drFont1,$slash1);
          $text7 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin_phoney2, $black, $drFont1,$phone2);
          $text8 = imagettftext($createimage, $font_size_copy, $rotation, $origin_copyx, $origin_copyz, $black, $drFont1,$copy);
          $text8 = imagettftext($createimage, $font_size_copy, $rotation, $origin_copyx1, $origin_copyz1, $black, $drFont1,$copy1);
          $text9 = imagettftext($createimage, $font_size_occupation, $rotation, $origin_lnx, $origin_lny, $red, $drFont1,$ln);
          $text10 = imagettftext($createimage, $font_size_jst,$rotation1, $origin_jstx, $origin_jsty, $black, $drFont1,$jst1);
          $text11 = imagettftext($createimage, $font_size_jst, $rotation1, $origin_jst1x, $origin_jst1y, $black, $drFont1,$jst2);

          }
        
          //function to display occupation name on certificate picture
           // $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1, $occupation);
        


          imagepng($createimage,$output,3);
          imagepng($createimage,$output1,3);

 ?>
        <!-- this displays the image below -->
        
          <br> 
          <br> 
            <br> 
        <img src="<?php echo $output; ?>"> <a href="<?php echo $output; ?>" class="btn btn-success">Télécharger le bloc 1</a>
                <!-- this provides a download button -->

                
     
        <br> 
        <br>
        <img src="<?php echo $output1; ?>"> 
        <a href="<?php echo $output1; ?>" class="btn btn-success">Télécharger le bloc 2</a>




        <br><br>
<?php 
        }
      }

     ?>

    </center>

      <footer>  
      </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
