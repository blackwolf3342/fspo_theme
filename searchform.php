<div class="search-wrapper">
	<div class="search-box">
		<i class="fas fa-search"></i>
	</div>
	<form action="<?php home_url( '/' ) ?>" method="get" class="search-form">
		<fieldset>
			<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
			<button type="submit"><i class="fas fa-search"></i></button>
		</fieldset>
	</form>
</div>
