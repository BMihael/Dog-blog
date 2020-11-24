<?php

  define('__Miha__', TRUE); #this is against hacking
  session_start(); #start session
  include("databaseconn.php");

  if(isset($_GET['menu'])){
    $menu = (int)$_GET['menu'];
  }

  if(isset($_GET['action'])){
    $action = (int)$_GET['action'];
  }

  if(!isset($_POST['_action_'])){
    $_POST['_action_'] = FALSE;
  }

  if(!isset($menu)){
    $menu = 1;
  }

  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['is_user_logged_in']);
    unset($_SESSION['user_logged_in']);
    unset($_SESSION['success_login']);
    header('location:index.php');
  }

  include_once('function.php');
  print'
  <!DOCTYPE html>
  <html lang="hr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Programiranje web aplikacija</title>
    <meta name="description" content="Ovo je kul stranica" />
    <meta name="keywords" content="Test page" />
    <meta name="author" content="Mihael Belko" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <header>
      <div id="image_header"></div>
      <nav id="navigation">';
      include('menu.php');
      print'
      </nav>
    </header>
    </div>
    <main>';
    
    if(isset($_SESSION['message'])){
      print($_SESSION['message']);
      unset($_SESSION['message']);
    }

    if(!isset($menu) || $menu==1){ include("home.php");}
    if($menu==2){include("news.php");}
    if($menu==3){include("contact.php");}
    if($menu==4){include("about.php");}
    if($menu==5){include("gallery.php");}
    if($menu==6){include("login.php");}
    if($menu==7){include("register.php");}
    if($menu==8){include("dogapi.php");}
    if($menu==9){include("dashboard.php");}
    print'
    </main>
    <footer>
      Copyright © ' . date("Y") . ' Mihael Belko
      <a href="https://www.github.com/BMihael" target="_blank"><img src="images/socialmedia/github.svg" alt="Github" title="Github" style="width:24px; margin-top:0.4em; background-color: white;"></a>
    </footer>
  </body>
  </html>';
?>