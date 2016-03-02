<?php
include_once('config/config.php');
include_once('config/repositories.php');
include_once('classes/object.php');
include_once('classes/deploy.php');

echo 'Admin';
if(isset($_GET['repo'])) {
    $deployer = new Deployer($repositories);
    $repo = $repositories[$_GET['repo']];

    $lines = $deployer->tailCustom('logs'. DS . $repo['log'], 250);
    echo $lines;
}
else {
?>
<ul>
    <?php
    foreach($repositories as $name => $repo): ?>
        <li><?php echo $name ?> : <a href="?repo=<?php echo $name; ?>"><?php echo $repo['url']?></a> </li>
    <?php endforeach; ?>
</ul>
<?php
}
?>
