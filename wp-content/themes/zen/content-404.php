<div class="container content_container">
	<h1 class="page_title"><span>Page does not exist</span></h1>
	
	<div class="error_image">
		<img src="<?php bloginfo('template_url'); ?>/images/404.png" alt="Page does not exist" />
	</div>
	
	<div class=" ">
		<div class="error_actions_title">
			Page you requested is removed or renamed. <br />
			Please try to search or contact us.
		</div>
		
		<div class="error_actions_block">
			<a href="#" class="error_actions_link">Contact us</a> <br />
            <div class="not_found_search">
                <a href="#" class="error_actions_link">Search</a>
                <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="form_field_wrap">
                        <input type="search" name="s" value="" placeholder="Search" />
                    </div>
                    <button type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
            </div>
		</div>

		<div class="error_actions_btn">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn_medium">Home</a>
		</div>
	</div>
</div>