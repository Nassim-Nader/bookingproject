
let general_data, contacts_data;

let general_s_form = document.getElementById('general_s_form');
let site_title_inp = document.getElementById('site_title_inp');
let site_about_inp = document.getElementById('site_about_inp');

let contacts_s_form = document.getElementById('contacts_s_form');

let team_s_form = document.getElementById('team_s_form');
let member_name_inp = document.getElementById('member_name_inp');
let member_picture_inp = document.getElementById('member_picture_inp');



function get_general() {
    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site_about');

    let shutdown_toggle = document.getElementById('shutdown-toggle')

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        general_data = JSON.parse(this.responseText);

        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;

        if (general_data.shutdown == 0) {
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
        }
        else {
            shutdown_toggle.checked = true;
            shutdown_toggle.value = 1;
        }
    }

    xhr.send('get_general');
}

general_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    upd_general(site_title_inp.value, site_about_inp.value);
});

function upd_general(site_title_val, site_about_val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {

        var myModal = document.getElementById('general-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert('success', 'Changes saved!');
            get_general();
        }
        else {
            alert('error', 'No Changes made!');
        }
    }

    xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
}

function upd_shutdown(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {

        if (this.responseText == 1 && general_data.shutdown == 0) {
            alert('success', 'Shutdown mode On!');
        }
        else {
            alert('success', 'Shutdown mode Off!');
        }
        get_general();
    }

    xhr.send('upd_shutdown=' + val);
}

function get_contacts() {
    let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'fb', 'insta'];
    let iframe = document.getElementById('iframe');



    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);

        for (i = 0; i < contacts_p_id.length; i++) {
            document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
        }
        iframe.src = contacts_data[9];
        contacts_inp(contacts_data);

    }

    xhr.send('get_contacts');

}

function contacts_inp(data) {
    let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'fb_inp', 'insta_inp', 'iframe_inp'];

    for (i = 0; i < contacts_inp_id.length; i++) {
        document.getElementById(contacts_inp_id[i]).value = data[i + 1];
    }
}

contacts_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    upd_contacts();
});

function upd_contacts() {
    let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'fb', 'insta', 'iframe'];
    let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'fb_inp', 'insta_inp', 'iframe_inp'];

    let data_str = "";

    for (i = 0; i < index.length; i++) {
        data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
    }
    data_str += "upd_contacts";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        var myModal = document.getElementById('contacts-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.responseText == 1) {
            alert('success', 'Contact updated successfully!');
            get_contacts();
        }
        else {
            alert('error', 'nothing has been changed!');
        }
    }

    xhr.send(data_str);
}


team_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_member();
});


function add_member() {
    let data = new FormData();
    data.append('name', member_name_inp.value);
    data.append('picture', member_picture_inp.files[0]);
    data.append('add_member', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/settings_crud.php", true);

    xhr.onload = function () {
        console.log(this.responseText);

        var myModal = document.getElementById('team-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert('error', 'Only JPG and PNG images are allowed!');
        }
        else if (this.responseText == 'inv_size') {
            alert('error', 'image is too large it surpass 3 mb');
        }
        else if (this.responseText == 'upd_failed') {
            alert('error', 'image upload failed.Server Down!');
        }
        else {
            alert('success', 'The New Member Has been Added successfully');
            member_name_inp.value = '';
            member_picture_inp.value = '';
            get_members();
        }
    }

    xhr.send(data);
}


function get_members() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('team-data').innerHTML = this.responseText;
    }

    xhr.send('get_members');
}


function del_member(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "nas/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert('success', 'This Member is Deleted!');
            get_members();
        }
        else {
            alert('error', 'Server Down try again Later!');
        }
    }

    xhr.send('del_member=' + val);
}


window.onload = function () {
    get_general();
    get_contacts();
    get_members();
}