<form action="/" method="get">
    <input type="text" name="s" id="search" placeholder="Tìm kiếm..." value="<?php the_search_query(); ?>" />
    <span></span>
    <input type="submit" hidden="true" id="search-submit"/>
</form>