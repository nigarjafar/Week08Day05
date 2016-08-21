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
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php
                echo date('d-M-y G:i:s');
                ?>
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="title">Qeydiyyat</h3>
                    <form method="post" action="upload_run.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Adı">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="place" placeholder="Yer adı">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="img">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default pull-right" type="submit" value="Yukle" name="upload">
                        </div>
                    </form>
                </div>
                <?php
                //Creating array for each image
                $uploaded= fopen("uploaded.txt", "r+") or die("Unable to open");
                    $uploadFile=fread($uploaded ,filesize("uploaded.txt") );
                fclose($uploaded);

                $list=explode("###", "$uploadFile");
                    foreach($list as $key=>$value){
                    $list[$key]=explode('|', $value);
                }
                ?>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Yükləyən</th>
                                    <th>Yer</th>
                                    <th>Şəkil</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                    <?php foreach($list as $key=>$value){
                                    if($value!=end($list)){
                                    ?>
                                    <tr>
                                    <td><?=$value[0]?></td>
                                    <td><?=$value[1]?></td>
                                    <td>
                                        <img width="128" src="<?=$value[2]?>" class="img-responsive">
                                    </td>
                                    </tr>
                                    <?php }} ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
