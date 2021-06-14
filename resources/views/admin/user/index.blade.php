@extends('admin.dashboard')
@section('admin_content')
<a class="breadcrumb-item" href="index.html">Tables</a>
<span class="breadcrumb-item active">User Table</span>
</nav>
<div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">All Register User</h6>
        <div id="notifDiv">

        </div>
        <div id="get_data">

        </div>






    </div><!-- card -->





   <script>

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }

        })
        // function alluser(){
        //         $.ajax({
        //             method:"GET",
        //             dataType:'json',
        //             url:"{{ route('allregisteruser') }}",
        //             success:function(response){
        //                 var data =""
        //                 var serial = 1
        //               $.each(response, function(key, value){


        //                 data=data+"<tr>"
        //                 data=data+"<td>"+serial++ +"</td>"
        //                 data=data+"<td>"+value.name+"</td>"
        //                 data=data+"<td>"+value.email+"</td>"
        //                 data=data+(value.status == 0 ? "<td>"+"<i class='fas fa-user text-success'></i>"+"</td>" : "<td>"+"<i class='fas fa-user-slash text-danger'></i>"+"</td>")
        //                 data=data+"<td>"+value.created_at+"</td>"
        //                 data=data+(value.status == 0 ? "<td>"+"<button class='active_deactive_user' ><i class='fas fa-user-slash text-danger'></i></button>"+"</td>" : "<td>"+"<button class='active_deactive_user' ><i class='fas fa-user text-success'></i></button>"+"</td>")
        //                 data=data+"</tr>"

        //               })
        //               $('tbody').html(data);
        //             }
        //         })
        //     }
        //     alluser();

    </script>
     <script>

        $(function(){
          'use strict';

          $('#datatable1').DataTable({
            responsive: true,
            language: {
              searchPlaceholder: 'Search...',
              sSearch: '',
              lengthMenu: '_MENU_ items/page',
            }
          });

          $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
          });

          // Select2
          $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
      </script>

  </div><!-- sl-pagebody -->
@endsection
