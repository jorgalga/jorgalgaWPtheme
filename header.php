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