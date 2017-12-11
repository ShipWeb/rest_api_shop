<?php

use app\components\MainSliderGames;
use app\components\MainBannerGames;
use app\components\MainListGames;
use app\components\MainGenreGames;
use app\components\MainLuck;

$this->title = Yii::$app->params['mainPageTitle'];
$description=Yii::$app->params['mainPageDescription'];
$keywords=Yii::$app->params['mainPageKeywords'];
$this->registerMetaTag([
	'name' => 'description',
	'content' => $description
]);

$this->registerMetaTag([
	'name' => 'keywords',
	'content' => $keywords
]);


?>

<div class="container main wrapper">
	<div class="row row-flex">
		<?= MainGenreGames::widget(); ?>
		<?= MainSliderGames::widget(); ?>
	</div>
	<?= MainLuck::widget(); ?>
	<div class="row brands">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg3">
			<img class="img-responsive" src="images/steam_logo_512x_by_garyosavan-da86b2s.png">
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg3 uplay">
			<img class="img-responsive" src="images/Uplay_logo.png">
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg3 origin">
			<img class="img-responsive" src="images/Origin-logo.png">
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg3">
			<img class="img-responsive" src="images/logo-battle-net.png">
		</div>
	</div>

	<?php

	echo MainBannerGames::widget();

	?>

</div>

<!--Модуль вкладки-->

<?php

echo MainListGames::widget();

?>





