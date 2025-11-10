<h1><?= $h1; ?></h1>
<div id="content">
	<table>
		<tr>
			<th>id</th>
			<th>Название</th>
			<th>Цена</th>
			<th>Количество</th>
			<th>Описание</th>
			<th>ссылка</th>
		</tr>
		<?php foreach ($products as $product): ?>
		<tr>
			<td><?= $product['id']; ?></td>
			<td><?= $product['name']; ?></td>
			<td><?= $product['price']; ?> руб.</td>
			<td><?= $product['quantity']; ?> шт.</td>
			<td><?= mb_substr($product['description'], 0, 50); ?>...</td>
			<td><a href="/product/<?= $product['id']; ?>/">ссылка на продукт</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
