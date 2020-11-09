<?
   function latest_article($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			 $len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				$subject = str_replace( "&#039;", "'", $subject);               
                $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

			echo "      
				<li>
                    <a href='./$table/view.php?table=$table&num=$num'>
                        <span>$regist_day</span>
                        <span>$subject</span>
                        <span><i class='fas fa-plus-circle'></i></span>
                    </a>
                </li>
			    ";
		}
		mysql_close();
   }
/*
<li>
    <a href="greet/list.php">
        <span>2020.05.29</span>
        <span>세스케어 미세먼지 마스크 소소형 판매 사전 안내</span>
        <span><i class="fas fa-plus-circle"></i></span>
    </a>
</li>
*/

?>