<?php
/*
	caption *
	thead
	tbody
	pagehtml *


*/
?>
<table>
	<?php if(isset($caption)):?>
	<caption><?php echo $caption;?></caption>
	<?php endif?>
<thead>
<tr>
	<?php foreach($thead as $th):?>
		<th>
			<?php echo $th;?>
		</th>
	<?php endforeach?>
</tr>
</thead>
<tbody>
	<?php foreach($tbody as $row):?>
		<tr>
			<?php foreach($row as $td):?>
				<td>
					<?php echo $td;?>
				</td>
			<?php endforeach?>	
		</tr>
	<?php endforeach?>	
</tbody>
<?php if(isset($pagehtml) && count($tbody)>0):?>
<tfoot>
	<tr>
		<td colspan="<?php echo count($tbody[1]);?>"><?php echo $pagehtml;?></td>
	</tr>
</tfoot>
<?php endif?>
</table>