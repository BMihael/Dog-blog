<?php 
  print'
  <ul>
      <li><a href="index.php?menu=1">Home</a></li>
      <li><a href="index.php?menu=2">News</a></li>
      <li><a href="index.php?menu=3">Contact</a></li>
      <li><a href="index.php?menu=4">About</a></li>
      <li><a href="index.php?menu=5">Gallery</a></li>';
      if(!isset($_SESSION['is_user_logged_in'])){
        print'
          <li><a href="index.php?menu=6">Login</a></li>
          <li><a href="index.php?menu=7">Register</a></li>
          <li><a href="index.php?menu=8">Dogs</a></li>
          <li>';
      }
      print'
      <ul id="menu_profile">';
      if(isset($_SESSION['is_user_logged_in'])){
        print'
          <li><a>'.$_SESSION['username'].'</a>
          <ul id="menu_sub">
              <li><a href="index.php?menu=9">Dashboard</a></li>
              <li><a href="index.php?logout=\'1\'">Logout</a></li>
          </ul>
          </li>';
      }
  print'
          </li>
  </ul>';
?>