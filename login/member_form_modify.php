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
	<title>회원정보수정</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../member/css/member_form.css">
	<link rel="stylesheet" href="css/member_form.css">
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	
	<script>
	 $(document).ready(function() {
  
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "../member/check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
	<script>
   

  
   function check_input()
   {

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }


      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    //$userid='aaa'; > session변수 / 로그인한 아이디
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-1111-2222
    $hp1 = $hp[0]; //000
    $hp2 = $hp[1]; //1111
    $hp3 = $hp[2]; //2222

    $email = explode("@", $row[email]); //1111@gmail.com
    $email1 = $email[0]; //1111
    $email2 = $email[1]; //gmail.com

    mysql_close();
?>
<body>
    <article id="content">  
        <h1><a href="../index.html">회원가입</a></h1>
        <form  name="member_form" method="post" action="modify.php">
          <ul>
              <li>
                  <?= $row[id] ?> <span>* 세스코 멤버쉽 회원 아이디입니다.</span>
              </li>
              <li>
                  <label for="pass" class="hidden">비밀번호</label>
                  <input type="password" name="pass" id="pass" required placeholder="비밀번호" value="">
              </li>
              <li>
                  <label for="pass_confirm" class="hidden">비밀번호확인</label>
                  <input type="password" name="pass_confirm" id="pass_confirm"  required placeholder="비밀번호 확인" value="">
              </li>
              <li>
                  <?= $row[name] ?> <span>* 세스코 멤버쉽 회원 이름입니다.</span>
              </li>
              <li>
                  <label for="nick" class="hidden">닉네임</label>
                  <input type="text" name="nick" id="nick"  required placeholder="닉네임" value="<?= $row[nick] ?>">
                  <span id="loadtext2"></span><!--중복검사 메세지-->
              </li>
              <li>
                  <label class="hidden" for="hp1" class="hidden">전화번호앞3자리</label>
                  <select class="hp" name="hp1" id="hp1"> 
                       <option value='010'>010</option>
                       <option value='011'>011</option>
                       <option value='016'>016</option>
                       <option value='017'>017</option>
                       <option value='018'>018</option>
                       <option value='019'>019</option>
                  </select>
                  <label class="hidden" for="hp2" class="hidden">전화번호중간4자리</label>
                  <input type="text" class="hp" name="hp2" id="hp2"  required value="<?= $hp2 ?>">
                  <label class="hidden" for="hp3">전화번호끝4자리</label>
                  <input type="text" class="hp" name="hp3" id="hp3"  required value="<?= $hp3 ?>">
              </li>
              <li>
                   <label class="hidden" for="email1" class="hidden">이메일아이디</label>
                   <input type="text" id="email1" name="email1"  required value="<?= $email1 ?>"> @ 
                   <label class="hidden" for="email2" class="hidden">이메일주소</label>
                   <input type="text" name="email2" id="email2"  required value="<?= $email2 ?>">
              </li>
              <li>
                 <a href="#" onclick="check_input()">수정하기</a>&nbsp;&nbsp;
				 <a href="#" onclick="reset_form()">다시쓰기</a>
              </li>
          </ul>
        </form>
    </article>
</body>
</html>


