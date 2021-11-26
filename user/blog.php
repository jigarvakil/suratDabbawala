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
    <div class="breadcrumb-area  ptb-80">
    </div>

<div class="breadcrumb-area bg-img ptb-80" style="background-image:url(assets/img/banner/breath.jpg);">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>Blog</h3>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">blog details </li>
            </ul>
        </div>
    </div>
</div>
<div class="blog-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="blog-details-wrapper">
                    <div class="single-blog-wrapper">
                        <div class="blog-img mb-30">
                            <a href="#">
                                <img src="assets/img/blog/1.jpg" alt="">
                            </a>
                            <span class="blogpost-time-date">
                                <span class="date">01</span>
                                <span class="month">Feb</span>
                            </span>
                        </div>
                        <h2><b>Dabbawala: Delivering Mom’s Love</b></h2>
                        <p>The journey of Dabbawala began around 127 years back when a Parsi banker wished to eat a home cooked meal in his office.  He gave this opportunity to the first Dabbawala and this gave birth to an outstanding home cooked meal delivery service in the financial capital of India. Many other people liked this concept and the demand for Dabba Delivery Service saw a steep increase.

The Dabbwalas are mainly descendants of the soldiers of Chatrapathi Shivaji Maharaj.  This system was conceptualized by Tukaram V. Gadade and first began in Girgaon with a meagre price of 2 aanas. A charitable trust was registered in 1956 under the name of Nutan Tiffin Box Suppliers Trust. In the year 1968, a commercial arm of this trust was registered as Tiffin Box Supplier’s Association. Presently, there are over 5000 Dabbawalas servicing 2,00,000 customers . Their system is built on a combination of characteristics that are unique to surat.</p>
                        <blockquote class="importent-title">
                            <h4>Initial Challenges:</h4>
                        </blockquote>
                        <p>Initially they faced various challenges in terms of availability of dedicated human resources ready to face hardships, uncertainty or disturbances in service efficiency due to reliability on external parameters like public transport, customer support etc. With increase in business, they also faced a requirement of change in operating system so as to perform consistently.</p>
                        <div class="dec-img-wrapper">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="dec-img">
                                        <img src="assets/img/blog/d1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="dec-img dec-mrg res-mrg-top-2">
                                        <img src="assets/img/blog/d.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Food delivery Apps deliver food at no delivery cost. With the Dabbawala service, the customers have to pay delivery charges over and above the prices of meals. Also, the discounts and variety of food offered by the food delivery apps are hard to match.</p>

<p>To keep up amidst the challenges thrown by the newer food delivery start ups, Dabbawalas are considering expansion of their brand and planning to deliver products like organic milk, vegetables, etc. Dabbawalas have also started using motorcycles at some places.</p>
                        <div class="blog-dec-tags-social">
                            <div class="blog-dec-tags">
                                <ul>
                                    <li><a href="#">dabba</a></li>
                                    <li><a href="#">thalis</a></li>
                                    
                                </ul>
                            </div>
                            <div class="blog-dec-social">
                                <span>share :</span>
                                <ul>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-comment-wrapper mt-55">
                        <h4 class="blog-dec-title">comments : 02</h4>
                        <div class="single-comment-wrapper mt-35">
                            <div class="blog-comment-img">
                                <img src="assets/img/blog/blog-comment1.png" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <h4>Anthony Shah</h4>
                                <span>October 14, 2019 </span>
                                <p>Dabbawalas are poor people earling less than US$100 a month. No dabbawala wants his son to be a dabbawala. Please don't glorify them.</p>
                                <div class="blog-details-btn">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="single-comment-wrapper mt-50 ml-125">
                            <div class="blog-comment-img">
                                <img src="assets/img/blog/blog-comment2.png" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <h4>Anthony Patel</h4>
                                <span>October 14, 2019 </span>
                                <p>Very good for the price and taste wise is also good. Packaging looks very hygiene and quantity is enough for one person. Recommend for quick thalis at a normal price</p>
                                <div class="blog-details-btn">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </br>
            <div class="col-lg-4 col-xl-3">
                <div class="sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="sidebar-search">
                        <form class="sidebar-search-form" action="#">
                            <input type="text" placeholder="Type key word">
                            <button>
                                <i class="ion-android-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="sidebar-widget mt-30 shop-sidebar-border pt-25">
                        <h4 class="sidebar-title">Categories </h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><a href="#">Dabbas  <span>(10)</span></a></li>
                                <li><a href="#"> Thalis <span>(3)</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mt-25 shop-sidebar-border pt-25">
                        <h4 class="sidebar-title">Blog Archives</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><a href="#">March 2015 <span>(2)</span></a></li>
                                <li><a href="#">August 2011  <span>(2)</span></a></li>
                                <li><a href="#">December 2015  <span>(1)</span></a></li>
                                <li><a href="#">Novermber 2013  <span>(3)</span></a></li>
                                <li><a href="#">September 2012  <span>(1)</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mt-25 shop-sidebar-border pt-25">
                        <h4 class="sidebar-title">Recent Posts</h4>
                        <div class="recent-posts-wrap mt-30">
                            <div class="single-recent-posts mb-20">
                                <div class="recent-posts-img">
                                    <img src="assets/img/blog/2.jpg" alt="">
                                </div>
                                <div class="recent-posts-content">
                                    <h4>
                                        <a href="#">blog post formet.</a>
                                    </h4>
                                    <span> March 14, 2018</span>
                                </div>
                            </div>
                            <div class="single-recent-posts mb-20">
                                <div class="recent-posts-img">
                                    <img src="assets/img/blog/d2.jpg" alt="">
                                </div>
                                <div class="recent-posts-content">
                                    <h4>
                                        <a href="#">blog post formet.</a>
                                    </h4>
                                    <span> March 14, 2018</span>
                                </div>
                            </div>
                            <div class="single-recent-posts">
                                <div class="recent-posts-img">
                                    <img src="assets/img/blog/d3.jpg" alt="">
                                </div>
                                <div class="recent-posts-content">
                                    <h4>
                                        <a href="#">blog post formet.</a>
                                    </h4>
                                    <span> March 14, 2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget mt-25 shop-sidebar-border pt-25">
                        <h4 class="sidebar-title">Popular Tags</h4>
                        <div class="sidebar-tags mt-25">
                            <ul>
                                <li><a href="#">#dabba</a></li>
                                <li><a href="#">#dabbafood</a></li>
                                <li><a href="#">#dabbawala</a></li>
                                <li><a href="#">#indiandabba</a></li>
                                <li><a href="#">#dabbalove </a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
        
        
        
        
		<?php include_once('down_link.php'); ?>
        
		
       </body>
</html>
