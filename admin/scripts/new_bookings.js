function get_bookings()
{
    let chr = new XMLHttpRequest();
    xhr.open("POST","nas/new_bookings.php",true);
    xhr.setRequestHeqder('Content-Type','application/x-ww-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('table-data').innerHTML = this.responseText;
    }
    xhr.send('get-bookings');
}

window.onload = function (){
    get_bookings();
}