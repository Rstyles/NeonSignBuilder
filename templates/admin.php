<div class="wrap">
	<h1>Neon Sign Builder Plugin</h1>
	<?php  settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Manage Settings</a></li>
		<li><a href="#tab-2">About</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
			<form method="post" action="options.php">
				<?php 
					settings_fields('neon_sign_builder_options_group');
					do_settings_sections('neon_sign_builder_plugin');
					submit_button();
				?>
			</form>
		</div>

		<div id="tab-2" class="tab-pane">
			<h3>About</h3>
			<p>This plugin was developed by Nozak Consulting</p>
		</div>
	</div>
	</div>
</div>