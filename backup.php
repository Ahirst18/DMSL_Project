<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>


    .sidebar-container {
        position: fixed;
        width: 220px;
        height: 100%;
        left: 0;
        overflow-x: hidden;
        overflow-y: auto;
        background: #1a1a1a;
        color: #fff;
      }
      
      .content-container {
        padding-top: 20px;
      }
      
      .sidebar-logo {
        padding: 10px 15px 10px 30px;
        font-size: 20px;
        background-color: #2574A9;
      }
      
      .sidebar-navigation {
        padding: 0;
        margin: 0;
        list-style-type: none;
        position: relative;
      }
      
      .sidebar-navigation li {
        background-color: transparent;
        position: relative;
        display: inline-block;
        width: 100%;
        line-height: 20px;
      }
      
      .sidebar-navigation li a {
        padding: 10px 15px 10px 30px;
        display: block;
        color: #fff;
      }
      
      .sidebar-navigation li .fa {
        margin-right: 10px;
      }
      
      .sidebar-navigation li a:active,
      .sidebar-navigation li a:hover,
      .sidebar-navigation li a:focus {
        text-decoration: none;
        outline: none;
      }
      
      .sidebar-navigation li::before {
        background-color: #2574A9;
        position: absolute;
        content: '';
        height: 100%;
        left: 0;
        top: 0;
        -webkit-transition: width 0.2s ease-in;
        transition: width 0.2s ease-in;
        width: 3px;
        z-index: -1;
      }
      
      .sidebar-navigation li:hover::before {
        width: 100%;
      }
      
      .sidebar-navigation .header {
        font-size: 12px;
        text-transform: uppercase;
        background-color: #151515;
        padding: 10px 15px 10px 30px;
      }
      
      .sidebar-navigation .header::before {
        background-color: transparent;
      }
      
      .content-container {
        padding-left: 220px;
      }
    </style>
</head>
<body>
<div class="sidebar-container">
  <div class="sidebar-logo">
    UGS
  </div>
  <?php include_once('side_bar.php');?>
</div>

<div class="content-container">

  <div class="container-fluid">


 

  </div>
</div>
</body>
</html>

