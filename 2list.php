<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
        <script language="javascript" src="2ajax.js" ></script>
        <style type="text/css">
            #loadding {color:red; font-size: 20px; font-weight: bold; text-align: center}
            .item {height: 500px; border: solid 2px blue; background: #CCCCCC;
                  line-height: 500px; color: blue; text-align: center; font-weight: bold; margin: 20px 0px;}
            .hidden {display: none}
        </style>
    </head>
    <body>
        <div id="content">
            <?php require('2data.php'); ?>
        </div>
        <div id="loadding" class="hidden">
            LOADDING ...
        </div>
    </body>
</html>