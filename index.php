<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
     /*   $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
        $list = [];

        while (!feof($myfile)) {
            array_push($list, fgets($myfile));
        }
        
        fclose($myfile);


        print_r('<pre>');
        print_r($list);
        print_r('</pre>');*/
        
      /*  $myfile = fopen("webdictionary.txt", "a") or die("Unable to open file!");
        $txt = "John Doe\n";
        fwrite($myfile, $txt);
        $txt = "Jane Doe\n";
        fwrite($myfile, $txt);
        fclose($myfile);*/

        $userf = fopen('users.txt', 'a+') or die("Unable to open file!");
        $users = fread($userf, filesize('mail.txt'));
        fclose($userf);
        echo $users;
        $list = [];
        $list = explode("@@@##@@@", $users);
        foreach ($list as $key => $value) {
            $list[$key] = explode('|', $value);
        }
        print_r('<pre>');
        print_r($list);
        print_r('</pre>');



        $mailf = fopen('mail.txt', 'r')or die("Unable to open file!");

        $mail = fread($mailf, filesize('mail.txt'));

        fclose($mailf);

        $maillist = [];
        foreach ($list as $key => $value) {
            $text = $mail;
            $text = str_replace('#name#', $value[1], $text);
            $text = str_replace('#surname#', $value[2], $text);
            $text = str_replace('#username#', $value[3], $text);
            $text = str_replace('#link#', '<a href="saytadi.az/useracitve.php?id=' . $value[0] . '">Active</a>', $text);
            $maillist[] = $text;
        }
        print_r('<pre>');
        print_r($maillist);
        print_r('</pre>');
        
//        var_dump(is_file('mail.txt')); 
//        echo basename('css/img/file.txt');
        ?>
    </body>
</html>
