<?php
if(isset($_GET["getUser"])){
        // ki?m tra d?nh d?ng d? li?u tr? ra là json hay xml          
 $format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml';
 
        //t?o m?ng users d? luu thông tin toàn b? user trong db
        $users = array();
        
        //g?i file k?t n?i db
 require_once("connection.php");
 //truy v?n l?y toàn b? thông tin trong b?ng users
        $sql = "select * from users";
 $query = mysqli_query($conn,$sql);
 while ($user = mysqli_fetch_assoc($query)) {
 $users[] = array('user' => $user);
 }
        // tr? ra d? li?u du?i d?ng json
 if ($format == 'json') {
 header('Content-type: application/json');
 echo json_encode(array('users'=>$users));
 }else{
        // tr? ra d? li?u du?i d?ng xml
 header('Content-type: text/xml');
 echo '<users>';
 foreach($users as $index => $user) {
 if(is_array($user)) {
 foreach($user as $key => $value) {
 echo '<',$key,'>';
 if(is_array($value)) {
 foreach($value as $tag => $val) {
 echo '<',$tag,'>',htmlentities($val),'</',$tag,'>';
 }
 }
 echo '</',$key,'>';
 }
 }
 }
 echo '</users>';
 }
 mysqli_close(1);
}else{
    echo "Không có d? li?u tr? v?";
}