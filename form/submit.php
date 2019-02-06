<?php
require("C:/OSPanel/domains/project/db/config.php");
if (!empty($_POST[name]) and !empty($_POST[adress]) and !empty($_POST[count])){
    $letter='Data: ';
    $letter.='<br>Name: '.$_POST[name].'<br>Adress: '.$_POST[adress].'<br>Count: '.$_POST[count];
    if (mail(EMAIL, 'order of book',$letter)){
        echo"all ok<br>".$letter;
        //echo $letter;
    } else{
        echo "thms wrong";
    };

}
else{
    echo "enter all";
}
?>