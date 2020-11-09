<meta charset="utf-8">
<?
    @extract($_GET);
    @extract($_POST);
    @extract($_SESSION);

//echo "$passchangeId $newPass $newPass_confirm"

if($newPass!=$newPass_confirm){
   echo("
           <script>
             window.alert('비밀번호가 일치하지 않습니다.');
             history.go(-1);
           </script>
         ");
         exit;
}else{
    
    include "../lib/dbconn.php";

    $sql = "update member set pass=password('$newPass') where id='$passchangeId'";
    $result = mysql_query($sql,$connect);
    
    echo("
           <script>
             window.alert('비밀번호가 변경되었습니다.');
             history.go(-1);
           </script>
         ");
         exit;
         
}   

mysql_close();
?>