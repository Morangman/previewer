<?php

require_once './core/mysql_conn.php';

session_start();

$error = null;
$url = 'https://ru.wikipedia.org/';
// $url = '';

if (!empty($_POST['url']))
{
    // mysql connection
    $conn = connect();
    
    $table = "users";
    
    $url = $_POST['url'];
    
    MYSQLI_CLOSE($conn);
}

?>

<html> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sreenshoot Builder</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        div {
            overflow: hidden;
        }

        iframe {
            transform: scale(0.219);
            -webkit-transform: scale(0.219);
            -o-transform: scale(0.219);
            -ms-transform: scale(0.219);
            -moz-transform: scale(0.219);
            transform-origin: top left;
            -webkit-transform-origin: top left;
            -o-transform-origin: top left;
            -ms-transform-origin: top left;
            -moz-transform-origin: top left;
            margin: 0;
            padding: 0;
            position: relative;
            background-color: #fff;
            overflow: hidden;
            pointer-events: none;
        }

        #preview {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 350px;
            margin-bottom: 350px;
            width: 1248px;
        }

        .result_item {
            position: absolute;
        }

        .comp {
            z-index: 1;
            background-image: url(./src/comp.png);
            background-repeat: no-repeat;
            background-size: 566px 538px;
            width: 566px;
            height: 538px;
        }

        .tablet {
            z-index: 2;
            left: 113px;
            background-image: url(./src/tablet.png);
            background-repeat: no-repeat;
            background-size: 246px 400px;
            width: 246px;
            height: 400px;
        }

        .iphone {
            z-index: 3;
            left: 322px;
            bottom: -206px;
            background-image: url(./src/iphone.png);
            background-repeat: no-repeat;
            background-size: 95px 196px;
            width: 95px;
            height: 196px;
        }

        .macbook {
            z-index: 4;
            right: 20;
            bottom: -222px;
            background-image: url(./src/macbook.png);
            background-repeat: no-repeat;
            background-size: 477px 307px;
            width: 477px;
            height: 307px;
        }

        #tablet_frame {
            width: 867px;
            height: 1460px;
            overflow-y: hidden;
            top: 41px;
            left: 29px;
        }

        #iphone_frame {
            width: 388px;
            height: 694px;
            overflow-y: hidden;
            top: 22px;
            left: 5px;
        }

        #comp_frame {
            width: 2162px;
            height: 1423px;
            overflow-y: hidden;
            top: 29px;
            left: 45px;
        }

        #macbook_frame {
            width: 1630px;
            height: 1105px;
            overflow-y: hidden;
            top: 15px;
            left: 60px;
        }

        .result_cover {
            position: absolute;
            width: 100%;
            height: auto;
            border: 1px dashed;
        }
    </style>
</head>
<body>

<!-- header -->
<?php include_once('./header.php'); ?>

<img id="result_screen" src="" alt="" />

<div class="container col-md-12">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
        <h1 class="display-4 text-center">Скриншот сайта для портфолио</h1>
        <div class="container col-md-5">
            <form action="" method="POST">
                <div class="form-outline mb-2">
                    <input type="text" placeholder="Ссылка на сайт*" name="url" id="form2Example1" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-1 col-md-12">GO</button>
            </form>
        </div>
    </div>
</div>

<section id="preview" class="container">
    <div class="tablet result_item">
        <iframe id="tablet_frame" referrerpolicy="no-referrer" width="200" src="<?php echo $url; ?>"></iframe>
    </div>
    <div class="iphone result_item">
        <iframe id="iphone_frame" referrerpolicy="no-referrer" width="200" src="<?php echo $url; ?>"></iframe>
    </div>
    <div class="comp result_item">
        <iframe id="comp_frame" referrerpolicy="no-referrer" width="200" src="<?php echo $url; ?>"></iframe>
    </div>
    <div class="macbook result_item">
        <iframe id="macbook_frame" referrerpolicy="no-referrer" width="200" src="<?php echo $url; ?>"></iframe>
    </div>
    <canvas class="result_cover"></canvas>
</section>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        var a = 3;

        $('.comp,.macbook,.tablet,.iphone').draggable({
            start: function(event, ui) { $(this).css("z-index", a++); }
        });

        $('#preview div').click(function() {
            $(this).addClass('top').removeClass('bottom');
            $(this).siblings().removeClass('top').addClass('bottom');
            $(this).css("z-index", a++);

        });
    });
</script>
</body> 
</html>