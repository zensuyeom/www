<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="css/member_form.css">
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	
	<script>
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시
    var id = $('#id').val(); //aaa

    $.ajax({
        type: "POST",
        url: "check_id.php",
        data: "id="+ id,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext").html(data);
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
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
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

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

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
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
<script>
    function onlyEng() {
   var inText = document.member_form.id.value; 
   var ret;
    
   for (var i = 0; i < inText.length; i++) {
       ret = inText.charCodeAt(i); 
      if ((ret > 122) || (ret < 48) || (ret > 57 && ret < 65) || (ret > 90 && ret < 97)) { 
          alert("영문자와 숫자만을 입력하세요\n\n한글과 특수문자는 안됩니다.");
          document.member_form.id.value = "";
          document.member_form.id.focus();
          return false;
      }
   }
   return true;
}
</script>
</head>
<body>
    <article id="content">  
        <h1><a href="../index.html">회원가입</a></h1>
        <form  name="member_form" method="post" action="insert.php">
          <ul>
              <li>
                  <label for="id" class="hidden">아이디</label>
                  <input type="text" name="id" id="id" required placeholder="아이디를 입력하세요. (영문, 숫자만 사용 가능)" onkeyup="onlyEng(member_form.idname);">
                  <span id="loadtext"></span><!--중복검사 메세지-->
              </li>
              <li>
                  <label for="pass" class="hidden">비밀번호</label>
                  <input type="password" name="pass" id="pass" required placeholder="비밀번호">
              </li>
              <li>
                  <label for="pass_confirm" class="hidden">비밀번호확인</label>
                  <input type="password" name="pass_confirm" id="pass_confirm"  required placeholder="비밀번호 확인">
              </li>
              <li>
                  <label for="name" class="hidden">이름</label>
                  <input type="text" name="name" id="name"  required placeholder="이름"> 
              </li>
              <li>
                  <label for="nick" class="hidden">닉네임</label>
                  <input type="text" name="nick" id="nick"  required placeholder="닉네임">
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
                  <input type="text" class="hp" name="hp2" id="hp2"  required>
                  <label class="hidden" for="hp3">전화번호끝4자리</label>
                  <input type="text" class="hp" name="hp3" id="hp3"  required>
              </li>
              <li>
                   <label class="hidden" for="email1" class="hidden">이메일아이디</label>
                   <input type="text" id="email1" name="email1"  required> @ 
                   <label class="hidden" for="email2" class="hidden">이메일주소</label>
                   <input type="text" name="email2" id="email2"  required>
              </li>
              <li>
                 <a href="#" onclick="check_input()">가입하기</a>&nbsp;&nbsp;
				 <a href="#" onclick="reset_form()">다시쓰기</a>
              </li>
          </ul>
        </form>
    </article>
</body>
</html>


