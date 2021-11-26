<?php 
	include_once("connection.php");
    include_once("check_session.php");
    
?>
<!DOCTYPE html>
<html lang="en">
 <head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title> Admin  </title>
       <?php include_once ("up_link.php")?>
    </head>


    <body>
		<?php include_once('navigation.php'); ?>
        <section class="content">
				
				<?php include_once('header.php'); ?>

            <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">Welcome !</h3> 
                </div>



                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0 counter">
                                <?php
                                        foreach($con->query('SELECT COUNT(*) FROM tbl_user') as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row['COUNT(*)'] . "</td>";
                                            echo "</tr>";
                                        }
                                ?>
                                </h3> 
                                <p>Daily Users visitor </p>
                            </div> 
                            <div class="chart-inline">
                                <span class="inlinesparkline"></span> 
                            </div>
                        </div> 
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0 counter">49</h3> 
                                <p>Avg. Dabba Sales per day</p>
                            </div> 
                            <span class="dynamicbar-big"></span> 
                        </div> 
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0 counter">
                                <?php
                                foreach($con->query('SELECT COUNT(*) FROM tbl_complaint') as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['COUNT(*)'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                                </h3> 
                                <p>Dabba service Complains</p>
                            </div> 
                            <span id="compositeline"></span> 
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="tile-stats white-bg"> 
                            <div class="col-sm-8">
                                <div class="status">
                                <h3 class="m-t-15"><span class="counter">91.5</span>%</h3> 
                                <p>Helpfull</p>
                            </div> 
                            </div>
                            <div class="col-sm-4 m-t-20">
                                <span class="sparkpie-big"></span> 
                            </div>
                        </div> 
                    </div>
                </div>


            </div>
            <?php include_once('footer.php'); ?>
           
        </section>
        

<?php include_once ("down_link.php")?>
    </body>
</html>
