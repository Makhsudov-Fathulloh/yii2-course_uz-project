// actionCreate //1//
//--------------------start--------------------//
// $('#create-button').on('click', function (event) { // click bolganda
//      event.preventDefault(); // default hrefni ochirib qoyadi
//     $('#myModal').modal('show'); // click bolgan elementning attributini olsin
// }); // Modal -> ishlashka tayyor
//--------------------end--------------------//

//2//
//--------------------start--------------------//
$('#create-button').on('click', function (event) { // click bolganda
    event.preventDefault(); // default hrefni ochirib qoyadi
    var url = $(this).attr('href'); // click bolgan elementning attributini olsin
    $('#myModal').modal('show');
    send(url);
});
//
// function send(_url, formData = null) {
//     $.ajax({
//         url: _url,
//         type: "POST",
//         dataType: "json",
//         data: formData,
//         success: function (data) {
//             // console.log(data);
//             $('#myModal').modal('show').find('#modalContent').html(data); // myModal ichidagi contentka formani kirgizdik
//         }
//     });
// }
//--------------------end--------------------//

                       //3//
// --------------------start--------------------//
// function send(_url, formData = null) {
//     $.ajax({
//         url: _url,
//         type: "POST",
//         dataType: "json",
//         data: formData,
//         success: function (data) {
//             // console.log(data);
//             $('#myModal').modal('show').find('#modalContent').html(data); // myModal ichidagi contentka formani kirgizdi
//             $('#save-button').on('click', function (e) { // save-button va pr-form _form.php dan keldi
//                 let form = $('#pr-form').serialize();
//                 send(_url, form); // data save bolganda yana myModal-form ga qaytibkelsin
//             });
//         }
//     });
// }
// --------------------end--------------------//

                       //3//
// --------------------start--------------------//
function send(_url, formData=null){
    $.ajax({
        url: _url,
        type: "POST",
        dataType: "json",
        data: formData,
        success:function (data) {
            if (data.status == false) {
                    $('#myModal').modal('show').find('#modalContent').html(data.content);
                    $('#save-button').on('click', function (e) {
                        e.preventDefault();
                        let form = $('#pr-form').serialize();
                        send(_url, form);
                        return false; // funksiya bajarilgach chiqibketsin
                    });
                    return false; // funksiya bajarilgach chiqibketsin
                } else {
                    $.pjax.reload({container: "#pr-pjax"}); // save qilingach index oynani yangila
                    $('#myModal').modal('hide'); // hide modalni yopadi
                }
            }
    });
}
// --------------------end--------------------//

// actionUpdate //1//
// --------------------end--------------------//
$('body').on('click', '.update-pline', function (event){ // bodyda update-pline class bor bolgan elemenlar click bolganda
    event.preventDefault(); // default hrefni ochirib qoyadi
    var url = $(this).attr('href'); // click bolgan elementning (a href) attributini olsin
    $('#myModal').modal('show'); // show modalni korsatadi
    send(url); // send() function ishlasin
});