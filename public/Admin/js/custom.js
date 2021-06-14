

jQuery(function (){
    getUserList();


            $(document).on('click', '.active_deactive_user', function() {
                const thisRef = $(this);
                thisRef.text('processing');
                $.ajax({
                type: 'GET',
                url: '/active_deactive_user/'+thisRef.attr('id'),
                success:function(response) {
                // var response = JSON.parse(response);
                if(response == 'success') {
                    showAlert(200, 'Status Updated Successfully');
                    getUserList();
                } else if(JSON.parse(response) == 'failed') {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('Unable to deactivate employee');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            }
        });
   });
});



function getUserList() {
    $.ajax({
        type: 'GET',
        url: '/allUser',
        success: function (response) {
            // var response = JSON.parse(response);
            var serial = 1
            $('#get_data').empty();
            $('#get_data').append(`<table class="table display responsive nowrap userList" id="datatableuser" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Serial NO</th>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-20p">Email</th>
                                    <th class="wd-20p">Status</th>

                                    <th class="wd-10p">Action</th>

                                </tr>
                                </thead>
                            <tbody>
                        </tbody>
            </table>`);

                    response.forEach(element => {
                        $('.userList tbody').append(`<tr>
                        <td>${serial++}</td>
                        <td>${element.name}</td>
                        <td>${element.email}</td>
                        <td>${element.status == 0 ? `<span class="p-2 bg-success text-white">UNBLOCK</span>` : `<span class=" p-2 bg-danger text-white">BLOCK</span>`}</td>
                        <td>
                        <button class="btn btn-dark btn-sm active_deactive_user" id="${element.id}">${element.status == 0 ? `BLOCK` : `UNBLOCK`}</button>
                        </td>
                </tr>`);
            });
        }
    })
}


function showAlert(code, message) {
	$('#notifDiv').css('background', (code === 200 ? 'green': 'red'));
	$('#notifDiv').fadeIn();
	$('#notifDiv').text(message);
	setTimeout(() =>{
		$('#notifDiv').fadeOut();
	}, 3000)
}

