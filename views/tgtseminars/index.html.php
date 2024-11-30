<div class="block-title">Videos</div>
    <div class="block">
 <?php
	foreach($videos as $v){
?>     <div class="grid grid-cols-2 grid-gap lazy">
        <div>
			<?=$v->{"description"}?>
        </div>
		<div>
			<iframe width="100%" height="400px" src="https://www.youtube.com/embed/<?=$v->{"video"}?>"></iframe>
        </div>
    </div>
<?php	}?>
</div>





</div>