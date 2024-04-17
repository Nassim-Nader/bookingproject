<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <?php require('inc/links.php')?>
  <style>
    
    .avaibility-form {
      margin-top: -50px;
      z-index: 2;
      position: relative;
    }

    @media screen and (max-width: 575px) {
      .avaibility-form {
        margin-top: 25px;
        padding: 0 35px;
      }
    }
  </style>
  <title>Metama Hotels</title>
</head>

<body class="bg-light">

  <?php require('inc/header.php');?>

  <!--carousel-->
  <div class="container-fluid px-lg mt-4">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/carousel/1.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/2.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/3.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/4.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/5.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/6.png" class="w-100 d-block" />
        </div>
      </div>
    </div>
  </div>

  <!-- the check avaibility form -->

  <div class="container avaibility-form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5 class="mb-4">Check Booking Avaibility</h5>
        <form>
          <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight:500;">Check-in</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight:500;">Check-out</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight:500;">Adult</label>
              <select class="form-select shadow-none">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-lg-2 mb-3">
              <label class="form-label" style="font-weight:500;">Children</label>
              <select class="form-select shadow-none">
                <option value="1">zero</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-lg-1 mt-2 mb-lg-3">
              <button type="sybmit" class="btn text-white shadow-none custom-bg">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Our Rooms -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px;margin: auto;">
          <img src="images/rooms/1.jpg" class="card-img-top">
          <div class="card-body">
            <h5 >Simple Room</h5>
            <h6 class="mb-4">150DH per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge bg-light text-dark text-wrap lh-base">
                2 Rooms
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                2 Bathrooms
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                1 Balcony
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                3 Sofa
              </span>
            </div>
            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Wifi
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Air Condition
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Television
              </span>
            </div>
            <div class="rating mb-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
                <i class="bi bi-star text-warning"></i>
            </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px;margin: auto;">
          <img src="images/rooms/1.jpg" class="card-img-top">
          <div class="card-body">
            <h5 >Simple Room</h5>
            <h6 class="mb-4">150DH per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge bg-light text-dark text-wrap lh-base">
                2 Rooms
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                2 Bathrooms
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                1 Balcony
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                3 Sofa
              </span>
            </div>
            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Wifi
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Air Condition
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Television
              </span>
            </div>
            <div class="rating mb-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
                <i class="bi bi-star text-warning"></i>
            </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px;margin: auto;">
          <img src="images/rooms/1.jpg" class="card-img-top">
          <div class="card-body">
            <h5 >Simple Room</h5>
            <h6 class="mb-4">150DH per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge bg-light text-dark text-wrap lh-base">
                2 Rooms
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                2 Bathrooms
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                1 Balcony
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                3 Sofa
              </span>
            </div>
            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Wifi
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Air Condition
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                Television
              </span>
            </div>
            <div class="rating mb-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
                <i class="bi bi-star text-warning"></i>
            </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms -></a>
      </div>
    </div>
  </div>


  <!-- Our Facilities -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="images/facilities/wifi.svg" width="80px">
        <h5 class="mt-3">wifi</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="images/facilities/AC.svg" width="80px">
        <h5 class="mt-3">Air Condition</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="images/facilities/television.svg" width="80px">
        <h5 class="mt-3">television</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="images/facilities/roomheater.svg" width="80px">
        <h5 class="mt-3">Sauna room</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="images/facilities/massage.svg" width="80px">
        <h5 class="mt-3">massage&spa</h5>
      </div>
      <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities -></a>
      </div>
    </div>
  </div>

  <!-- reviews -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REVIEWS</h2>
  <div class="container mt-5">
    <div class="swiper swiper-reviews">
      <div class="swiper-wrapper mb-5">

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/facilities/radio.svg" width="30px" />
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>Ea labore consectetur occaecat exercitation. 
            Qui dolore eiusmod dolor laborum fugiat enim enim enim ullamco ut Lorem ea qui. 
            Incididunt aliqua tempor do qui occaecat laborum aliqua amet culpa sunt do ad quis velit. 
            Aliqua ut sunt occaecat fugiat cupidatat fugiat Lorem aute ad aute dolore labore elit.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
          </div>
        </div>

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/facilities/radio.svg" width="30px" />
            <h6 class="m-0 ms-2">Random user2</h6>
          </div>
          <p>Ea labore consectetur occaecat exercitation. 
            Qui dolore eiusmod dolor laborum fugiat enim enim enim ullamco ut Lorem ea qui. 
            Incididunt aliqua tempor do qui occaecat laborum aliqua amet culpa sunt do ad quis velit. 
            Aliqua ut sunt occaecat fugiat cupidatat fugiat Lorem aute ad aute dolore labore elit.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
          </div>
        </div>

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/facilities/radio.svg" width="30px" />
            <h6 class="m-0 ms-2">Random user3</h6>
          </div>
          <p>Ea labore consectetur occaecat exercitation. 
            Qui dolore eiusmod dolor laborum fugiat enim enim enim ullamco ut Lorem ea qui. 
            Incididunt aliqua tempor do qui occaecat laborum aliqua amet culpa sunt do ad quis velit. 
            Aliqua ut sunt occaecat fugiat cupidatat fugiat Lorem aute ad aute dolore labore elit.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="images/facilities/radio.svg" width="30px" />
            <h6 class="m-0 ms-2">Random user4</h6>
          </div>
          <p>Ea labore consectetur occaecat exercitation. 
            Qui dolore eiusmod dolor laborum fugiat enim enim enim ullamco ut Lorem ea qui. 
            Incididunt aliqua tempor do qui occaecat laborum aliqua amet culpa sunt do ad quis velit. 
            Aliqua ut sunt occaecat fugiat cupidatat fugiat Lorem aute ad aute dolore labore elit.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="col-lg-12 text-center mt-5">
      <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">see more reviews -></a>
    </div>
  </div>

  <!-- Contact Us -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">CONATACT US</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3441.15363366552!2d-9.532564524975566!3d30.40338270147623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3b68d27d5f00b%3A0xca0e141e9c9847a1!2sEcole%20Polytechnique%20D&#39;agadir!5e0!3m2!1sen!2sma!4v1713341926890!5m2!1sen!2sma"  loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-4">
          <h5>Call Us</h5>
          <a href="tel: +212666848481" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i>+212666848481
          </a>
          <br>
          <a href="tel: +212484816668" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i>+212484816668
          </a>
        </div>
        <div class="bg-white p-4 rounded mb-4">
          <h5>Fallow Us</h5>
          <a href="#" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-twitter-x me-1"></i>
              Twitter-X
            </span>
          </a>
          <br>
          <a href="#" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-facebook me-1"></i>
              Facebook
            </span>
          </a>
          <br>
          <a href="#" class="d-inline-block ">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-instagram me-1"></i>
              Instagram
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>


  <?php require('inc/footer.php');?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      }
    });
    var swiper = new Swiper(".swiper-reviews", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView:"3",
      loop:true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320:{
          slidesPerView:1,
        },
        640:{
          slidesPerView:1,
        },
        768:{
          slidesPerView:2,
        },
        1024:{
          slidesPerView:3,
        },
      }
    });
  </script>
</body>

</html>