<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field">
        <span class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'webdescode'); ?></span>
    </label>
    <input 
        type="search" 
        id="search-field" 
        class="search-field" 
        placeholder="<?php echo esc_attr_x('Search …', 'placeholder', 'webdescode'); ?>" 
        value="<?php echo esc_attr(get_search_query()); ?>" 
        name="s" 
    />
    <button type="submit" class="search-submit">
    <i class="fas fa-search" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html_x(' ', 'submit button', 'webdescode'); ?></span>
    </button>

</form>