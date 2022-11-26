<?php
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
require_once("includes/connect.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Макет</title>

    <script src="https://cdn.anychart.com/js/latest/anychart-bundle.min.js"></script>
    <style>
        *{margin:0;}
        #page {
            width: 100%;
        }
        header {
            background-color:#0095B6;
        }
        nav>ul {
            list-style: none;
            padding:5px;
        }
        nav {
            background-color:#dddddd;
            height:1000px;
            width:9%;
            float:left;
            padding:5px;
        }
        section {
            background-color:#eeeeee;
            height:1000px;
            width:72%;
            float:left;
            padding:5px;
        }
        comment {
            background-color: #668cf6;
            height:1000px;
            width:15%;
            float:left;
            padding:5px;
        }
        footer {
            background-color:#0095B6;
            clear:both;
            text-align:center;
            padding:5px;
        }

        .redColor {
            color: red; /* цвет текста красный */
        }
        .displayBlock {
            display: block; /* блочный элемент */
        }
        a {
            display: none; /* элементы  <p> не отображаются*/
        }
    </style>
</head>
<body>

<div id="page">
    <header>
        <h1>Шапка </h1>
    </header>

    <nav>
        <b></b>
        <button>Главное меню</button>
        <a class = "redColor displayBlock"></a>
        <ul>
            <a href="xz1.php">Элемент 1</a>
            <a>Элемент 2</a>
            <a>Элемент 3</a>
            <a>...</a>
        </ul>
    </nav>

    <section>
        <h1>Заголовок</h1>
        <p>Основной контент...</p>


<!--        <p>Перетащите cтикер.</p>-->
<!---->
<!--        <img src="img/board.png" width="1000px" height="500px" id="gate" class="droppable">-->
<!---->
<!--        <img src="img/Yellow-Sticky.png" width="100px" height="100px" id="sticker" >-->

    </section>
    <comment>
        <form action="" method="post">
            <span>Имя: </span><br>
            <input type="text" id="name"><br>
            <span>Комментарий</span><br>
            <textarea id="comment" cols="30" rows="10"></textarea><br>
            <button id="button">Отправить</button>
        </form>
    </comment>

    <footer>
        Copyright © 2022 Hack the ice 4.0
    </footer>
</div>

</body>
<script>
    let currentDroppable = null;

    sticker.onmousedown = function(event) {

        let shiftX = event.clientX - sticker.getBoundingClientRect().left;
        let shiftY = event.clientY - sticker.getBoundingClientRect().top;

        sticker.style.position = 'absolute';
        sticker.style.zIndex = 1000;
        document.body.append(sticker);

        moveAt(event.pageX, event.pageY);

        function moveAt(pageX, pageY) {
            sticker.style.left = pageX - shiftX + 'px';
            sticker.style.top = pageY - shiftY + 'px';
        }

        function onMouseMove(event) {
            moveAt(event.pageX, event.pageY);

            sticker.hidden = true;
            let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
            sticker.hidden = false;

            if (!elemBelow) return;

            let droppableBelow = elemBelow.closest('.droppable');
            if (currentDroppable != droppableBelow) {
                if (currentDroppable) { // null если мы были не над droppable до этого события
                    // (например, над пустым пространством)
                    leaveDroppable(currentDroppable);
                }
                currentDroppable = droppableBelow;
                if (currentDroppable) { // null если мы не над droppable сейчас, во время этого события
                    // (например, только что покинули droppable)
                    enterDroppable(currentDroppable);
                }
            }
        }

        document.addEventListener('mousemove', onMouseMove);

        sticker.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMove);
            sticker.onmouseup = null;
        };

    };

    function enterDroppable(elem) {
        elem.style.background = 'pink';
    }

    function leaveDroppable(elem) {
        elem.style.background = '';
    }

    sticker.ondragstart = function() {
        return false;
    };
</script>

<script>

</script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $( document ).ready(function(){
        $("button").click(function(){ // задаем функцию при нажатиии на элемент <button>
            $("a").toggleClass('redColor displayBlock'); // удаляем, или добавляем элементу <p> два класса
        });
    });
</script>
<script>

</script>
</html>
