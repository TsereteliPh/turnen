<?php
$id = $args['id'] ?? false;
if (have_rows('blocks', $id)) {
	$counters = array();
	while (have_rows('blocks', $id)) {
		the_row();
		$layout = get_row_layout();
		if (!isset($counters[$layout])) {
			// initialize counter
			$counters[$layout] = 1;
		} else {
			// increase existing counter
			$counters[$layout]++;
		}

		if (get_row_layout() == 'album') get_template_part('layouts/blocks/album/template');
		else if (get_row_layout() == 'coaches') get_template_part('layouts/blocks/coaches/template');
		else if (get_row_layout() == 'contacts') get_template_part('layouts/blocks/contacts/template');
		else if (get_row_layout() == 'map') get_template_part('layouts/blocks/map/template');
		else if (get_row_layout() == 'medal') get_template_part('layouts/blocks/medal/template');
		else if (get_row_layout() == 'price') get_template_part('layouts/blocks/price/template');
	}
}
