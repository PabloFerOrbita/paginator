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
        var maxPage = 532;
        var itemsPerPage = 7;
        var totalPages = [];
        for (let i = 1; i <= maxPage; i++) {
            let page = document.createElement('a');
            page.href = `?page=${i}`;
            page.title = i;
            page.text = i;
            totalPages.push(page);
        };




        var pages = document.querySelector('.paging-container').querySelectorAll('a');
        addEventListeners(pages);

        function addEventListeners(array) {
            array.forEach(element => element.addEventListener('click', selectPage));



        }


        function selectPage(e) {
            e.preventDefault();

            pages.forEach(element => element.classList.remove('paging-selected'));

            if (e.target.title == '1') {
                document.querySelector('[title = "First"]').classList.add('paging-selected');
            } else if (e.target.title == '532') {
                document.querySelector('[title = "Last"]').classList.add('paging-selected');
                document.querySelector('[title = "..."]').classList.add('paging-selected');
            } else if (e.target.title == 'First') {
                fillCurrentPages(1);
                document.querySelector('[title = "1"]').classList.add('paging-selected');

            } else if (e.target.title == 'Last') {
                fillCurrentPages(maxPage - (itemsPerPage - 1));
                document.querySelector(`[title = "${maxPage}"]`).classList.add('paging-selected');
                document.querySelector('[title = "..."]').classList.add('paging-selected');

            } else if (e.target.title == '...') {
                fillCurrentPages(maxPage - (itemsPerPage - 1));
                document.querySelector(`[title = "${maxPage}"]`).classList.add('paging-selected');
                document.querySelector('[title = "Last"]').classList.add('paging-selected');

            } else if (Array.from(pages).indexOf(e.target) > 4 && pages[7].title != maxPage) {
                fillCurrentPages(parseInt(e.target.title) - 3);
            } else if (Array.from(pages).indexOf(e.target) < 4 && pages[1].title != '1') {
                fillCurrentPages(parseInt(pages[1].title) - (parseInt(pages[4].title) - parseInt(e.target.title)));
            }
            pages.forEach(element => element.title == e.target.title && element.classList.add('paging-selected'));



        }





        function fillCurrentPages(beginning) {
            var index;
            if (beginning < 1) {
                index = 1
            } else if (beginning > maxPage) {
                index = maxPage;
            } else {
                index = beginning - 1;
            }

            var currentPages = [];
            for (let i = 1; i <= itemsPerPage; i++) {
                currentPages.push(totalPages[index]);
                index++
            }
            addEventListeners(currentPages);
            document.querySelectorAll('.paging-container > a:not([title = "First"], [title = "..."], [title = "Last"]').forEach((element, index) => {
                element.remove()
            });
            document.querySelector('[title = "First"]').after(...currentPages);
            pages = document.querySelector('.paging-container').querySelectorAll('a');






        }
    </script>
</body>

</html>