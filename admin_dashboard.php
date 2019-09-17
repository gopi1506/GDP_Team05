<html>
    <head>
    <title>Admin Dashboard</title>
    <style>
        body{
                margin:0px;
                padding:0px;
            }
            .header{
                width:100%;
                height:10%;
                background:#b3b3b3;
            }
            .name{
                margin:0px;
                padding:20px 20px;
                color:#000000;
                float:left;
            }
            .body{
                width:100%;
                height:80%;
            }
            .body_main{
                width:100%;
                height:80%;
                background:#4d4d4d;
                margin:0px auto;
            }
            .tab_bar{
                width:100%;
                height:10%;
                padding-bottom:5px;
            }
            .tab_name{
                width:25%;
                height:100%;
                color:#000000;
                float:left;
                text-align:center;
                margin:0px;
                padding-top:10px;
                }
            .tab_name:hover{
                background:#cccccc;
                transition:1s ease;
            }
            .active{
                background:#cccccc;
            }
    </style>
    </head>
    <body>
        <div class='header'>
            <h2 class='name'>CODEWORD</h2>
            <a href='logout.php' style='text-decoration:none;'><h2 class ='name' style='float:right;color:#00000;'>Logout</h2></a>
        </div>
        <div class='body'>
            <h1 style='color:#00000;padding-left:530px; '>Admin Dashboard</h1>
            <div class='body_main'>
                <div class='tab_bar'>
                    <a href='#' style='text-decoration:none;'><h3 class='tab_name active'>Instructor Requests</h3></a>
                    <a href='#' style='text-decoration:none;'><h3 class='tab_name active'>Managa Profiles</h3></a>
                </div>
                <div class='card_view_bar'>
                </div>
                <center>

                </center>
            </div>
        </div>
    </body>
</html>