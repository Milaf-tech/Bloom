<?php $page = "restaurant"; include("include/header.php"); ?>
<?php require_once("include/db_conn.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php
if (isset($_GET['cat'])) {
  $category_id = $_GET['cat'];
} else {
  $category_id = 0;
}

if (isset($_GET['search'])) {
  $name = $_GET['search'];
  $items = getSearchItems($name);
} else {
  $items = getAllItems();
}
echo $category_id;
?>



    <section class="page-header" id="home">
      <div class="opacity"></div>
      <div class="content">
        <div class="text">
          <h1><br><span>RESTAURANTS</span></h1>
        </div>
      </div>
    </section>


    <section class="restaurant" id="restaurants]">


      <div class="restaurant-margin">

        <h1>HEALTHY FOOD</h1>
        <hr />

        <ul class="grid">
          <li>
            <a href="restaurant-info.html?id=1">
              <img src="img/restaurant/th.jpg" alt="Saldwich" />
              <div class="text">
                <p>Saldwich</p>
              </div>
            </a>
          </li>
          <li>
            <a href="restaurant-info.html?id=2">
              <img src="img\restaurant\earth.jpg" alt="EarthBowlz" />
              <div class="text">
                <p>EarthBowlz</p>
              </div>
            </a>
          </li>
          <li>
            <a href="restaurant-info.html?id=3">
              <img src="img\restaurant\health.jpg" alt="HEALTHY & TASTY" />
              <div class="text">
                <p>HEALTHY & TASTY</p>
              </div>
            </a>
          </li>
        </ul>

        <h1>INTERNATIONAL RESTURANTS</h1>
        <hr />

        <ul class="grid">
          <li>
            <a href="restaurant-info.html?id=4">
              <img src="img/restaurant/piatto.jpg"alt="Piatto" />
              <div class="text">
                <p>Piatto</p>
              </div>
            </a>
          </li>
          <li>
            <a href="restaurant-info.html?id=5">
              <img src="img/restaurant/indain.jpg" alt="Indian Aroma" />
              <div class="text">
                <p>Indian Aroma</p>
              </div>
            </a>
          </li>
          <li>
            <a href="restaurant-info.html?id=6">
              <img src="img/restaurant/kit.jpg" alt="KITAMI" />
              <div class="text">
                <p>KITAMI</p>
              </div>
            </a>
          </li>
        </ul>

        <h1>FAST FOOD</h1>
        <hr />

        <ul class="grid">
          <li>
            <a href="restaurant-info.html?id=7">
              <img src="img/restaurant/mac.jpg" alt="Mcdonals" />
              <div class="text">
                <p>Mcdonals</p>
              </div>
            </a>
          </li>


          <li>
            <a href="restaurant-info.html?id=8">
              <img src="img/restaurant/kfc.jpg" alt="KFC" />
              <div class="text">
                <p>KFC</p>
              </div>
            </a>
          </li>


          <li>
            <a href="restaurant-info.html?id=9">
              <img src="img/restaurant/sub.jpg" alt="SubWay" />
              <div class="text">
                <p>SubWay</p>
              </div>
            </a>
          </li>


        </ul>
        <div class="clear"></div>

      </div>

    </section>
    <?php include("include/footer.php"); ?>