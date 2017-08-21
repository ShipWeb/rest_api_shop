<?php
use yii\widgets\LinkPager;

?>
<div>
	<div>
		<?php foreach ($products as $product): ?>
			<article>
				<h2>
					<a href="<?= Yii::$app->homeUrl . 'product/' . $product->product_id . '/' . $product->chpu ?>">
						<?= $product->title ?>
					</a>
				</h2>
			</article>
		<?php endforeach; ?>
	</div>
	<div>
		<?php
		echo LinkPager::widget([
			'pagination' => $pagination,
		]);
		?>
	</div>
</div>
