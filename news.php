<?php

  if(isset($action) && $action != ""){
    $actNum = $_GET['action'];
    $query = "SELECT * FROM `news` WHERE `id`=$actNum ORDER BY date DESC";
    $result = mysqli_query($mysql, $query);
    
    $row = mysqli_fetch_assoc($result);
    print'
    <h1>News</h1>
    <div id="gallery_specific_news">';

    $queryForGalleryImages = "SELECT * FROM `gallery` WHERE `id_news`=$actNum ORDER BY date DESC";
    $resultGalleryImages = mysqli_query($mysql, $queryForGalleryImages);
    while($rowGalleryImages = mysqli_fetch_array($resultGalleryImages)){
      print'
      <figure id="'.$actNum.'">
        <img src="images/gallery/'. $rowGalleryImages["picture"] .'" alt="'. $rowGalleryImages["title"] .' title="'.$rowGalleryImages["title"].'>
        <figcaption>'.$rowGalleryImages["description"].'<figcaption>
      </figure>';
    }
    print'
    </div>
    <div class="clear_float"></div>
    <hr>
    <h2>'. $row["title"] .'</h2>
    <p>'.$row["description"].'</p>
    <p>Datum objave:<time datetime="'.$row["date"].'">'.$row["date"].'</time></p>
    <a href="index.php?menu=2">Back to news</a>';
  }else{
    print'
    <h1>News</h1>
    <section id="section_news">';
    $query = "SELECT * FROM news WHERE archive='0' ORDER BY date DESC";
    $result = mysqli_query($mysql, $query);
    while($row = mysqli_fetch_array($result)){
      print'
      <div>
      <a href="index.php?menu=2&action='.$row['id'].'">
      <img src="images/gallery/'. $row["picture"] .'" alt="'. $row["title"] .' title="'.$row["title"].'"></a>
      <div class="text_news">
      <h2>'.$row["title"].'</h2>
      <p>'.$row["description"].'</p>
      <p>Published by '.$row["by_user"].'</p>
      <p><time datetime="'.$row["date"].'"></time>'.$row["date"].'</p>
      </div>
      <div class="clear_float"></div>
      </div>
      <hr/>';
    }
    print'
    </section>';     
  } 
?>