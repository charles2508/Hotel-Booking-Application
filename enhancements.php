<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name = "Description" content ="Enhancement webpage"/>
        <meta name = "keyword" content="Hotel, Booking, Vietnam,Enhancement"/>
        <meta name = "author" content ="Vu Thien Tri Phan"/>
        <title>Enhancements page</title>
        <link rel="stylesheet" href = "styles/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
        <script src="scripts/part2.js"></script>
    </head>
    <body>
        <div id="pages" class="all_but_footer">
            <?php
                include("header.inc");
            ?>
            <?php
                include("menu.inc");
            ?>
            <section>
                <h1 id="heading">CSS ENHANCEMENTS OF THE WEBSITE</h1>
            <ol id="enhancements">
                <li class="list"> Changing the background image continously
                    <ul class="describe-enhancement">
                        <li>In this enhancement, I used some <strong>animation properties </strong> including <strong>animation-name, animation-duration, animation-fill-mode, animation-direction, animation-iteration-count, animation-play-state, animation-timing-function</strong> in CSS, which I have not learnt in the Lecture before.
                                This enhancement makes the background images change continously although I just need to insert one background image without animation in order to meet the assignment's requirement.</li>
                        <li>In order to use the animation property, I have to use <strong>@keyframes Rule</strong> to make the animation change from the current state to another state. In this code, I named the <strong>@keyframes</strong> as <strong>animate.</strong></li>
                        <li>I have briefly explained the code in <strong>style.css file</strong></li>
                        <li>*** If you are using firefox, it may not change smoothly, so please wait for 10 seconds and then it will change the background image!</li>
                        <li>I have learnt and edited the code base on a video on Youtube:<a href="https://www.youtube.com/watch?v=9U-pv9--Odc"><strong>Change Background Image Continuosly.</strong></a></li>
                        <li>This is the link to where I have applied that enhancement to my website: <a href="product.php#productimg"><strong>Hotel Background Images.</strong></a></li>
                    </ul>
                </li>
                <li class="list"> Flipping an Image with 3D-Effect
                    <ul class="describe-enhancement">
                        <li>In this enhancement, I used <strong>some transformation properties</strong> including <strong>transform-style, transform: rotateY (with degree), transform: perspective(px)</strong> in CSS
                                in order to make the image rotate with 3D transformation although transformation is not required in this assignment.</li>
                        <li>Besides, I also used <strong> backface-visibility</strong> in order to make the back face of the figure invisible when facing the user .</li>
                        <li>I have briefly explained the code, which I have not learnt in Lecture before, in <strong>style.css file</strong></li>
                        <li>I have learnt and edited the code base on the link on w3schools:<a href="https://www.w3schools.com/howto/howto_css_flip_image.asp"><strong> W3S Tutorial Flip An Image</strong></a> and a Youtube video<a href="https://www.youtube.com/watch?v=uR7EbQImYmo"><strong>3D Flip Card Effect</strong></a>.</li>
                        <li>This is the link to where I have applied that enhancement to my website: <a href="about.php#flip_box"><strong>My Picture.</strong></a> (Please hover on the image and keep your cursor at a stable position).</li>
                    </ul>
                </li>
                <li class="list"> Making fluid pages flow when resized by using responsive
                    <ul class="describe-enhancement">
                        <li>Besides those two previous enhancements, I have also made two responsive interfaces with the width between (768px - 1024px) for tablet and (300px - 700px) for mobile. </li>
                        <li>I wrote the code on responsive.css file. I have changed the size and position of some parts of the pages such as menu bar, aside, images, footer, etc in order to blend on well with the screen-size.</li>
                    </ul>
                </li>
            </ol>
            <hr id="break"/>
            </section>
        </div>   
        <?php 
            include("footer.inc");
        ?>
    </body>
</html>
