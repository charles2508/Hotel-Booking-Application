<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="About me"/>
    <meta name = "keyword" content="Info,Student,Vu Thien Tri Phan"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>About me</title>
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
        <h1 id="heading">PERSONAL INFOMATION</h1>
        <div id="responsive"> <!--This id is only used for responsive purpose with max-width of 700px-->
            <article class="detail">
                <h2>Student's details</h2>
                <dl>
                    <dt>Name</dt>
                    <dd>Vu Thien Tri Phan</dd>
                    <dt>Student ID</dt>
                    <dd>s103167199</dd>
                    <dt>Course</dt>
                    <dd>Bachelor of Computer Science</dd>
                    <dt>Email</dt>
                    <dd><a href ="mailto:103167199@student.swin.edu.au">103167199@student.swin.edu.au</a></dd>
                </dl>
            </article>
            <figure id="flip_box">
                <div id="flip_box_inner">
                    <div id="flip_front">
                        <img src="images/mypic.jpg" alt="My Photo" id="picture" />
                    </div>
                    <div id="flip_back">
                        <img src="images/mypic2.jpg" alt="My Photo" id="picture2"/>
                        
                    </div>
                </div>
            </figure>
        </div>
        <table id="timetable">
            <caption>Timetable</caption>
            <thead>
                <tr>
                    <th class="time" rowspan="2" scope="col">Time</th>
                    <th class="time" colspan="6" scope="col">Day of Week</th>
                </tr>
                <tr>
                    <td class="time">Monday</td>
                    <td class="time" >Tuesday</td>
                    <td class="time">Wednesday</td>
                    <td class="time">Thursday</td>
                    <td class="time">Friday</td>
                    <td class="time">Saturday</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="time" rowspan="2">10</td>
                    <td></td>
                    <td class="cos10009"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="cos10009">COS10009</td>
                    <td></td>
                    <td></td>
                    <td class="cos10009"></td>
                    <td></td>
                </tr> <!--1-->
                <tr>
                    <td class="time" rowspan="2">11</td>
                    <td></td>
                    <td class="cos10009">Live Online 1 (1)</td>
                    <td></td>
                    <td></td>
                    <td class="cos10009">COS10009</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="cos10011"></td>
                    <td class="cos10009_last"></td>
                    <td></td>
                    <td></td>
                    <td class="cos10009">Workshop 2 (10)</td>
                    <td class="tne10005"></td>
                </tr> <!--2-->
                <tr>
                    <td class="time" rowspan="2">12pm</td>
                    <td class="cos10011">COS100011</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="cos10009_last"></td>
                    <td class="tne10005">TNE10005</td>
                </tr>
                <tr>
                    <td class="cos10011">Live Online 1 (1)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tne10005">Practical 1 (14)</td>
                </tr> <!--3-->
                <tr>
                    <td class="time" rowspan="2">1</td>
                    <td class="cos10011_last"> </td>
                    <td></td>
                    <td class="cos10003"></td>
                    <td></td>
                    <td></td>
                    <td class="tne10005">Hawthorn Online</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="cos10011">COS10011</td>
                    <td class="cos10003">COS10003</td>
                    <td></td>
                    <td></td>
                    <td class="tne10005"></td>
                </tr> <!--4-->
                <tr>
                    <td class="time" rowspan="2">2</td>
                    <td> </td>
                    <td class="cos10011_last">Lab 1 (4)</td>
                    <td class="cos10003">Live Online 1 (1)</td>
                    <td></td>
                    <td></td>
                    <td class="tne10005_last"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="cos10003"></td>
                    <td class="cos10003_last"></td>
                    <td class="cos10009"></td>
                    <td></td>
                    <td></td>
                </tr> <!--5-->
                <tr>
                    <td class="time" rowspan="2">3</td>
                    <td></td>
                    <td class="cos10003">COS10003</td>
                    <td></td>
                    <td class="cos10009">COS10009</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="cos10003">Tutorial 1 (41)</td>
                    <td></td>
                    <td class="cos10009">Lab 2 (10)</td>
                    <td></td>
                    <td></td>
                </tr> <!--6-->
                <tr>
                    <td class="time" rowspan="2">4</td>
                    <td></td>
                    <td class="cos10003_last"></td>
                    <td></td>
                    <td class="cos10009_last"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tne10005"></td>
                    <td></td>
                    <td></td>
                </tr> <!--7-->
                <tr>
                    <td class="time" rowspan="2">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tne10005">TNE10005</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tne10005">Live Online 1 (1)</td>
                    <td></td>
                    <td></td>
                </tr> <!--8-->
                <tr>
                    <td class="time" rowspan="2">6</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tne10005_last"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> <!--9-->
            </tbody>
        </table>
        <section>
            <h2 id="mybackground">BACKGROUND</h2>
            <ul id="ul">
                <li>Age: 19</li>
                <li>Hometown: Ho Chi Minh City, Vietnam</li>
                <li>Favorite sports:
                    <ul>
                        <li>Soccer</li>
                        <li>Basketball</li>
                        <li>Badminton</li>
                    </ul>
                </li>
                <li>Hobbies:
                    <ul>
                        <li>Watching TV</li>
                        <li>Playing video games</li>
                        <li>Hanging out with buddies</li>
                        <li>Drink Coffee</li>
                    </ul>
                </li>
            </ul>
        </section>
        <hr id="break"/>
    </section>
</div>
    <?php 
        include("footer.inc");
    ?>
</body>
</html>    