 <?php
    include_once('connection.php');
    include_once("check_session.php");
 ?>

 <!DOCTYPE html>
<html lang="en">
	<head>
		<title>Restaurant Admin</title>
		<?php include_once ("up_link.php")?>
		
	</head>
	<body>
		<?php include_once ("header.php")?>
		<?php include_once ("navigation.php")?>
		
		<div id="content">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Gallery</h5>
          </div>
          <div class="widget-content">
            <ul class="thumbnails">
              <li class="span2"> <a> <img src="img/gallery/a.png" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/a.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/b.png" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/b.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a > <img src="img/gallery/c.png" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/c.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/d.png" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/d.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a > <img src="img/gallery/e.png" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/e.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/f.png" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/f.png"><i class="icon-search"></i></a> </div>
              </li>
			  </ul>
			  <ul class="thumbnails">
              <li class="span2"> <a> <img src="img/gallery/g.png" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/g.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/h.png" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/h.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/i.png" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/i.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/j.png" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/j.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/k.png" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/k.png"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/n.png" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/n.png"><i class="icon-search"></i></a> </div>
              </li>
			  </ul>
			  <ul class="thumbnails">
              <li class="span2"> <a> <img src="img/gallery/1.jpg" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/1.jpg"><i class="icon-search"></i></a> </div>
              </li>
			  <li class="span2"> <a> <img src="img/gallery/2.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/2.jpg"><i class="icon-search"></i></a> </div>
              </li>
			  <li class="span2"> <a> <img src="img/gallery/5.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/5.jpg"><i class="icon-search"></i></a> </div>
              </li>
			  <li class="span2"> <a> <img src="img/gallery/3.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/3.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/4.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/4.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/6.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/6.jpg"><i class="icon-search"></i></a> </div>
              </li>
                   
   </ul>
   <ul class="thumbnails">
              <li class="span2"> <a> <img src="img/gallery/8.jpg" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/8.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/9.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/9.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/7.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/7.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/10.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/10.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/12.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/12.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/14.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/14.jpg"><i class="icon-search"></i></a> </div>
              </li>
			  </ul>
        <ul class="thumbnails">
              <li class="span2"> <a> <img src="img/gallery/16.jpg" alt=""> </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/16.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/18.png" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/18.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/11.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/11.jng"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/13.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/13.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/15.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/15.jpg"><i class="icon-search"></i></a> </div>
              </li>
              <li class="span2"> <a> <img src="img/gallery/17.jpg" alt="" > </a>
                <div class="actions"> <a title="" href="#"><i class="icon-pencil"></i></a> <a class="lightbox_trigger" href="img/gallery/17.jpg"><i class="icon-search"></i></a> </div>
              </li>
			  </ul>
	      
          </div>
        </div>
											</div>
					</div>
				</div>
				</div>
				</div>
				
				<?php include_once ("footer.php")?>
				<?php include_once ("down_link.php")?>
				
			</body>
		</html>
		