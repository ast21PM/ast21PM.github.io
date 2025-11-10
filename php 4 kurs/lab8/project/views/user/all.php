<h1>Список всех пользователей</h1>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>ID</th>
		<th>Имя</th>
		<th>Возраст</th>
		<th>Зарплата</th>
	</tr>
	<?php foreach ($users as $id => $user): ?>
	<tr>
		<td><?= $id ?></td>
		<td><?= $user['name'] ?></td>
		<td><?= $user['age'] ?></td>
		<td><?= $user['salary'] ?></td>
	</tr>
	<?php endforeach; ?>
</table>

