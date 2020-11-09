<meta charset="utf-8">
<?
    @extract($_GET);
    @extract($_POST);
    @extract($_SESSION);

$passPhone=$passhp."-".$passPhone1."-".$passPhone2;

include "../lib/dbconn.php";

$sql = "select * from member where id='$passId' and name='$passName' and hp='$passPhone' and email='$passMail'";
$result = mysql_query($sql,$connect);
$num = mysql_num_rows($result);

if(!num){
     echo "등록되지 않은 사용자입니다.
          <a href='../member/join.html' class='go_join'>회원가입</a>
    ";
}else{
    echo "
    <p>새로운 비밀번호를 설정해주세요.</p>
    <form name='passchange_form' method='post' action='passchange.php'>
        <ul>
            <li>
                <label for='passchangeId' class='hidden'>아이디</label>
                <input type='text' name='passchangeId' id='passchangeId' value='$passId' class='hidden'>
            </li>
            <li>
               <label for='newPass'>새비밀번호</label>
               <input type='password' name='newPass' id='newPass' placeholder='새로운 비밀번호를 입력해주세요.'> 
            </li>
            <li>
               <label for='newPass_confirm'>새비밀번호 확인</label>
               <input type='password' name='newPass_confirm' id='newPass_confirm' placeholder='비밀번호를 다시 입력해주세요.'>
            </li>
            <li>
                <button type='submit'>변경하기</button>
            </li>
        </ul>
    </form>
    
    
    ";
}

mysql_close();
?>