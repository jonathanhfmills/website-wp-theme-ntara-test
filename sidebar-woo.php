<?php defined( 'ABSPATH' ) || exit; ?>

<div class="sidebar sticky-lg-top z-1">
	<nav class="navbar navbar-expand-md">
		<div class="offcanvas offcanvas-start" tabindex="-1" id="filter" aria-labelledby="filterLabel">
			<div class="offcanvas-header d-md-none">
				<h5 class="offcanvas-title" id="filterLabel">Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>

			<div class="offcanvas-body">
				<?php if ( is_active_sidebar( 'woo' ) ) : ?>
				<div class="widgets">
					<?php dynamic_sidebar( 'woo' ) ?>
				</div>
				<?php endif ?>
			</div>

			<div class="offcanvas-header border-0 text-bg-black justify-content-end d-md-none">
				<button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="btn btn-primary">Show Results</button>
			</div>
		</div>
	</nav>
</div>
