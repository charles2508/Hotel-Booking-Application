<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "Description" content ="Indulgent Luxury Hotel"/>
    <meta name = "keyword" content="Hotel, Booking, Vietnam"/>
    <meta name = "author" content ="Vu Thien Tri Phan"/>
    <title>Hotel Infomation</title>
    <link rel="stylesheet" href = "styles/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 1024px)" />
    <script src="scripts/part2.js"></script>
</head>
<body>
    <div class="all_but_footer">
        <?php
            include("header.inc");
        ?>
        <?php
            include("menu.inc");
        ?>
        <section id="productimg">
            <h1 id="hotelname">INDULGENT LUXURY HOTEL</h1>
            <p class="paradise">Since 1983</p>
            <p class="paradise">Enjoy paradise</p>
        </section>
        <section id="history">
            <h2>Description about the hotel</h2>
            <p>Established since 1983, Indulgent Luxury has been recognized as one of the most well-known hotels all over the World.</p>
            <p>Sitting on the high cliffs of the North Central Coast, Indulgent Luxury offers a breathtaking view over Ba Na hill<br/> as well as South China Sea, with an emphasis on elegant luxury and first-rate food.</p>
            <p>An airy refuge, our boutique 42-room hotel is a place where guests can rediscover the forgotten rhythms of long, drawn-out days and easy, lingering evenings. </p>
            <p>Our hotel serves as a sanctuary, bearing a fresh, pared-back aesthetic and a white-on-white palette that<br/> accentuates both the sea and sky blues outside and the contemporary artworks on display inside.</p>
            <a href ="https://www.casangelina.com/en/" ><strong>Casangelina magazine</strong></a>
        </section>
        <aside>
            <h3>Significant traits of Ba Na Hills</h3>
            <p>Located 25 km to the West of Da Nang City, the Ba Na Hills tourism centre and resorts is considered an excellent tourism spot that is a venue of historical values, natural landscapes and high-quality services.</p>
            <p>The most marvellous thing in there is the Ba Na Hills’ slings which has made 4 Guiness Records.Accordingly, records made by Ba Na Hills’ slings includes the longest one-wire sling with a the length of 5,777.61m; the longest distance between each station of 1,368.93m; the longest unpatched wire in the world of 11,587m; and finally the heaviest cable roll in the world of 141.24 tons.</p>
            <a href="https://www.vietnamonline.com/news/ba-na-hills-cable-car-made-4-guinness-records.html#:~:text=Accordingly%2C%20records%20made%20by%20Ba,the%20world%20of%20141.24%20tons."><strong>Ba Na Hills magazine</strong></a>
        </aside>
        <article id="Range">
            <h2 id="Rooms">Rooms and<br/>Suites</h2>
            <ol>
                <li>
                    <h3 class="type">Classic Room</h3>
                    <figure class="Images">
                        <img class="image" src="images/classic-room.jpg" alt="Classic room"/>
                    </figure>
                    <p class="describe">From the cool tones and clean lines to the inviting balcony, our Classic rooms are a picture of contemporary comfort that connect with the bright Vietnamese sunshine.</p>
                </li>
                <li>
                    <h3 class="type">Grand Room</h3>
                    <figure class="Images">
                        <img class="image" src="images/Grand_room.jpg" alt="Grand room"/>
                    </figure>
                    <p class="describe">Our corner, light-filled Premium rooms feature two large balconies overlooking Ba Na Hills, and one of the most stunning views in Da Nang.</p>
                </li>
                <li>
                    <h3 class="type">Deluxe Room</h3>
                    <figure class="Images">
                        <img class="image" src="images/deluxe.jpg" alt="Deluxe room"/>
                    </figure>
                    <p class="describe">Deluxe room at hotel enjoys wide, unobstructed views of Vietnam’s magical coast. Perfect for watching the areas spectacular sunsets.</p>
                </li>
                <li>
                    <h3 class="type">Master Room</h3>
                    <figure class="Images">
                        <img class="image" src="images/master.jpg" alt="Master room"/>
                    </figure>
                    <p class="describe">This is the most fabulous type of room in hotel. Spectacular vistas of the South China Sea from your private balcony are the hallmark of our luxury Master rooms.</p>
                </li>
            </ol>
            <a id="url" href="https://www.adriaticluxuryhotels.com/hotel-kompas-dubrovnik/"><strong>Room's content from Adriatic Luxury hotel </strong></a>
            <section>
                <h2 id="optional_features">Optional Features</h2>
                <ul id="feature">
                    <li>In-room Wifi</li>
                    <li>4K TV screens</li>
                    <li>Bluetooth furniture</li>
                    <li>Visual concierge</li>
                    <li>Inductive charging</li>
                    <li>24-hour fitness center</li>
                    <li>Free champagne</li>
                </ul>
            </section>
            <table id="attributes">
                <caption>Traits of rooms type</caption>
                <thead id="thead">
                    <tr>
                        <th rowspan="2" scope="col">Attributes</th>
                        <th colspan="4" scope="col">Room Type</th>
                    </tr>
                    <tr>
                        <th>Classic</th>
                        <th>Grand</th>
                        <th>Deluxe</th>
                        <th>Master</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr>
                        <td>Sea View</td>
                        <td>&#9746;</td>
                        <td>Depends</td>
                        <td>&#9745;</td>
                        <td>&#9745;</td>
                    </tr>
                    <tr>
                        <td>Number of beds</td>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Bed's size</td>
                        <td>Twin</td>
                        <td>Twin XL</td>
                        <td>Queen</td>
                        <td>King</td>
                    </tr>
                    <tr>
                        <td>Area</td>
                        <td>100 m&#xb2;</td>
                        <td>150 m&#xb2;</td>
                        <td>180 m&#xb2;</td>
                        <td>200 m&#xb2;</td>
                    </tr>
                    <tr>
                        <td>Price<br/>(Per night)</td>
                        <td>100AUD</td>
                        <td>150AUD</td>
                        <td>190AUD</td>
                        <td>250AUD</td>
                    </tr>
                </tbody>
            </table>
            <hr id="break"/>
        </article>
    </div>
    <?php 
        include("footer.inc");
    ?>
</body>
</html> 