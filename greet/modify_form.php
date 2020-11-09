<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>
<!DOCTYPE html>
<html lang="ko">
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
            <form name="board_form" method="post" action="insert.php">
                <ul class="write_area">
                    <li>
                        <label for="subject">제목</label>
                        <input type="text" name="subject" id="subject" value="<?=$item_subject?>">
                    </li>
                    <li>
                        <span>닉네임</span>
                        <span><?=$usernick?></span>
                    </li>
                    <li>
                        <label for="content">내용</label>
                        <textarea name="content" cols="79" rows="30" id="content"><?=$item_content?></textarea>
                    </li>
                </ul>
                <div class="write_button">
                    <a href="list.php?page=<?=$page?>">목록</a>
                    <button type="submit">완료</button>
                </div>
            </form>
        </div>   
    </article>
    <? include "../common/sub_foot.html" ?> 
</body>
</html>