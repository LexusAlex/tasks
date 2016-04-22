<?php

/**
 * Разбивает массив на чанки размером [n,2n-1]
 */
function array_chunk_min($list,$minSize){
    $cnt = count($list);
    if($cnt <= $minSize){
        return array($list);
    }
    $lastChunkSize = $cnt%$minSize;
    if($lastChunkSize > 0){
        $chunks = array_chunk(array_slice($list, 0, $cnt-$lastChunkSize),$minSize);
        $lastChunk = array_slice($list, $cnt-$lastChunkSize,$minSize);
        $cntChunks = count($chunks);
        $chunks[$cntChunks-1] = array_merge($chunks[$cntChunks-1],$lastChunk);
    }else{
        $chunks = array_chunk($list, $minSize);
    }
    return $chunks;
}

var_dump(array_chunk_min(range(1,1000),20));