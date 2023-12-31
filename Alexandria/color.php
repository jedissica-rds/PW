<?php 
function simple_color_thief($img, $default='eee') {
    if(@exif_imagetype($img)) { // CHECK IF IT IS AN IMAGE
      $type = getimagesize($img)[2]; // GET TYPE
      if ($type === 1) { // GIF
        $image = imagecreatefromgif($img);
        // IF IMAGE IS TRANSPARENT (alpha=127) RETURN fff FOR WHITE
        if (imagecolorsforindex($image, imagecolorstotal($image)-1)['alpha'] == 127) return 'fff';
      } else if ($type === 2) { // JPG
        $image = imagecreatefromjpeg($img);
      } else if ($type === 3) { // PNG
        $image = imagecreatefrompng($img);
        // IF IMAGE IS TRANSPARENT (alpha=127) RETURN fff FOR WHITE
        if ((imagecolorat($image, 0, 0) >> 24) & 0x7F === 127) return 'fff';
      } else { // NO CORRECT IMAGE TYPE (GIF, JPG or PNG)
        return $default;
      }
    } else { // NOT AN IMAGE
      return $default;
    }
    $newImg = imagecreatetruecolor(1, 1); // FIND DOMINANT COLOR
    imagecopyresampled($newImg, $image, 0,0,0,0,1,1, imagesx($image), imagesy($image));
    return dechex(imagecolorat($newImg, 0, 0)); // RETURN HEX COLOR
  }
  // DEMO
  foreach(glob('./*.{jpg,png,gif}', GLOB_BRACE) as $i) {
    simple_color_thief($i,'f00');
  }

?>