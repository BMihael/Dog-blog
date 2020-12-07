<?php
    require_once 'php/queries/fetch_gallery_images.php';

    print'
    <h1>Gallery</h1>
    <div id="gallery">';

    while($row = mysqli_fetch_array($result)){
        print'
        <figure id="NULL">
        <a href="images/gallery/'.$row["picture"].'" target="_blank"><img src="images/gallery/'.$row["picture"].'" alt="'.$row["title"].'" title="'.$row["title"].'"></a>
        <figcaption>'.$row["description"].'<figcaption>
        </figure>';
    }
    print'
    <div class="clear_float"></div>
    </div>';
?>