<? 
	session_start(); 
     @extract($_POST);
     @extract($_GET);
     @extract($_SESSION);
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
<?
	include "../lib/dbconn.php";

	
  if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
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
                    <li><a class="nav1 nav current" href="list.php">공지사항</a></li>
                    <li><a class="nav2 nav" href="../event/list.php">이벤트</a></li>
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
            <label for="scale" class="hidden">리스트개수</label>
            <select name="scale" onchange="location.href='list.php?scale='+this.value" id="scale">
                    <option value=''>보기</option>
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='15'>15</option>
                    <option value='20'>20</option>
            </select>
            <table>
                <caption class="hidden">공시사항</caption>
                <thead>
                    <tr>
                        <th scope="col">번호</th>
                        <th scope="col">제목</th>
                        <th scope="col">글쓴이</th>
                        <th scope="col">등록일</th>
                        <th scope="col">조회</th>
                    </tr>
                </thead>
                <tbody>
                   <?		
                   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
                   {
                      mysql_data_seek($result, $i);       
                      // 가져올 레코드로 위치(포인터) 이동  
                      $row = mysql_fetch_array($result);       
                      // 하나의 레코드 가져오기

                      $item_num     = $row[num];
                      $item_id      = $row[id];
                      $item_name    = $row[name];
                      $item_nick    = $row[nick];
                      $item_hit     = $row[hit];

                      $item_date    = $row[regist_day];
                      $item_date = substr($item_date, 0, 10);  

                      $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

                ?>
                    <tr>
                        <td><?= $number ?></td>
                        <td><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></td>
                        <td><?= $item_nick ?></td>
                        <td><?= $item_date ?></td>
                        <td><?= $item_hit ?></td>
                    </tr>
                </tbody>
                <?
                       $number--;
                   }
                ?>
            </table>
            <div id="page_button">
                <div id="page_num"> 
                
                <?
                   // 게시판 목록 하단에 페이지 링크 번호 출력
                   for ($i=1; $i<=$total_page; $i++)
                   {
                        if ($page == $i)     // 현재 페이지 번호 링크 안함
                        {
                            echo "<b> $i </b>";
                        }
                        else
                        { 
                           if($mode=="search"){
                             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
                            }else{    

                              echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
                           }
                        }
                   }
                       
                ?>			
                   
                </div>
                <div class="button">
                    <a href="list.php?page=<?=$page?>" class="list"><i class="fas fa-list"></i> 목록</a>&nbsp;
                <? 
                    if($userid)
                    {
                ?>
                        <a href="write_form.php" class="write"><i class="fas fa-pen"></i> 글쓰기</a>
                <?
                    }
                ?>
                </div>
            </div> <!-- end of page_button -->
            <form name="board_form" method="post" action="list.php?mode=search"> 
                <div id="list_search">
                    <p>▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.</p>
                    <label for="find" class="hidden">검색어선택</label>
                    <select name="find" id="find">
                        <option value='subject'>제목</option>
                        <option value='content'>내용</option>
                        <option value='nick'>별명</option>
                        <option value='name'>이름</option>
                    </select>
                    <label for="search" class="hidden">검색</label>
                    <input type="text" name="search" id="search">
                    <button type="submit">검색</button>
                </div>
            </form>
            </div>   
    </article>
    <? include "../common/sub_foot.html" ?> 
</body>
</html>