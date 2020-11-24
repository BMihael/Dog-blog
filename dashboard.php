<?php

    $id = $_SESSION['user_logged_in'];

    if(isset($_POST['updatePost'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $picture = $_POST['picture'];
        $post_id = $_POST['post_id'];

        $queryUpdatePost = "UPDATE `news` SET `title`='$title', `description` = '$description', `picture` = '$picture' WHERE id = $post_id ";

        $resultUpdatePost = mysqli_query($mysql, $queryUpdatePost);
        if($resultUpdatePost == True){
            header('location:index.php?menu=9&message=success');
        }else{
            header('location:index.php?menu=9&message=fail');
        }
    }

    if(isset($_GET['deletePost'])){
        $post_id = $_GET['deletePost'];
        $quearyPostUserFromDatabase = "DELETE FROM `news` WHERE id='$post_id'";
        $resultForDeleteUserFromDatabase = mysqli_query($mysql, $quearyPostUserFromDatabase);

        if($quearyPostUserFromDatabase == 1){
            header('location:index.php?menu=9');
        }
    }

    if(isset($_POST["upload_image"])) {
        $target_dir = "images/gallery/";
        $title=$_POST["title"];
        $description=$_POST["description"];
        $name = $_FILES['fileToUpload']['name'];
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        $query = "INSERT into `gallery`(`picture`, `title`, `description`,`id_news`, `by_user`) values('$name','$title','$description',0,'$id')";
        mysqli_query($mysql,$query);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
        }

    
    if($_SESSION['user_logged_in']==1){

        if(isset($_GET['delete'])){
            $user_id = $_GET['delete'];
            $quearyDeleteUserFromDatabase = "DELETE FROM `user` WHERE id=$user_id";
            $resultForDeleteUserFromDatabase = mysqli_query($mysql, $quearyDeleteUserFromDatabase);

            if($resultForDeleteUserFromDatabase == 1){
                $quearyDeleteUserPostFromDatabase = "DELETE FROM `news` WHERE by_user=$user_id";
                $resultForDeleteUserPostFromDatabase = mysqli_query($mysql, $quearyDeleteUserPostFromDatabase);
                header('location:index.php?menu=9');
            }
        }

        $queryForAllUsers = "SELECT id,username,email FROM user";
        $resultForAllUsers = mysqli_query($mysql, $queryForAllUsers);
        print'
        <h1>Admin dashboard</h1>
        <form method="post" action="">
        <table class="table_custom container_around_elements">
        <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>';
        while($row = mysqli_fetch_array($resultForAllUsers)){
            print'
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['email'].'</td>
            <td>';
            if(!$row['id']==0){
                print'
                <a href="index.php?menu=9&delete='.$row['id'].'">Delete</a>';
            }
            print'
            </tr>
            </tbody>';
        }
        print'
        </table>
        </form>
        <br>';
        $queryForUserPosts = "SELECT * FROM `news` WHERE by_user = $id";
        $resultForUserPosts = mysqli_query($mysql, $queryForUserPosts);
        print'
        <h3>All your posts</h3>
        <table class="table_custom container_around_elements">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>By user</th>
            <th>Action</th>
        </tr>';
        while($row = mysqli_fetch_array($resultForUserPosts)){
            print'
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['date'].'</td>
            <td>'.$row['by_user'].'</td>
            <td>
            <a href="index.php?menu=9&deletePost='.$row['id'].'">Delete</a>
            <a href="index.php?menu=9&updatePostId='.$row['id'].'&row_title='.$row['title'].'&row_description='.$row['description'].'&row_picture='.$row['picture'].'">Update</a>
            </td>
        </tr>';
        }
        print'
        </table>';
        if(isset($_GET['updatePostId'])){
            $post_id = $_GET['updatePostId'];
            $row_title = $_GET['row_title'];
            $row_description = $_GET['row_description'];
            $row_picture = $_GET['row_picture'];
            print'
            <div class="container_around_elements">
            <form id="update_post"  method="post" action="index.php?menu=9">
            <table>
                <tr>
                    <label for="post_id">Post with id: '.$post_id.'</label>
                    <input type="hidden" name="post_id" value="'.$post_id.'">
                </tr>
                <tr>
                    <td>
                        <label for="title">Title</label>
                    </td>
                    <td>
                    <input type="text" id="title" name="title" value="'.$row_title.'" placeholder="title..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td>
                        <input type="text" id="description" name="description" value="'.$row_description.'" placeholder="Description..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="picture">Picture</label>
                    </td>
                    <td>
                        <input type="text" id="picture" name="picture" value= "'.$row_picture.'"placeholder="Picture..." required>
                    </td>
                </tr>
            </table>
            <button class="button_submit" type="submit" name="updatePost">Update post</button>
        </form>
        </div>';
        }
        print'
        <br>
        <div class="container_around_elements">
        <br>';
        $queryForAllUserPosts = "SELECT * FROM `news` WHERE by_user != $id";
        $resultForAllUserPosts = mysqli_query($mysql, $queryForAllUserPosts);
        print'
        <h2>All users posts</h2>
        <table class="table_custom container_around_elements">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>By user</th>
            <th>Action</th>
        </tr>';
        while($row = mysqli_fetch_array($resultForAllUserPosts)){
            print'
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['date'].'</td>
            <td>'.$row['by_user'].'</td>
            <td>
            <a href="index.php?menu=9&deletePost='.$row['id'].'">Delete</a>
            <a href="index.php?menu=9&updatePostId='.$row['id'].'&row_title='.$row['title'].'&row_description='.$row['description'].'&row_picture='.$row['picture'].'">Update</a>
            </td>
        </tr>';
        }
        print'
        </table>
        </div>
        <br>';
        print'
        <br>
        <h2>Create new post</h2>';
        if(isset($_POST['createNewPost'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $picture = $_POST['picture'];

            $queryCreateNewPost = "INSERT INTO `news` (`title`, `description`, `date`, `picture`, `by_user`, `archive`) VALUES ('$title', '$description', NOW(), '$picture', '$id', 0)";

            $resultCreateNewPost = mysqli_query($mysql, $queryCreateNewPost);
            if($resultCreateNewPost == True){
            header('location:index.php?menu=9&message=success');
            }
            header('location:index.php?menu=9&message=fail');
        }

        print'
        <form id="create_new_post"  method="post" action="index.php?menu=9">
            <table>
                <tr>
                    <td>
                        <label for="title">Title</label>
                    </td>
                    <td>
                    <input type="text" id="title" name="title" placeholder="title..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td>
                        <input type="text" id="description" name="description" placeholder="Description..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="picture">Picture</label>
                    </td>
                    <td>
                        <input type="text" id="picture" name="picture" placeholder="Picture..." required>
                    </td>
                </tr>
            </table>
            <button class="button_submit" type="submit" name="createNewPost">Create post</button>
        </form>
        </div>';
        if(isset($_GET['success_create_new_post'])){
            print'
            <p>Successful creating post.</p>';
        }else{
            print'
            <p>No post created.</p>';
        }
        print'
        <div class="container_around_elements">
        <h2>Upload image to gallery</h2>
        <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="text" name="title" placeholder="Title...">
        <input type="text" name="description" placeholder="Description...">
        <input type="submit" value="Upload Image" name="upload_image">
        </form>
        </div>';
    }else{
        print'
        <h1>User dashboard</h1>';
        $queryForUserPosts = "SELECT * FROM `news` WHERE by_user = $id";
        $resultForUserPosts = mysqli_query($mysql, $queryForUserPosts);
        print'
        <h3>All your posts</h3>
        <table class="table_custom container_around_elements">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>By user</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>';
        while($row = mysqli_fetch_array($resultForUserPosts)){
            print'
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['date'].'</td>
            <td>'.$row['by_user'].'</td>
            <td><a href="index.php?menu=9&deletePost='.$row['id'].'">Delete</a>
            <a href="index.php?menu=9&updatePostId='.$row['id'].'&row_title='.$row['title'].'&row_description='.$row['description'].'&row_picture='.$row['picture'].'">Update</a>
            </td>
        </tr>';
        }
        print'
        </table>';
        if(isset($_GET['updatePostId'])){
            $post_id = $_GET['updatePostId'];
            $row_title = $_GET['row_title'];
            $row_description = $_GET['row_description'];
            $row_picture = $_GET['row_picture'];
            print'
            <div class="container_around_elements">
            <form id="update_post"  method="post" action="index.php?menu=9">
            <table>
                <tr>
                    <label for="post_id">Post with id: '.$post_id.'</label>
                    <input type="hidden" name="post_id" value="'.$post_id.'">
                </tr>
                <tr>
                    <td>
                        <label for="title">Title</label>
                    </td>
                    <td>
                    <input type="text" id="title" name="title" value="'.$row_title.'" placeholder="title..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td>
                        <input type="text" id="description" name="description" value="'.$row_description.'" placeholder="Description..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="picture">Picture</label>
                    </td>
                    <td>
                        <input type="text" id="picture" name="picture" value= "'.$row_picture.'"placeholder="Picture..." required>
                    </td>
                </tr>
            </table>
            <button class="button_submit" type="submit" name="updatePost">Update post</button>
        </form>
        </div>';
        }
        print'
        </tbody>
        </table>
        <div class="container_around_elements">
        <br>
        <h2>Create new post</h2>';
        if(isset($_POST['createNewPost'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $picture = $_POST['picture'];

            $queryCreateNewPost = "INSERT INTO `news` (`title`, `description`, `date`, `picture`, `by_user`, `archive`) VALUES ('$title', '$description', NOW(), '$picture', '$id', 0)";

            $resultCreateNewPost = mysqli_query($mysql, $queryCreateNewPost);
            if($resultCreateNewPost == True){
                header('location:index.php?menu=9&message=success');
            }
                header('location:index.php?menu=9&message=success');
        }

        print'
        <form id="create_new_post"  method="post" action="index.php?menu=9">
            <table>
                <tr>
                    <td>
                        <label for="title">Title</label>
                    </td>
                    <td>
                    <input type="text" id="title" name="title" placeholder="title..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td>
                        <input type="text" id="description" name="description" placeholder="Description..." required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="picture">Picture</label>
                    </td>
                    <td>
                        <input type="text" id="picture" name="picture" placeholder="Picture..." required>
                    </td>
                </tr>
            </table>
            <button class="button_submit" type="submit" name="createNewPost">Create post</button>
        </form>';
        if(isset($_GET['message'])){
            if($_GET['message']=="success"){
                print'
                <p>Successfully created post.</p>';
            }else{
                print'
                <p>No post created.</p>';
            }
        }
        print'
        </div>
        <div class="container_around_elements">
        <h2>Upload image to gallery</h2>
        <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="text" name="title" placeholder="Title...">
        <input type="text" name="description" placeholder="Description...">
        <input type="submit" value="Upload Image" name="upload_image">
        </form>
        </div>';
    }
?>