<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../common/css/common.css" rel="stylesheet">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link href="css/greet.css" rel="stylesheet">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/c56cffabac.js" crossorigin="anonymous"></script>

    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
        function del(href) 
        {
            if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                    document.location.href = href;
            }
        }
    </script>
</head>
<body>
    <? include "../common/sub_head.html" ?>
    
   <!-- 메인비주얼영역 -->    
        <div class="visual">
            <img src="../sub5/common/images/sub5visual.jpg" alt="">
        </div>
    <!-- 서브네비영역 -->
        <div class="subnav_box">
            <h3>공지사항</h3>
            <p>세스코의 새로운 소식과 행사내용을 전해드립니다.</p>
            <div class="sub_nav">
                <ul>
                    <li><a class="nav1 nav current" href="li">공지사항</a></li>
                    <li><a class="nav2 nav" href="../sub5/sub5_2.html">이벤트</a></li>
                    <li><a class="nav3 nav" href="../sub5/sub5_3.html">홍보영상</a></li>
                </ul>
            </div>
        </div>
    <!-- 본문콘텐츠영역 -->
    <article id="contentArea">
        <div class="title_area">
            <div class="line_map">
                <span>home&gt;</span>
                <span>공지사항&gt;</span>
                <span>공지사항</span>
            </div>
            <h2>공지사항</h2>
            <span>notice</span>
        </div>
        <div class="content_area">
            <div class="top_area">
                <h5><?= $item_subject ?></h5>
                <ul>
                    <li><?= $item_nick ?></li>
                    <li>조회 : <?= $item_hit ?></li>
                    <li><?= $item_date ?></li>
                </ul>    
            </div>
            <div class="bottom_area">
                <?= $item_content ?>
            </div>
            <div class="button_area">
                <a href="list.php?page=<?=$page?>"><i class="fas fa-list"></i> 목록</a>
                <? 
                    if($userid==$item_id || $userlevel==1 || $userid=="zensuyeom")
                    {
                ?>
                <a href="modify_form.php?num=<?=$num?>&page=<?=$page?>"><i class="fas fa-pen"></i> 수정</a>
                <a href="javascript:del('delete.php?num=<?=$num?>')"><i class="far fa-trash-alt"></i> 삭제</a>
                <?
                    }
                ?>
            </div>
        </div>   
    </article>
    <? include "../common/sub_foot.html" ?> 
</body>
</html>