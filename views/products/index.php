<?php

use yii\widgets\LinkPager;

?>

<div>

	<?php foreach ($properties as $property): ?>
		<ul>
			<li>
				<a href="">
					<?= $property->name ?>
				</a>
			</li>
		</ul>
	<?php endforeach; ?>
</div>


<div>
	Жанры
	<?php foreach ($categories as $category): ?>
		<ul>
			<li>
				<a href="<?= Yii::$app->homeUrl . 'category/' . $category->name . '/' ?>">
					<?= $category->title ?>
				</a>
			</li>
		</ul>
	<?php endforeach; ?>
</div>


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
