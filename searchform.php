<form action="<?php echo home_url(); ?>" method="get">
	<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="Escribe tu búsqueda">
	<button type="submit">
		<i class="fas fa-search"></i>
	</button>
</form>