<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //$table=concert / $num=1 / $page=1

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0]; //첨부파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0]; //날짜_시간으로 바뀐 이름 > 서버에 저장된 이름
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	
	for ($i=0; $i<3; $i++) //첨부된 이미지 처리를 위한 반복문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) => 배열 형태의 리턴값
              // => 파일의 너비와 높이값, 종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 1200) //첨부된 이미지의 최대 너비를 '폼(출력해주는 태그) 최대 크기'로 지정
				$image_width[$i] = 1200;
		}
		else //업로드된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../common/css/common.css" rel="stylesheet">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link href="css/event.css" rel="stylesheet">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/c56cffabac.js" crossorigin="anonymous"></script>

    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
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
                    <li><a class="nav1 nav" href="../greet/list.php">공지사항</a></li>
                    <li><a class="nav2 nav current" href="list.php">이벤트</a></li>
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
                <span>이벤트</span>
            </div>
            <h2>이벤트</h2>
            <span>event</span>
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
                <?
                    for($i=0; $i<3; $i++){
                        if($image_copied[$i]){
                            $img_name=$image_copied[$i];
                            $img_name="./data/".$img_name;
                            $img_width=$image_width[$i];
                            
                            echo "<img src='$img_name' alt='' width='$img_width'>"."<br><br>";
                        }
                    }
                ?>
                <?=$item_content?>
            </div>
            <div class="button_area">
                <a href="list.php?table=<?=$table?>&page=<?=$page?>"><i class="fas fa-list"></i> 목록</a>
                <? 
                    if($userid==$item_id || $userlevel==1 || $userid=="zensuyeom")
                    {
                ?>
                <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>"><i class="fas fa-pen"></i> 수정</a>
                <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')"><i class="far fa-trash-alt"></i> 삭제</a>
                <?
                    }
                ?>
            </div>
        </div>   
    </article>
    <? include "../common/sub_foot.html" ?>
</body>
</html>