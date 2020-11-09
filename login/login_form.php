<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>세스코로그인페이지</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/member.css">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/c56cffabac.js" crossorigin="anonymous"></script>

    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrap">
        <div id="col2">
            <h1><a href="../index.html">세스코 로그인</a></h1>
            <form  name="member_form" method="post" action="login.php">
               <ul>
                   <li>
                      <label for="id" class="hidden">아이디</label>
                      <input type="text" name="id" class="login_input" id="id" placeholder="아이디">
                   </li>
                   <li>
                      <label for="pass" class="hidden">비밀번호</label>
                      <input type="password" name="pass" class="login_input" id="pass" placeholder="비밀번호"> 
                   </li>
                   <li>
                       <button type="submit">로그인</button>
                   </li>
               </ul>           
            </form>
            <div class="search">
               <ul>
                   <li>
                       <a href="#"><i class="far fa-lightbulb"></i> 아이디 찾기</a>
                       <form name="idsearch" id="searchId">
                          <ul>
                              <li>
                                   <label for="searchName">이름</label>
                                   <input type="text" name="searchName" id="searchName" placeholder="회원정보에 등록한 이름을 입력해주세요.">
                              </li>
                              <li>
                                   <label for="searchPhone1">연락처</label>
                                    <label for="hp" class="hidden">연락처</label>
                                    <select name="hp" id="hp" class="phone">
                                        <option value="010">010</option>
                                        <option value="011">011</option>
                                        <option value="017">017</option>
                                        <option value="019">019</option>
                                    </select>
                                    <input type="text" name="searchPhone1" id="searchPhone1" class="phone">
                                    <label for="searchPhone2" class="hidden">연락처</label>
                                    <input type="text" name="searchPhone2" id="searchPhone2" class="phone">
                              </li>
                              <li>
                                   <label for="searchMail">이메일</label>
                                   <input type="text" name="searchMail" id="searchMail" placeholder="회원정보에 등록한 메일을 입력해주세요.">
                              </li>
                              <li>
                                  <button type="button" class="idBtn">아이디 찾기</button>
                              </li>
                          </ul>
                       </form>
                       
                       <div id="loadtext"></div>
                       
                   </li>
                   <li>
                       <a href="#"><i class="fas fa-key"></i> 비밀번호 찾기</a>
                       <form name="passsearch" id="passSearch">
                          <ul>
                                <li>
                                    <label for="passId">아이디</label>
                                    <input type="text" name="passId" id="passId" placeholder="세스코 아이디">
                                </li>
                                <li>
                                    <label for="passName">이름</label>
                                    <input type="text" name="passname" id="passName" placeholder="세스코 회원 이름">
                                </li>
                                <li>
                                    <label for="passPhone1">연락처</label>
                                    <label for="passhp" class="hidden">연락처</label>
                                    <select name="passhp" id="passhp" class="phone">
                                        <option value="010">010</option>
                                        <option value="011">011</option>
                                        <option value="017">017</option>
                                        <option value="019">019</option>
                                    </select>
                                    <input type="text" name="passPhone1" id="passPhone1" class="phone">
                                    <label for="passPhone2" class="hidden">연락처</label>
                                    <input type="text" name="passPhone2" id="passPhone2" class="phone">
                                </li>
                                <li>
                                    <label for="passMail">이메일</label>
                                    <input type="text" name="passMail" id="passMail" placeholder="세스코 회원 이메일"> 
                                </li>
                                <li>
                                    <button type="button" class="passBtn">비밀번호 찾기</button>
                                </li>
                          </ul>
                       </form>
                       <div id="loadtext2"></div>
                   </li>
               </ul>
            </div>
            <div class="log_btn">
                <p>아직 세스코 회원이 아니십니까?</p>
                <a href="../member/join.html">회원가입</a>
            </div>
        </div> 
    </div>
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="search.js"></script>
    <script>
        $(document).ready(function() {

             //id 찾기
             $(".idBtn").click(function() {    // id입력 상자에 id값 입력시
                var searchName = $('#searchName').val(); //a
                var hp = $('#hp').val();
                var searchPhone1 = $('#searchPhone1').val();
                var searchPhone2 = $('#searchPhone2').val();
                var searchMail = $('#searchMail').val();

              if(searchName=='' || searchPhone1=='' || searchPhone2=='' || searchMail==''){
                  alert('모든 항목을 입력해주세요.');

              }else{
                $.ajax({
                    type: "POST",
                    url: "idsearch.php",
                    data:{
                        "searchName":searchName, 
                        "hp": hp,
                        "searchPhone1":searchPhone1,
                        "searchPhone2":searchPhone2,
                        "searchMail":searchMail
                    },   
                    cache: false, 
                    success: function(data)
                    {
                         $("#loadtext").html(data);
                    }
                });
              }
             });

            //password 찾기
            $(".passBtn").click(function(){
                var passId = $("#passId").val();
                var passName = $("#passName").val();
                var passhp = $("#passhp").val();
                var passPhone1 = $("#passPhone1").val();
                var passPhone2 = $("#passPhone2").val();
                var passMail = $("#passMail").val();
                
                if(passId=='' || passName=='' || passPhone1=='' || passPhone2=='' || passMail==''){
                    alert('모든 항목을 입력해주세요.');
                }else{
                    $.ajax({
                       type : "POST",
                       url : "passsearch.php",
                       data:{
                           "passId":passId,
                           "passName":passName,
                           "passhp":passhp,
                           "passPhone1":passPhone1,
                           "passPhone2":passPhone2,
                           "passMail":passMail
                       },
                       cache: false,
                       success: function(data){
                           $("#loadtext2").html(data);
                       }
                    });
                };
            });
            
            
        });

	</script>
    
    
</body>
</html>