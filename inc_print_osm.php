			<?php
			$hasAlbumGeodata = false;
			$album = $_zp_current_album;
			$images = $album->getImages(0, 0, null, null, false);

			foreach ($images as $an_image) {
				$image = Image::newImage($album, $an_image);
				if ($image->getGeodata()) {
					$hasAlbumGeodata = true;
					break;
				}
			}

			// display map only if there is geodata
			if ($hasAlbumGeodata == true) {
				?>
				<div class="osm_panel panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-map-marker"></span>&nbsp;<?php echo gettext('Map'); ?>
						</h4>
					</div>
					<div class="panel-body">
						<?php openStreetMap::printOpenStreetMap(); ?>
					</div>
				</div>
				<?php
			}
			?>
