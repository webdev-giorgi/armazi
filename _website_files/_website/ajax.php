<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

$out = array(
    "Error" => array(
        "Code"=>1, 
        "Text"=>"მოხდა შეცდომა !",
        "Details"=>"!"
    )
);

$type = (isset($_POST['type']) && !empty($_POST['type'])) ? $_POST['type'] : "";

switch($type){
    case "askCall":
        if(
            !isset($_SESSION["designToken"]) ||
            !isset($_POST["token"]) || 
            $_POST["token"]!=$_SESSION["designToken"] || 
            (!isset($_POST["callType"]) || $_POST["callType"]=="") || 
            (!isset($_POST["firstname"]) || $_POST["firstname"]=="") || 
            (!isset($_POST["email"]) || $_POST["email"]=="") || 
            (!isset($_POST["phone"]) || $_POST["phone"]=="") 
        ){
            $out = array(
                "Error" => array(
                    "Code"=>1, 
                    "Text"=>l('allfieldsrequired'),
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>0, 
                    "Text"=>""
                )
            );
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $out = array(
                "Error" => array(
                    "Code"=>1, 
                    "Text"=>l('emailformaterror'),
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>0, 
                    "Text"=>""
                )
            );
        }else{
            $callType = (isset($_POST['callType']) && !empty($_POST['callType'])) ? $_POST['callType'] : "";
            $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? $_POST['firstname'] : "";
            $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : "";
            $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : "";
            
            $body = "<h2>".l('ask.call')."</h2><br />";
            $body .= "<b>IP: </b>". $_SERVER["REMOTE_ADDR"] ."<br />";
            $body .= "<b>Type: </b>". replaceInputs($callType) ."<br />";
            $body .= "<b>Firstname: </b>". replaceInputs($firstname) ."<br />";
            $body .= "<b>Email: </b>". replaceInputs($email) ."<br />";
            $body .= "<b>Phone: </b>". replaceInputs($phone);

            $to = s('ask.call.reciever');
            $subject = l('ask.call');
            
            $headers = "From: noreply@designbatumi.ge\r\n";
            $headers .= "Reply-To: noreply@designbatumi.ge\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            @mail($to, $subject, $body, $headers);

            $out = array(
                "Error" => array(
                    "Code"=>0, 
                    "Text"=>"",
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>1, 
                    "mailed"=>true,
                    "Text"=>l('welldone')
                )
            );
        }
        break;
    case "calculate":
        if(
            !isset($_SESSION["designToken"]) ||
            !isset($_POST["token"]) || 
            $_POST["token"]!=$_SESSION["designToken"] || 
            (!isset($_POST["objectType"]) || $_POST["objectType"]=="") || 
            (!isset($_POST["condition"]) || $_POST["condition"]=="") || 
            (!isset($_POST["size"]) || $_POST["size"]=="") || 
            (!isset($_POST["phone"]) || $_POST["phone"]=="") 
        ){
            $out = array(
                "Error" => array(
                    "Code"=>1, 
                    "Text"=>l('allfieldsrequired'),
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>0, 
                    "Text"=>""
                )
            );
        }else{
            $objectType = (isset($_POST['objectType']) && !empty($_POST['objectType'])) ? $_POST['objectType'] : "";
            $condition = (isset($_POST['condition']) && !empty($_POST['condition'])) ? $_POST['condition'] : "";
            $size = (isset($_POST['size']) && !empty($_POST['size'])) ? $_POST['size'] : "";
            $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : "";
            
            $body = "<h2>".l('calculate.popup.button')."</h2><br />";
            $body .= "<b>IP: </b>". $_SERVER["REMOTE_ADDR"] ."<br />";

            if(replaceInputs($objectType)==1){
                $body .= "<b>Object Type: </b>". l('hotel') ."<br />";    
            }else if(replaceInputs($objectType)==2){
                $body .= "<b>Object Type: </b>". l('apartment') ."<br />";    
            }else if(replaceInputs($objectType)==3){
                $body .= "<b>Object Type: </b>". l('commercial.object') ."<br />";    
            }else if(replaceInputs($objectType)==4){
                $body .= "<b>Object Type: </b>". l('office') ."<br />";    
            }

            if(replaceInputs($condition)==1){
                $body .= "<b>Condition: </b>". l('black.frame1') ."<br />";    
            }else if(replaceInputs($condition)==2){
                $body .= "<b>Condition: </b>". l('white.frame1') ."<br />";    
            }else if(replaceInputs($condition)==3){
                $body .= "<b>Condition: </b>". l('old.repair1') ."<br />";    
            }            
            
            $body .= "<b>Size: </b>". replaceInputs($size) ."<br />";
            $body .= "<b>Phone: </b>". replaceInputs($phone);

            $to = s('ask.call.reciever');
            $subject = l('calculate.popup.button');
            
            $headers = "From: noreply@designbatumi.ge\r\n";
            $headers .= "Reply-To: noreply@designbatumi.ge\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            @mail($to, $subject, $body, $headers);

            $out = array(
                "Error" => array(
                    "Code"=>0, 
                    "Text"=>"",
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>1, 
                    "mailed"=>true,
                    "Text"=>l('welldone')
                )
            );
        }
        break;
    case "gift":
        if(
            !isset($_SESSION["designToken"]) ||
            !isset($_POST["token"]) || 
            $_POST["token"]!=$_SESSION["designToken"] || 
            (!isset($_POST["firstname"]) || $_POST["firstname"]=="") || 
            (!isset($_POST["phone"]) || $_POST["phone"]=="") 
        ){
            $out = array(
                "Error" => array(
                    "Code"=>1, 
                    "Text"=>l('allfieldsrequired'),
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>0, 
                    "Text"=>""
                )
            );
        }else{
            $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? $_POST['firstname'] : "";
            $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : "";
            
            $body = "<h2>".menu_title(28)."</h2><br />";
            $body .= "<b>IP: </b>". $_SERVER["REMOTE_ADDR"] ."<br />";
            
            $body .= "<b>Firstname: </b>". replaceInputs($firstname) ."<br />";
            $body .= "<b>Phone: </b>". replaceInputs($phone);

            $to = s('ask.call.reciever');
            $subject = menu_title(28);
            
            $headers = "From: noreply@designbatumi.ge\r\n";
            $headers .= "Reply-To: noreply@designbatumi.ge\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            @mail($to, $subject, $body, $headers);

            $out = array(
                "Error" => array(
                    "Code"=>0, 
                    "Text"=>"",
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>1, 
                    "mailed"=>true,
                    "Text"=>l('welldone')
                )
            );
        }
        break;    
    case "priceDetect":
        if(
            !isset($_SESSION["designToken"]) ||
            !isset($_POST["token"]) || 
            $_POST["token"]!=$_SESSION["designToken"] || 
            (!isset($_POST["firstname"]) || $_POST["firstname"]=="") || 
            (!isset($_POST["phone"]) || $_POST["phone"]=="") 
        ){
            $out = array(
                "Error" => array(
                    "Code"=>1, 
                    "Text"=>l('allfieldsrequired'),
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>0, 
                    "Text"=>""
                )
            );
        }else{
            $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? $_POST['firstname'] : "";
            $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : "";
            
            $body = "<h2>".menu_title(35)."</h2><br />";
            $body .= "<b>IP: </b>". $_SERVER["REMOTE_ADDR"] ."<br />";
            
            $body .= "<b>Firstname: </b>". replaceInputs($firstname) ."<br />";
            $body .= "<b>Phone: </b>". replaceInputs($phone);

            $to = s('ask.call.reciever');
            $subject = menu_title(35);
            
            $headers = "From: noreply@designbatumi.ge\r\n";
            $headers .= "Reply-To: noreply@designbatumi.ge\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            @mail($to, $subject, $body, $headers);

            $out = array(
                "Error" => array(
                    "Code"=>0, 
                    "Text"=>"",
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>1, 
                    "mailed"=>true,
                    "Text"=>l('welldone')
                )
            );
        }
        break;
}   

echo json_encode($out);