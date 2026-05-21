<form role="search" method="get" action="<?php echo home_url('/'); ?>" >
    <div style="display: flex; gap: 8px; background: white; padding: 6px; border-radius: 999px; box-shadow: var(--shadow-sm);">
        <input type="search" name="s" placeholder="Rechercher sur le site…" value="<?php echo get_search_query(); ?>" style="flex: 1; border: none; padding: 12px 20px; border-radius: 999px; font-family: inherit; outline: none; background: transparent;">
        <button type="submit" class="btn btn-primary" style="padding: 12px 24px;">Rechercher</button>
    </div>
</form>