<?php
print'
    <h1>Gallery</h1>
    <div id="gallery">';

    $query = "SELECT * from gallery where archive=0";
    $result = mysqli_query($mysql, $query);
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