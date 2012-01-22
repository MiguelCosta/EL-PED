<?php
   function page_config($msg,$count,$per_page,$cur_page,$first_btn,$previous_btn,$next_btn,$last_btn) {
	  $no_of_paginations = ceil($count / $per_page);

	  /* ---------------Calculo dos valores iniciais e finais para o ciclo----------------------------------- */
	  if ($cur_page >= 7) {
		 $start_loop = $cur_page - 3;
		 if ($no_of_paginations > $cur_page + 3)
		 $end_loop = $cur_page + 3;
		 else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
			$start_loop = $no_of_paginations - 6;
			$end_loop = $no_of_paginations;
		 } else {
			$end_loop = $no_of_paginations;
		 }
	  } else {
		 $start_loop = 1;
		 if ($no_of_paginations > 7)
		 $end_loop = 7;
		 else
		 $end_loop = $no_of_paginations;
	  }
	  /* ----------------------------------------------------------------------------------------------------------- */
	  $msg .= "<div class='pagination'><ul>";

			// FOR ENABLING THE FIRST BUTTON
			if ($first_btn && $cur_page > 1) {
			   $msg .= "<li p='1' class='active'><<</li>"; 
			} else if ($first_btn) {
			   $msg .= "<li p='1' class='inactive'><<</li>"; 
			}

			// FOR ENABLING THE PREVIOUS BUTTON
			if ($previous_btn && $cur_page > 1) {
			   $pre = $cur_page - 1;
			   $msg .= "<li p='$pre' class='active'><</li>"; 
			} else if ($previous_btn) {
			   $msg .= "<li class='inactive'><</li>"; 
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {

			   if ($cur_page == $i)
			   $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
			   else
			   $msg .= "<li p='$i' class='active'>{$i}</li>";
			}

			// TO ENABLE THE NEXT BUTTON
			if ($next_btn && $cur_page < $no_of_paginations) {
			   $nex = $cur_page + 1;
			   $msg .= "<li p='$nex' class='active'>></li>"; 
			} else if ($next_btn) {
			   $msg .= "<li class='inactive'>></li>"; 
			}

			// TO ENABLE THE END BUTTON
			if ($last_btn && $cur_page < $no_of_paginations) {
			   $msg .= "<li p='$no_of_paginations' class='active'>>></li>"; 
			} else if ($last_btn) {
			   $msg .= "<li p='$no_of_paginations' class='inactive'>>></li>"; 
			}
			$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:10px;'/><input type='button' id='go_btn' class='go_button' value='Ir'/>"; 
			$total_string = "<span class='total' a='$no_of_paginations'>Página <b>" . $cur_page . "</b> de <b>$no_of_paginations</b></span>"; 
			$msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content para a paginacao

	  return $msg;
   }
?>
