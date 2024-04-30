<?php ?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Paginador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        .nav-review {
            border-bottom: 1px solid #e3e3e3;
            margin-bottom: 14px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between
        }

        .nav-review.nav_review--bottom {
            border-bottom: 0;
            justify-content: end
        }

        #sortingOrder {
            border: none;
            height: 45px
        }

        .paging-container,
        .sortby-container {
            display: flex;
            align-items: center
        }

        .nav-review a {
            display: inline-block;
            padding: 14px 0;
            height: 20px;
            text-align: center;
            border: 1px solid #e3e3e3;
            min-width: 46px;
            height: 47px
        }

        .nav-review a.paging-selected {
            background: #e3e3e3
        }
    </style>
</head>

<body>
    <div class="nav-review">
        <div class="paging-container" data-total-pages="10">
            <a class="paging-selected" href="?page=1" title="First">First</a>
            <a class="paging-selected" href="?page=1" title="1">1</a>
            <a href="?page=2" title="2">2</a>
            <a href="?page=3" title="3">3</a>
            <a href="?page=4" title="4">4</a>
            <a href="?page=5" title="5">5</a>
            <a href="?page=6" title="6">6</a>
            <a href="?page=7" title="7">7</a>
            <a href="?page=532" title="...">...</a>
            <a href="?page=532" title="Last">Last</a>
        </div>
    </div>
    <script type="text/javascript">
        var pages = document.querySelector('.paging-container').querySelectorAll('a');
        pages.forEach(element => element.addEventListener('click', selectPage));

        function selectPage(e) {
            e.preventDefault();
            pages.forEach(element => element.classList.remove('paging-selected'));
            e.target.classList.add('paging-selected');
            if (e.target.title == '1') {
                document.querySelector('[title = "First"]').classList.add('paging-selected');
            } else if (e.target.title == '532'){
                document.querySelector('[title = "Last"]').classList.add('paging-selected');
                document.querySelector('[title = "..."]').classList.add('paging-selected');
            } 
        }
    </script>
</body>

</html>