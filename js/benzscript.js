$(function(){

    $('input[type="checkbox"]').click(function(){
        if($(this).attr("id") == 'other'){
            $('#input-other').toggle();
        }
    });

    // Jquery Untuk Show/Hide Permohonan
    $('#daftarAnggota').hide();
    $('#jenisPenulis').change(function(){
        if($('#jenisPenulis').val() == 'K'){
            $('#daftarAnggota').show(500);
        }else{
            $('#daftarAnggota').hide(500);
        }
    });

    $('#naskahBuku').hide();
    $('#bungaRampai').hide();
    $('#kepengarangan').change(function(){
        if($('#kepengarangan').val() == 'Naskah Buku'){
            $('#naskahBuku').show(500);
            $('#bungaRampai').hide();
        }
        if($('#kepengarangan').val() == 'Bunga Rampai'){
            $('#naskahBuku').hide();
            $('#bungaRampai').show(500);
        }
    });

// Jquery Untuk term
    $('input[type="checkbox"]').click(function(){
        if($(this).attr("id") == 'terms'){
            $('#button').toggle();
        }
    });

    // jquery untuk add row table
    $('.plusbtn').click(function() {
        $(".test").append('<tr><td><input type="text" class="txtbox form-control" value="" name="namaEditor[]"/></td><td><input type="text" class="txtbox form-control" value="" name="telpEditor[]"/></td><td><input type="text" class="txtbox form-control" value="" name="emailEditor[]"/></td></tr>');
    });
    // jquery untuk hapus row table
    $('.minusbtn').click(function() {
        if($(".test tr").length != 2) {
        $(".test tr:last-child").remove();
        } else {
            alert("Maaf Anda tidak dapat menghapus kolom terakhir");
        }
    });
    // jquery untuk add row table author
    $('.plusbtnAuthor').click(function() {
        $(".author").append('<tr><td><input type="text" class="txtbox form-control" value="" name="namaAuthor[]"/></td><td><input type="text" class="txtbox form-control" value="" name="telpAuthor[]"/></td><td><input type="text" class="txtbox form-control" value="" name="emailAuthor[]"/></td></tr>');
    });
    // jquery untuk hapus row table author
    $('.minusbtnAuthor').click(function() {
        if($(".author tr").length != 2) {
            $(".author tr:last-child").remove();
        } else {
            alert("Maaf Anda tidak dapat menghapus kolom terakhir");
        }
    });
    // jquery untuk add row table co-author
    $('.plusbtnCo').click(function() {
        $(".co").append('<tr><td><input type="text" class="txtbox form-control" value="" name="namaCo[]"/></td><td><input type="text" class="txtbox form-control" value="" name="telpCo[]"/></td><td><input type="text" class="txtbox form-control" value="" name="emailCo[]"/></td></tr>');
    });
    // jquery untuk hapus row table co-author
    $('.minusbtnCo').click(function() {
        if($(".co tr").length != 2) {
            $(".co tr:last-child").remove();
        } else {
            alert("Maaf Anda tidak dapat menghapus kolom terakhir");
        }
    });

    // jquery untuk add row table Ahli /Spesialist
    $('.plusbtnAhli').click(function() {
        $(".ahli").append('<tr><td><input type="text" class="txtbox form-control" value="" name="namaAhli[]" /></td><td><input type="text" class="txtbox form-control" value="" name="jabatanAhli[]" /></td><td><input type="text" class="txtbox form-control" value="" name="telpAhli[]" /></td><td><input type="text" class="txtbox form-control" value="" name="emailAhli[]" /></td></tr>');
    });
    // jquery untuk hapus row table Ahli /Spesialist
    $('.minusbtnAhli').click(function() {
        if($(".ahli tr").length != 2) {
        $(".ahli tr:last-child").remove();
        } else {
            alert("Maaf Anda tidak dapat menghapus kolom terakhir");
        }
    });
});