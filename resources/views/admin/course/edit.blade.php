<form id='edit' action="" enctype="multipart/form-data" method="post" >

    <div class="box-body">
        <div id="status"></div>
        {{method_field('PATCH')}}
        <div class="form-group col-md-10 col-sm-12">
            <label for="course_name"> Course Title </label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}"
                   placeholder="" required>

            <span id="error_first_name" class="has-error"></span>
        </div>

        <div class="form-group col-md-10 col-sm-12">
            <label for="description"> Course description </label>
            <textarea id="summernote"class="form-control" name="description">{{ $course->description }}</textarea>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="regular_price"> Course Regular Price </label>
            <input type="number" class="form-control" id="regular_price" name="regular_price" value="{{ $course->regular_price }}"
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="discount_price"> Course Discount Price </label>
            <input type="number" class="form-control" id="discount_price" name="discount_price" value="{{ $course->discount_price }}"
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        {{-- here --}}
        <div class="form-group col-md-10 col-sm-12">
            <label for="who_is_it_for">Who is it for </label>
            <input type="text" class="form-control" id="who_is_it_for" name="who_is_it_for" value="{{ $course->who_is_it_for }}"
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="what_you_will_learn"> What You Will learn </label>
            <input type="text" class="form-control" id="what_you_will_learn" name="what_you_will_learn" value="{{ $course->what_you_will_learn }}"
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="what_it_prepare_you_for">What it Prepare you for </label>
            <input type="text" class="form-control" id="what_it_prepare_you_for" name="what_it_prepare_you_for" value="{{ $course->what_it_prepare_you_for }}"
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        @php
            $categories =\App\Models\Category::all();
            $catname =\App\Models\Category::where('id',$course->category_id)->first();
        @endphp
          <div class="form-group col-md-10 col-sm-12">
            <label for="what_you_will_learn"> Category </label>
            <select class="form-control select2" name="category_id" data-placeholder="Choose Category">
                @if ($catname!=null)
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"{{ $category->id ==$catname->id ? "selected":"" }}>{{ $category->name }}</option>
                @endforeach
                @else
                <option label="Choose Category"></option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                @endif


                </select>
            <span id="error_first_name" class="has-error"></span>
        </div>

        <div class="form-group col-md-10 col-sm-12">
            <label for="online_self_palced">Online Self place </label>
            <select class="form-control select2" name="online_self_palced" data-placeholder="Choose anyone">
               @if ($course->online_self_palced=='yes')
               <option selected value="yes">Yes</option>
               <option value="no">No</option>
               @else
               <option  value="yes">Yes</option>
               <option selected value="no">No</option>
               @endif

            </select>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="course_time_need">Coourse Time Need </label>
            <input type="number" class="form-control" id="course_time_need" name="course_time_need" value="{{ $course->course_time_need }}"
                   placeholder="input as hourly.." required>
            <span id="error_first_name" class="has-error"></span>
        </div>

        <div class="form-group col-md-10 col-sm-12">
            <label for="video_content">You Tube link </label>
            <input type="text" class="form-control" id="video_content" name="video_content" value="{{ $course->video_content }}"
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="hands_on_lab_assignment"> Hands on lab assessment </label>
            <select class="form-control select2" name="hands_on_lab_assignment" data-placeholder="Choose anyone">
                @if ($course->hands_on_lab_assignment=='yes')
               <option selected value="yes">Yes</option>
               <option value="no">No</option>
               @else
               <option  value="yes">Yes</option>
               <option selected value="no">No</option>
               @endif

                </select>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="course_timelimit_after_enroll"> Course time limit after enroll  </label>
            <select class="form-control select2" name="course_timelimit_after_enroll" data-placeholder="Choose time">

                @switch($course->course_timelimit_after_enroll)
                    @case(1)
                        <option selected value="1">One month</option>
                        @break
                    @case(2)
                        <option selected value="2">Two month</option>
                        @break
                    @case(3)
                        <option  selected  value="3">three month</option>
                        @break
                    @case(4)
                        <option selected  value="4">Four month</option>
                        @break
                    @case(5)
                        <option selected  value="5">Five month</option>
                        @break
                    @case(6)
                        <option  selected value="6">Six month</option>
                        @break
                    @case(7)
                        <option selected  value="7">Seven month</option>
                        @break
                    @case(8)
                        <option selected  value="8">Eight month</option>
                        @break
                    @case(9)
                        <option  selected value="9">Nine month</option>
                        @break
                    @case(10)
                        <option selected  value="10">Ten month</option>
                        @break
                    @case(11)
                        <option  selected value="11">Eleven month</option>
                        @break
                    @case(12)
                        <option selected  value="12">One year</option>
                        @break
                    @default

                @endswitch
                <option value="1">One month</option>
                <option value="2">Two month</option>
                <option value="3">three month</option>
                <option value="4">Four month</option>
                <option value="5">Five month</option>
                <option value="6">Six month</option>
                <option value="7">Seven month</option>
                <option value="8">Eight month</option>
                <option value="9">Nine month</option>
                <option value="10">Ten month</option>
                <option value="11">Eleven month</option>
                <option value="12">One year</option>

                </select>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="Digital_badge"> Digital Badge </label>
            <select class="form-control select2" name="digital_badge" data-placeholder="Choose anyone">
                @if ($course->digital_badge=='yes')
               <option selected value="yes">Yes</option>
               <option value="no">No</option>
               @else
               <option  value="yes">Yes</option>
               <option selected value="no">No</option>
               @endif

                </select>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="discussion_forum">Discussion forum group link </label>
            <input type="text" class="form-control" id="discussion_forum" name="discussion_forum" value="{{ $course->discussion_forum }}"
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>


        <div class="clearfix"></div>
        <div class="form-group col-md-12">
            <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary">
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- /.box-body -->
</form>


<script>
    $(document).ready(function () {
        $('#loader').hide();
        $('#edit').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                course_name: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                course_name: {
                    required: 'Please enter catgory name'
                }
            },
            submitHandler: function (form) {

                var myData = new FormData($("#edit")[0]);

                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')},
                    url: 'courses/' + '{{ $course->id }}',
                    type: 'POST',
                    data: myData,
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#loader').show();
                        // $("#submit").prop('disabled', true); // disable button
                    },
                    success: function (data) {

                        $("#status").html(data.html);
                        reload_table();
                        $('#loader').hide();
                        $("#submit").prop('disabled', false); // disable button
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#modalUser').modal('hide'); // hide bootstrap modal
                    },
                    error:function(error){
                        // console.log(error.responseJSON);
                    // Swal.fire({
                    //     text: 'Course name Already added! try another',
                    //     icon: 'error',
                    //     confirmButtonText: 'Ok'
                    //     })
                    }
                });
            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'

    });
</script>
<script>
    $(function(){
      'use strict';

      // Inline editor
      var editor = new MediumEditor('.editable');

      // Summernote editor
      $('#summernote').summernote({
        height: 150,
        tooltip: false
      })
    });
  </script>
