<?php 
public static function datatable_display_pagination($per_page, $page, $table, $module){
		global $db;
		$group = $db->GetOne("select ceil(((select count(*) from $table) / $per_page)) as groups;");
		if ( ($group * 10) >= 10) {
			echo "<ul class='pagination margin-bottom-10' style='padding: 10px;'>"; ?>
				<?php if($page > 1 ) { ?>
					<li class='pagination-sm pagination-demo-3' > <a href='#'  onclick="open_module('./modules/<?php echo $module; ?>/all.php?page=<?php echo ($page - 1); ?>');"> << Prev </a> </li>
				<?php } ?>
				
			<?php	for($pager = 1; $pager <= $group; $pager ++){
						if($pager == $page){ ?>
							<li class='active pagination-sm pagination-demo-3'> <a href='#' onclick="open_module('./modules/<?php echo $module; ?>/all.php?page=<?php echo $pager; ?>');"> <?php echo $pager; ?> </a> </li>
						<?php }else{ ?>
							<li class='pagination-sm pagination-demo-3'> <a href='#' onclick="open_module('./modules/<?php echo $module; ?>/all.php?page=<?php echo $pager; ?>');"> <?php echo $pager; ?> </a> </li>
						<?php }
					} ?>
				<?php if($page != $group ) { ?>
					<li class='pagination-sm pagination-demo-3' > <a href='#'  onclick="open_module('./modules/<?php echo $module; ?>/all.php?page=<?php echo $group; ?>');"> Last >> </a> </li>
				<?php } ?>
				<?php 
			echo "</ul>";
		}
    }


?>