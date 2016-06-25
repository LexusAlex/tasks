<?php

function foo(){
    for ($i=0; $i<100; $i++){
        echo $i;
    }
}
// включение профайлера
xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

// выполнение кода
foo();

// остановка профайлера
$xhprof_data = xhprof_disable();

// сохрение результата
$XHPROF_ROOT = realpath(dirname(__FILE__) .'/..');

include_once $XHPROF_ROOT. "/xhprof/vendor/lox/xhprof/xhprof_lib/utils/xhprof_lib.php";
include_once $XHPROF_ROOT. "/xhprof/vendor/lox/xhprof/xhprof_lib/utils/xhprof_runs.php";
$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, "test");


echo '<a href="http://tasks.loc/php/xhprof/vendor/lox/xhprof/xhprof_html/">result</a>';