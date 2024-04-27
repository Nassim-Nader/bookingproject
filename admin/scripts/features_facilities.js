
let feature_s_form = document.getElementById('feature_s_form');
let facility_s_form = document.getElementById('facility_s_form');

feature_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_feature();
});


function add_feature() {
    let data = new FormData();
    data.append('name', feature_s_form.elements['feature_name'].value);
    data.append('add_feature', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/features_facilities.php", true);

    xhr.onload = function () {
        console.log(this.responseText);

        var myModal = document.getElementById('feature-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert('success', ' New Feature Has been Added successfully');
            feature_s_form.elements['feature_name'].value = '';
            get_features();
        }
        else {
            alert('error', 'Server Down!');

        }
    }

    xhr.send(data);
}


function get_features() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('features-data').innerHTML = this.responseText;
    }

    xhr.send('get_features');
}

function del_features(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert('success', 'This Feature is Deleted!');
            get_features();
        }
        else if (this.responseText == 'room_added') {
            alert('error', 'Feature is added in room!');
        }
        else {
            alert('error', 'Server Down try again Later!');
        }
    }

    xhr.send('del_features=' + val);
}


facility_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_facility();
});

function add_facility() {
    let data = new FormData();
    data.append('name', facility_s_form.elements['facility_name'].value);
    data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
    data.append('description', facility_s_form.elements['facility_desc'].value);
    data.append('add_facility', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/features_facilities.php", true);

    xhr.onload = function () {
        console.log(this.responseText);

        var myModal = document.getElementById('facility-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert('error', 'Only svg images are allowed!');
            get_general();
        }
        else if (this.responseText == 'inv_size') {
            alert('error', 'image is too large it surpass 2 mb');
        }
        else if (this.responseText == 'upd_failed') {
            alert('error', 'image upload failed.Server Down!');
        }
        else {
            alert('success', 'The New Facility Has been Added successfully');
            facility_s_form.reset();
            get_facilities();
        }
    }

    xhr.send(data);
}

function get_facilities() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('facilities-data').innerHTML = this.responseText;
    }

    xhr.send('get_facilities');
}

function del_facility(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert('success', 'This Facility is Deleted!');
            get_facilities();
        }
        else if (this.responseText == 'room_added') {
            alert('error', 'Facility is added in room!');
        }
        else {
            alert('error', 'Server Down try again Later!');
        }
    }

    xhr.send('del_facility=' + val);
}


window.onload = function () {
    get_features();
    get_facilities();
}
