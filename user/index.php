<?php
    include_once('connection.php');
    include_once("check_session.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>User</title>
        <?php include_once ("up_link.php")?>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
       </head>
    <body>
	
	<?php include_once ("header.php")?>
	
        <div class="slider-area">
            <div class="slider-active owl-dot-style owl-carousel">
                <div class="single-slider bg-img height-100vh d-flex align-items-center justify-content-center" style="background-image:url(assets/img/slider/slider-1.jpg);">
                    <div class="slider-content pt-100">
                        <div class="slider-content-wrap slider-animated-1">
                            <h2 class="animated">Welcome to <span>Dabbawala</span></h2>
                            <h1 class="animated"><span>Dabba & Thalis</span> home made food for you</h1>
                            <p>The dabbawala constitute a lunchbox delivery and return system that delivers hot lunches from homes and restaurants to people at work in india.</p>
                            <div class="slider-btn mt-20">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider bg-img height-100vh d-flex align-items-center justify-content-center" style="background-image:url(assets/img/slider/1.png);">
                    <div class="slider-content pt-100">
                        <div class="slider-content-wrap slider-animated-1">
                            <h2 class="animated">Welcome to <span>Dabbawala</span></h2>
                            <h1 class="animated"><span>Dabbawala</span> knows your taste</h1>
                            <p>The dabbawala constitute a lunchbox delivery and return system that delivers hot lunches from homes and restaurants to people at work in india.</p>
                            <div class="slider-btn mt-20">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-area ptb-95">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="about-content pr-30">
                            <h2>About Dabbawala </h2>
                            <h3> Dabbawala ensures healthy environment. Make a short trip. </h3>
                            <div class="about-peragraph">
                                <p>The dabbawalas (also spelled dabbawallas or dabbawallahs, called tiffin wallahs in older sources) constitute a lunchbox delivery and return system that delivers hot lunches from homes and restaurants to people at work in India, especially in Mumbai. The lunchboxes are picked up in the late morning, delivered predominantly using bicycles and railway trains, and returned empty in the afternoon. They are also used by meal suppliers in Mumbai, who pay them to ferry lunchboxes with ready-cooked meals from central kitchens to customers and back,The 2013 Bollywood film The Lunchbox is based on the dabbawala service..</p>
                                <div class="default-btn-style mt-35">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img alt="" src="assets/img/banner/about.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

                    <div class="col-lg-12">
                        <div class="contact-message-wrapper">
                            <h4 class="contact-title mb-25"><i class="fas fa-bell"></i> &nbsp;Holiday Alert</h4>
                            <div class="contact-message">
                            <table class="table table-bordered table-striped">
              
              <thead>
                                      <tr>
                                      <th>#</th>
                                      
                                      <th>Reason</th>
                                      <th>Holiday date</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                          $sql="select * from tbl_holiday";
                                          $query=mysqli_query($con,$sql);
                                          $i=1;
                                          while($row=mysqli_fetch_assoc($query))
                                          {
                                              $id=$row['holidayid'];
                                          ?>
                                          <tr>
                                          <td><?php echo $i++;?></td>
                                          <td><?php echo $row['reason'];?></td>
                                          <td><?php echo $row['holidaydate'];?></td>
                                          
                                      </tr>
                                      <?php
                                      }//end while loop
                                  ?>
                                  </tbody>
            </table>
            
                            </div>
                        </div>
                    </div>

        <div class="gallery-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h2>Our gallery</h2>
                    <p> </p>
                </div>
               <div class="row portfolio-style-2 grid">
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat1">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/a.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/k.png" >
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>								
                        </div>
                    </div>					
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat2 cat3">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/b.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/j.png">
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>						
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat1">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/c.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/i.png" >
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat2">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/d.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/h.png" >
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat1">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/e.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/f.png" >
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>						
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat3">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/f.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/g.png">
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat2 cat3">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/g.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/e.png">
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat3">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/h.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/d.png">
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat1">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/i.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/c.png">
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat1">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/j.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/b.png">
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat1">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/k.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/a.png">
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat1">
                        <div class="gallery hover-style mb-30">
                            <div class="gallery-img">
                                <img src="assets/img/gallery/n.png" alt="" />
                                <div class="gallery-view">
                                    <a class="img-popup" href="assets/img/gallery/e.png">
                                        <span class="plus"></span>
                                    </a>								
                                </div>
                            </div>							
                        </div>
                    </div>
				</div>
            </div>
        </div>
        </div>
        <div class="testimonial-area ptb-100 gray-bg">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h2>what people say</h2>
                    <p> The dabbawala constitute a lunchbox delivery and return system that delivers hot lunches from homes and restaurants to people at work in india.</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial-image-slider text-center">
                            <div class="single-testi-text">
                                <p> Dabbawala ensures healthy environment. Make a short trip.</p>
                            </div>
                            <div class="single-testi-text">
                                <p>The quality and quantity of food was also good. Enjoyed a lot 😊.</p>
                            </div>
                            <div class="single-testi-text">
                                <p>I have ordered many times from here.. amazing taste in low price.. delivery was on time.. packing was also nice..</p>
                            </div>
                            <div class="single-testi-text">
                                <p> Looking for good north Indian food delivery well you taste ends here.</p>
                            </div>
                        </div>
                        <div class="testimonial-text-slider text-center">
                            <div class="single-testi-img">
                                <img src="assets/img/team/tesi-1.png" alt="testi 1" />
                                <h3>William Patel</h3>
                                <h5>customer</h5>
                            </div>
                            <div class="single-testi-img">
                                <img src="assets/img/team/tesi-2.png" alt="testi 1" />
                                <h3>Diane savani</h3>
                                <h5>customer</h5>
                            </div>
                            <div class="single-testi-img">
                                <img src="assets/img/team/tesi-1.png" alt="testi 1" />
                                <h3>Carl zarivala</h3>
                                <h5>customer</h5>
                            </div>
                            <div class="single-testi-img">
                                <img src="assets/img/team/tesi-2.png" alt="testi 1" />
                                <h3>Linda zveri</h3>
                                <h5>customer</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-area ptb-100">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h2>Our blog</h2>
                    <p>  The dabbawala constitute a lunchbox delivery and return system that delivers hot lunches from homes and restaurants to people at work in india.</p>
                </div>
                <div class="blog-active owl-carousel">
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="#"><img alt="" src="assets/img/blog/a.png"></a>
                            <span class="blogpost-time-date">
                                <span class="date">01</span>
                                <span class="month">Jan</span>
                            </span>
                        </div>
                        <div class="blogpost-desc">
                            <h3>
                                <a href="#">blog post format Standered.</a>
                            </h3>
                            <p>Looking for good north Indian food delivery well you taste ends here.I order its murg khada masala Its was very delicious .I am impressed with its taste and authentic flavour.Highly recommend.😊</p>
                           
                        </div>
                    </div>
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="#"><img alt="" src="assets/img/blog/b.png"></a>
                            <span class="blogpost-time-date">
                                <span class="date">01</span>
                                <span class="month">Feb</span>
                            </span>
                        </div>
                        <div class="blogpost-desc">
                            <h3>
                                <a href="#">blog post format Standered.</a>
                            </h3>
                            <p> This place serves some amazing chana masala. The menu is quite elaborate. The quality and quantity of food was also good. Enjoyed a lot 😊.</p>
                        </div>
                    </div>
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="#"><img alt="" src="assets/img/blog/c.png"></a>
                            <span class="blogpost-time-date">
                                <span class="date">01</span>
                                <span class="month">Dec</span>
                            </span>
                        </div>
                        <div class="blogpost-desc">
                            <h3>
                                <a href="#">blog post format Standered.</a>
                            </h3>
                            <p>Looking for good north Indian food delivery well you taste ends here.I order its dal makhani Its was very delicious .I am impressed with its taste and authentic flavour.Highly recommend.😊</p>
                           
                        </div>
                    </div>
                                    </div>
            </div>
        </div>
        
			<?php include_once('footer.php'); ?>
        
        
        
        
		<?php include_once('down_link.php'); ?>
        
		
       </body>

<!-- Mirrored from preview.hasthemes.com/basmoti/basmoti/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Feb 2020 11:50:49 GMT -->
</html>
