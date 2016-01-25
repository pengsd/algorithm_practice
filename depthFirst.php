<?php
/**
 * @todo php递归深度优先
 * 得出6个筛子的所有结果
 * @author pengsidong@gmail.com
 */


goDepth(1,array());

/**
 * @param depth 深度
 */
function goDepth($depth,$res){
	if($depth == 6+1){//到临界点终止
		foreach($res as $v){
			echo $v.' ';
		}
		echo '<br>';
		return;
	}
	for($i=1;$i<=6;$i++){//循环所有可能
		$res[$depth] = $i;
		goDepth($depth+1,$res);//回到上一步
	}
}
