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
                <a class="navbar-brand" href="<?php bloginfo('wpurl');?>" target="_blank"><?php echo get_bloginfo( 'name' ); ?></a>
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