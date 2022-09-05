<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name = "Description" content ="Home page"/>
        <meta name = "keyword" content="Hotel, Booking, Index, Vietnam"/>
        <meta name = "author" content ="Vu Thien Tri Phan"/>
        <title>Hotel Main Page</title>
        <link rel="stylesheet" href = "styles/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
        <script src="scripts/part2.js"></script>
    </head>
    <body id="background">
        <div class="all_but_footer">
            <?php
                include("header.inc");
            ?>
            <?php
                include("menu.inc");
            ?>
            <section>
                <h1 id="hotel">INDULGENT LUXURY HOTEL</h1>
            </section>
        </div>   
        <?php 
            include("footer.inc");
        ?>
    </body>
</html>