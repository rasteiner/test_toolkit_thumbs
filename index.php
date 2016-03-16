<?php require('toolkit/bootstrap.php');

$focal_points = array(
	'top',
	'bottom',
	'left',
	'right',
	'top left',
	'top right',
	'bottom left',
	'bottom right',
	'center',
);
$images = array(
	'butterfly.jpg',
	'tower.jpg'
);
$drivers = array(
	'im',
	'gd'
);

$dest = __DIR__ . DS . 'thumbs';

?>
<!doctype html>

<?php foreach ($drivers as $driver): ?>
	<h1 style="clear: both">Driver: <?php echo $driver ?></h1>

	<?php foreach ($images as $image): ?>
		<div style="width: 300px; float: left;">
			<?php foreach ($focal_points as $focal) :?>
				<div>
					<?php 
						$t = thumb($image, "height:90|width:90|crop:$focal|driver:$driver|root:${dest}$driver|url:/thumbs$driver" );
						if($t->tag()) {
							echo $t->tag(); 
						} else {
							echo 'ERROR: ';
						}
						echo $focal;
					?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endforeach ?>
<?php endforeach ?>
