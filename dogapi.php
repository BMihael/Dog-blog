<?php
$url = "https://dog.ceo/api/breeds/list/all";
$response = file_get_contents($url);
$data = json_decode($response);

print'
<form action="" method="post">
<select id="dropdown" name="dropdown">';
foreach($data->{'message'} as $value=>$key){
	if($key==NULL){
        print'
        <option value='.$value.'>'.$value.'</option>';
    }else{
        foreach($key as $p){
            print'
            <option>'. $value . " ".  $p .'</option>';
        }
    }
}
print'
</select>
<button class="button_api" type="submitRandomImage" name="submitRandomImage">Choose</button>
</form>';
    if(isset($_POST['submitRandomImage']) && !empty($_POST['dropdown'])){
        $selectedBreed = $_POST['dropdown'];
        $urlforRandomBreed = "https://dog.ceo/api/breed/" . $selectedBreed. "/images/random";
        $responseDogByChoosenBreed = @file_get_contents($urlforRandomBreed);
        if ($responseDogByChoosenBreed === false) {
            echo "No dog breed found!";
        }else{
            $dataRandomByBreed = json_decode($responseDogByChoosenBreed);
            $image = $dataRandomByBreed->{'message'};
            print'
            <br>
            <p>Choosen breed is ' . ucfirst($selectedBreed) .'<p>
            <br>
            <img src='.$image.'>';
        }
    }else{
        print'
        <p><br>Choose your favorite dog breed<br></p>';
    }
?>