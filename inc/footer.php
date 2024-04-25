<!-- Footer-->
<div class="container-fluid bg-white mt-5">
    <div class="row">
      <div class="col-lg-4">
        <h3 class="h-font fw-bold fs-3 mb-2">Metama</h3>
        <p>Eiusmod non in Lorem nisi do ea ad sunt amet quis consectetur minim adipisicing. 
          Ut eu officia deserunt occaecat voluptate eiusmod sit aliqua proident ad. 
          Aliquip incididunt reprehenderit aliquip consequat duis.</p>
      </div>
      <div class="col-lg-4">
        <h5 class="mb-3">Links</h5>
        <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
        <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
        <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
        <a href="Contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a><br>
        <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
      </div>
      <div class="col-lg-4">
        <h5 class="mb-3">Fallow us</h5>
        <?php
            if ($contact_r['tw'] != '') {
              echo<<<data
                <a href="$contact_r[tw]" class="d-inline-block mb-2 text-dark text-decoration-none">
                  <i class="bi bi-twitter-x me-1"></i>
                  Twitter-X
                </a>
              data;
            }
          ?>

        <br>
        <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-2 text-dark text-decoration-none">
            <i class="bi bi-facebook me-1"></i>
            Facebook
        </a>
        <br>
        <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none">
            <i class="bi bi-instagram me-1"></i>
            Instagram
        </a>
        <br>
       
      </div>
    </div>
  </div>

  <h6 class="text-center bg-dark text-white p-3 m-0">Designed and developed by Metama</h6>


  <script>
    function setActive() {
      let navbar = document.getElementById('nav-bar');
      let a_tags= navbar.getElementsByTagName('a');

      for(i=0;i<a_tags.length;i++){
        let file =a_tags[i].href.split('/').pop();
        let file_name = file.split('.')[0];

        if(document.location.href.indexOf(file_name)>=0)
        {
          a_tags[i].classList.add('active');
        }

      }
    }
    setActive();
  </script>