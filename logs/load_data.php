<?php

if ($_POST['page']) {
    $page = $_POST['page'];
    $cur_page = $page;
    $page -= 1;
    $per_page = 10;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;


    include '../ini.php';

    /* ------------------- Dados -------------------- */
    $msg = log_page($start, $per_page);

    /* --------------- Configuracoes ---------------- */
    $count = log_count();
    $no_of_paginations = ceil($count / $per_page);

    /* ---------------Calculating the starting and endign values for the loop----------------------------------- */
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
        $msg .= "<li p='1' class='active'><<</li>"; // TODO: alterar
    } else if ($first_btn) {
        $msg .= "<li p='1' class='inactive'><<</li>"; // TODO: alterar
    }

    // FOR ENABLING THE PREVIOUS BUTTON
    if ($previous_btn && $cur_page > 1) {
        $pre = $cur_page - 1;
        $msg .= "<li p='$pre' class='active'><</li>";  // TODO: alterar
    } else if ($previous_btn) {
        $msg .= "<li class='inactive'><</li>"; // TODO: alterar
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
        $msg .= "<li p='$nex' class='active'>></li>"; // TODO: alterar
    } else if ($next_btn) {
        $msg .= "<li class='inactive'>></li>"; // TODO: alterar
    }

    // TO ENABLE THE END BUTTON
    if ($last_btn && $cur_page < $no_of_paginations) {
        $msg .= "<li p='$no_of_paginations' class='active'>>></li>"; // TODO: alterar
    } else if ($last_btn) {
        $msg .= "<li p='$no_of_paginations' class='inactive'>>></li>"; // TODO: alterar
    }
    $goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:10px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>"; // TODO: alterar
    $total_string = "<span class='total' a='$no_of_paginations'>Página <b>" . $cur_page . "</b> de <b>$no_of_paginations</b></span>"; // TODO: alterar
    $msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
    echo $msg;
}

