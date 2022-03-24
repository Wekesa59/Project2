<!doctype html>
<html>
<head>
	<title>HTTP Jeoparody</title>
	<link rel = "stylesheet" href = "template.css">
</head>
<body>
	<!-- All the PHP code is in here -->
	<table class="game">
		<thead class="content-name">
			<tr>
				<?php foreach ($game['categories'] as $category): ?>
					<th><?php echo $category['name'] ?></th>
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody class="content-money">
			<?php $dailyDouble = rand(3, 4) . rand(0, 4) ?>
			<?php for ($row = 0; $row < 5; $row++): ?>
				<?php $points = ($row + 1) * $game['pointScale'] ?>
				<tr>
					<?php for ($col = 0; $col < 5; $col++): ?>
						<?php $data = $game['categories'][$col]['questions'][$row]; ?>
						<?php $class = ($dailyDouble === $row . $col) ? 'tile dd' : 'tile' ?>
						<td class="<?php echo $class ?>" href="#popup_<?php echo $row . "_" . $col; ?>" data-points="<?php echo $points ?>">
							<a href="#popup_<?php echo $row . "_" . $col; ?>">$<?php echo $points ?></a>
							<div id="popup_<?php echo $row . "_" . $col; ?>" class="overlay">
								<div class="popup">
									<a class="close" href="#popup_<?php echo $row . "_" . $col . "_" . $row . "_" . $col; ?>">&times;</a>
									<div class="content">
										<?php echo htmlentities($data['answer'], ENT_QUOTES, 'UTF-8'); ?>
									</div>
								</div>
							</div>
							<div id="popup_<?php echo $row . "_" . $col . "_" . $row . "_" . $col; ?>" class="overlay">
								<div class="popup">
									<a class="close" href="#">&times;</a>
									<div class="content">
										<?php echo htmlentities($data['question'], ENT_QUOTES, 'UTF-8'); ?>
									</div>
								</div>
							</div>

						</td>
					<?php endfor ?>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
	<!-- End PHP code. -->
	<table class="question">
		<tr>
			<td class="text content-text" colspan="7">QUESTION</td>
		</tr>
		<tr class="content-name">
			<td class="award p1-name" colspan="1" data-player="p1" >Player 1</td>
			<td class="award p2-name" colspan="1" data-player="p2" >Player 2</td>
			<td class="award p3-name" colspan="1" data-player="p3" >Player 3</td>
			<td class="award p4-name" colspan="1" data-player="p4" >Player 4</td>
			<td class="award p5-name" colspan="1" data-player="p5" >Player 5</td>
			<td class="award p6-name" colspan="1" data-player="p6" >Player 6</td>
			<td class="show-answer" colspan="1">&#9760;</td>
		</tr>
	</table>
	<table class="scores">
		<tr class="content-name">
			<th><span class="player" data-player="p1" contenteditable="true">Player 1</span></th>
			<th><span class="player" data-player="p2" contenteditable="true">Player 2</span></th>
			<th><span class="player" data-player="p3" contenteditable="true">Player 3</span></th>
		</tr>
		<tr class="content-money">
			<td class="p1-score" data-score="0"><input type="number" step="200"/></td>
			<td class="p2-score" data-score="0">$0</td>
			<td class="p3-score" data-score="0">$0</td>
		</tr>

		<tr class="content-name">
			<th><span class="player" data-player="p4" contenteditable="true">Player 4</span></th>
			<th><span class="player" data-player="p5" contenteditable="true">Player 5</span></th>
			<th><span class="player" data-player="p6" contenteditable="true">Player 6</span></th>
		</tr>
		<tr class="content-money">
			<td class="p4-score" data-score="0">$0</td>
			<td class="p5-score" data-score="0">$0</td>
			<td class="p6-score" data-score="0">$0</td>
		</tr>
	</table>
</body>
</html>