<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    
    //새글쓰기 =>  $table='event'
    //수정 => $table=event / $mode=modify / $num=1 / $page=1

	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
    <script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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
            <?
                if($mode=="modify") //수정모드
                {

            ?>
            <form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
            <?
                }
                else //새글쓰기 모드
                {
            ?>
            </form>
            <form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">
            <?
                }
            ?>         
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
                        <?
                            if( $userid && ($mode != "modify") )
                            {   //새글쓰기 에서만 HTML 쓰기가 보인다
                        ?>
                        <span class="html_ok">
                            <input type="checkbox" name="html_ok" id="html_ok">
                            <label for="html_ok">html 쓰기</label>
                        </span>
                        <?
                            }
                        ?>
                    </li>
                    <li>
                        <label for="upfile1">파일 1</label>
                        <input type="file" name="upfile[]" id="upfile1" class="file">
                    </li>
                    <? 	if ($mode=="modify" && $item_file_0)
                        {
                    ?>
                    <li class="modi_list">
                        <label for="del_file1" class="modi"><?=$item_file_0?>파일이 등록되어 있습니다.</label>
                        <input type="checkbox" name="del_file[]" value="0" id="del_file1" class="modi_file">삭제
                    </li>
                    <?
                        }
                    ?>
                    <li>
                        <label for="upfile2">파일 2</label>
                        <input type="file" name="upfile[]" id="upfile2" class="file">
                    </li>
                    <? 	if ($mode=="modify" && $item_file_1)
                        {
                    ?>
                    <li class="modi_list">
                        <label for="del_file2" class="modi"><?=$item_file_1?>파일이 등록되어 있습니다.</label>
                        <input type="checkbox" name="del_file[]" value="1" id="del_file2" class="modi_file">삭제
                    </li>
                    <?
                        }
                    ?>
                    <li>
                        <label for="upfile3">파일 3</label>
                        <input type="file" name="upfile[]" id="upfile3" class="file">
                    </li>
                    <? 	if ($mode=="modify" && $item_file_2)
                        {
                    ?>
                    <li class="modi_list">
                        <label for="del_file3" class="modi"><?=$item_file_2?>파일이 등록되어 있습니다.</label>
                        <input type="checkbox" name="del_file[]" value="0" id="del_file3" class="modi_file">삭제
                    </li>
                    <?
                        }
                    ?>
                </ul>
                <div class="write_button">
                    <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
                    <a href="#" onclick="check_input()">완료</a>
                </div>
            </form>
        </div>   
    </article>
    <? include "../common/sub_foot.html" ?>
</body>
</html>