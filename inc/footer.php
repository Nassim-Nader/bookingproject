<!-- Footer-->
<div class="container-fluid mt-5" style="background-color: var(--teal);">
  <div class="row">
    <div class="col-lg-4">
      <h3 class="h-font fw-bold fs-3 mb-2"><?php echo $settings_r['site_title'] ?></h3>
      <p>
        <?php echo $settings_r['site_about'] ?>
      </p>
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
        echo <<<data
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

  function alert(type, msg, position = 'body') {
    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show " role="alert">
                <strong class="me-3">${msg}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
    if (position == 'body') {
      document.body.append(element);
      element.classList.add('custom-alert');
    }
    else {
      document.getElementById(position).appendChild(element);
    }
    setTimeout(remAlert, 3000);
  }

  function remAlert() {
    document.getElementsByClassName('alert')[0].remove();
  }



  function setActive() {
    let navbar = document.getElementById('nav-bar');
    let a_tags = navbar.getElementsByTagName('a');

    for (i = 0; i < a_tags.length; i++) {
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];

      if (document.location.href.indexOf(file_name) >= 0) {
        a_tags[i].classList.add('active');
      }

    }
  }

  let register_form = document.getElementById('register-form');

  register_form.addEventListener('submit', (e)=> {
    e.preventDefault();

    let data = new FormData();

    data.append('name', register_form.elements['name'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('phonenum', register_form.elements['phonenum'].value);
    data.append('address', register_form.elements['address'].value);
    data.append('pincode', register_form.elements['pincode'].value);
    data.append('dob', register_form.elements['dob'].value);
    data.append('pass', register_form.elements['pass'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    data.append('profile', register_form.elements['profile'].files[0]);
    data.append('register', '');

    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/login_register.php", true);

    xhr.onload = function () {
      if (this.responseText == 'pass_mismatch') {
        alert('error',"Password Mismatch!");
      }
      else if (this.responseText == 'email_already'){
        alert('error',"Email is already registered!");
      }
      else if (this.responseText == 'phone_already'){
        alert('error',"Phone number is already registered!");
      }
      else if(this.responseText == 'inv_img'){
        alert('error',"Only JPG , WENP & PNG images are allowed!");
      }
      else if(this.responseText == 'upd_failed'){
        alert('error',"Image upload failed!");
      }
      else if(this.responseText == 'mail_failed'){
        alert('error',"Connat send confirmation email! Server down !");
      }
      else if(this.responseText == 'ins_failed'){
        alert('error',"Registration failed! Server down !");
      }
      else {
        alert('success',"Registration successful. confirmation link sent to your email!");
        register_form.reset();
      }
    }
    xhr.send(data);
  });

  let login_form = document.getElementById('login-form');

  login_form.addEventListener('submit', (e)=> {
    e.preventDefault();

    let data = new FormData();

    data.append('email_mob', login_form.elements['email_mob'].value);
    data.append('pass', login_form.elements['pass'].value);

    data.append('login', '');

    var myModal = document.getElementById('loginModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/login_register.php", true);

    xhr.onload = function () {
      if (this.responseText == 'inv_email_mob') {
        alert('error',"Inavlid Email or Phone Number!");
      }
      else if (this.responseText == 'not_verified'){
        alert('error',"Email is not verified!");
      }
      else if (this.responseText == 'inactive'){
        alert('error',"Account suspended! please contact Admin.");
      }
      else if(this.responseText == 'inavlid_pass'){
        alert('error',"Incorrect Password!");
      }
      else {
        let fileurl = window.location.href.split('/').pop().split('?').shift();
        if (fileurl == 'room_details.php'){
          window.location =window.location.href;
        }
        else{
          window.location =window.location.pathname;
        }
      }
    }
    xhr.send(data);
  });

  let forgot_form = document.getElementById('forgot-form');

  forgot_form.addEventListener('submit', (e)=> {
    e.preventDefault();

    let data = new FormData();

    data.append('email', forgot_form.elements['email'].value);

    data.append('forgot_pass', '');

    var myModal = document.getElementById('forgotModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/login_register.php", true);

    
    xhr.onload = function () {
      if (this.responseText == 'inv_email') {
        alert('error',"Inavlid Email!");
      }
      else if (this.responseText == 'not_verified'){
        alert('error',"Email is not verified! Contact Admin");
      }
      else if (this.responseText == 'inactive'){
        alert('error',"Account suspended! please contact Admin.");
      }
      else if (this.responseText == 'mail_failed'){
        alert('error',"Connot send email.Server Down");
      }
      else if (this.responseText == 'upd_failed'){
        alert('error',"Account recovery failed.Server Down");
      }
      else {
        alert('success',"Reset link sent to email!");
        forgot_form.reset();
      }
    }
    
    xhr.send(data);
  });

  function checkLoginToBook(status,room_id){
    if(status){
      window.location.href='confirm_booking.php?id='+room_id;
    }
    else{
      alert('error','Please login to book a room!');
    }
  }

  setActive();
</script>