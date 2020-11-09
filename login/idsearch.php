<meta charset="utf-8">
 <?
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION);
   //$searchName='';
  //echo "$searchName $hp  $searchPhone1  $searchPhone2 ";


$searchPhone=$hp."-".$searchPhone1."-".$searchPhone2;

include "../lib/dbconn.php";

$sql = "select * from member where name='$searchName' and hp='$searchPhone' and email='$searchMail'";
$result = mysql_query($sql, $connect);
$num = mysql_num_rows($result);


if(!$num){
    echo "등록되지 않은 사용자입니다.
          <a href='../member/join.html' class='go_join'>회원가입</a>
    ";
}else{    
  
    $row = mysql_fetch_array($result);
   
    $searchid=$row[id];
    $searchname=$row[name];
    $searchnick=$row[nick];
    $searchmail=$row[email];
    $searchhp=$row[hp];
    $searchday=$row[regist_day];
    
     echo "
       
     <ul>
            <li>아이디 : $searchid</li>
            <li>이름 : $searchname</li>
            <li>이메일 : $searchmail</li>
            <li>닉네임 : $searchnick</li>
            <li>가입일시 : $searchday</li>
     </ul>
     
     ";

}

mysql_close();

?>
