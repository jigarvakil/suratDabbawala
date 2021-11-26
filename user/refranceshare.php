<?php
	
    include_once('connection.php');
    include_once('check_session.php');
    $id=$_SESSION['userid'];
    $sql="select * from tbl_user where userid=$id";
    
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $refcode= $row['refcode'];
    

	

	
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User</title>
    <?php include_once ("up_link.php")?>
    <style>
    form .error {
        color: red;
    }
    </style>
    
</head>

<body>

    <?php include_once ("header.php")?>

    <div class="breadcrumb-area  ptb-80">
    </div>
    <div class="breadcrumb-area bg-img ptb-80" style="background-image:url(assets/img/banner/breath.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>Share Reference</h3>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">Share Reference</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center text-danger">
                        Reference Code : <?= $refcode ?>
                    
                    
</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-2"><a
                        href="whatsapp://send?text=http://localhost/sd/user/login.php?refcode=<?= $refcode ?>"
                        class="btn btn-success text-white btn-block"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                        Share on whatsapp</a></div>
                <div class="col-md-2">
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%2Fsd%2Fuser%2Flogin.php&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <br>
    </div>


    <?php include_once('footer.php'); ?>




    <?php include_once('down_link.php'); ?>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0">
    </script>

</body>


<script type="text/javascript">
  $(document).ready(function(){
    $('#share_button').click(function(e){
      e.preventDefault();
      FB.ui(
        {
          method: 'feed',
          name: 'This is the content of the "name" field.',
          link: 'URL which you would like to share ',
          picture: ‘URL of the image which is going to appear as thumbnail image in share dialogbox’,
          caption: 'Caption like which appear as title of the dialog box',
          description: 'Small description of the post',
          message: ''
        }
      );
    });
  });
</script>
</html>