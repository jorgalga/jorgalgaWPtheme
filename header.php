<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>
        <?php wp_title( '|', true, 'right' ); ?>
    </title>

    <?php wp_head();?>
    
</head>

<body>
    
    <!--Navbar-->
    <nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i>
        </button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="http://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">MDB</a>
                <!--Links-->
                <ul class="nav navbar-nav">
                    
                    
                    
                    <?php 
                      $index = 0;
                      $cSlug = get_post()->post_name;
                      
                      $pages = get_pages(); 
                      foreach ( $pages as $page ) {
                          
                        if(strcmp($cSlug , $page->post_name)==0){
                             $option = '<li class="nav-item active"><a class="nav-link" href="' . get_page_link( $page->ID ) . '">';
                        }
                        else{
                             $option = '<li class="nav-item"><a class="nav-link" href="' . get_page_link( $page->ID ) . '">';
                        }
                        
                       
                        $option .= $page->post_title;
                        $option .= '</a></li>';
                        echo $option;
                        $index++;
                      }
                    ?>
                    
                    
                </ul>
            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->
    
    <!--Carousel Wrapper-->
<div id="carousel-example-1" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1" data-slide-to="1"></li>
        <li data-target="#carousel-example-1" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
            <img src="http://mdbootstrap.com/images/slides/slide%20(7).jpg" alt="First slide">
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <div class="carousel-item">
            <img src="http://mdbootstrap.com/images/slides/slide%20(8).jpg" alt="Second slide">
        </div>
        <!--/Second slide-->

        <!--Third slide-->
        <div class="carousel-item">
            <img src="http://mdbootstrap.com/images/slides/slide%20(9).jpg" alt="Third slide">
        </div>
        <!--/Third slide-->
    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->



    <!--
    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span style="display:none">.</span>
                    <div id="nav-icon3">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    
                    
                </button>
                <a class="navbar-brand" href="http://www.jorgalga.com">jorgalga.com</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">


                    <?php 
                      $index = 0;
                      $cSlug = get_post()->post_name;
                      
                      $pages = get_pages(); 
                      foreach ( $pages as $page ) {
                          
                        if(strcmp($cSlug , $page->post_name)==0){
                             $option = '<li><a class="active" href="' . get_page_link( $page->ID ) . '">';
                        }
                        else{
                             $option = '<li><a href="' . get_page_link( $page->ID ) . '">';
                        }
                        
                       
                        $option .= $page->post_title;
                        $option .= '</a></li>';
                        echo $option;
                        $index++;
                      }
                    ?>
                </ul>

            </div>
        </div>
    </nav>
    -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="blog-header">
                    <div class="blog-title-wrap">
                        <h1 class="blog-title"><a href="<?php bloginfo('wpurl');?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
                    </div>
                    <p class="lead blog-description">
                        <?php echo get_bloginfo( 'description' ); ?>
                    </p>
                    
                </div>

            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
        </div>
    </div> <!-- /.container -->