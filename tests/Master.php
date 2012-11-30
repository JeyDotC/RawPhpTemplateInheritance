<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            <?php ui_block("title") ?>
            Default Title
            <?php ui_block() ?>
        </title>
        <style type="text/css">
            #body{
                border: 2px darkgray dashed;
                padding: 2px 8px;
            }
        </style>
    </head>
    <body>
        <h1>
            <?php ui_block("heading") ?>
            Default Heading
            <?php ui_block() ?>
        </h1>
        <div id="body">
            <?php ui_block("body") ?>
            Da body
            <?php ui_block() ?>
            
            <?php $this->newVar = "Box with lemons."; ?>
            <?php ui_include("tests/neighbor.php") ?>
        </div>
        <div id="foot">
            <?php ui_block("foot") ?>
            Da foot
            <?php ui_block() ?>
        </div>
    </body>
</html>
