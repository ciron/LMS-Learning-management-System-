<form id='create' action="{{ route('courses.store') }}" enctype="multipart/form-data" method="post"
      accept-charset="utf-8">
      @csrf
    <div class="box-body">
        <div id="status"></div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="course_name"> Course Title </label>
            <input type="text" class="form-control" id="course_name" name="course_name" value=""
                   placeholder="" required>
                   @php
                       $coursecode=uniqid();
                   @endphp
            <input type="hidden" class="form-control" id="course_code" name="course_code" value="{{ $coursecode }}"
            placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>

        <div class="form-group col-md-10 col-sm-12">
            <label for="description"> Course description </label>
            <textarea id="summernote"class="form-control" name="description"></textarea>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="regular_price"> Course Regular Price </label>
            <input type="number" class="form-control" id="regular_price" name="regular_price" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="discount_price"> Course Discount Price </label>
            <input type="number" class="form-control" id="discount_price" name="discount_price" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        {{-- here --}}
        <div class="form-group col-md-10 col-sm-12">
            <label for="who_is_it_for">Who is it for </label>
            <input type="text" class="form-control" id="who_is_it_for" name="who_is_it_for" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="what_you_will_learn"> What You Will learn </label>
            <input type="text" class="form-control" id="what_you_will_learn" name="what_you_will_learn" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="what_it_prepare_you_for">What it Prepare you for </label>
            <input type="text" class="form-control" id="what_it_prepare_you_for" name="what_it_prepare_you_for" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        @php
            $categories =\App\Models\Category::all();
        @endphp
          <div class="form-group col-md-10 col-sm-12">
            <label for="what_you_will_learn"> Category </label>
            <select class="form-control select2" name="category_id" data-placeholder="Choose Category">
                <option label="Choose Category"></option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="online_self_palced">Online Self place</label>
            <input type="text" class="form-control" id="online_self_palced" name="online_self_palced" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="course_time_need">Coourse Time Need </label>
            <input type="number" class="form-control" id="course_time_need" name="course_time_need" value=""
                   placeholder="input as hourly.." required>
            <span id="error_first_name" class="has-error"></span>
        </div>

        <div class="form-group col-md-10 col-sm-12">
            <label for="video_content">You Tube link </label>
            <input type="text" class="form-control" id="video_content" name="video_content" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="hands_on_lab_assignment"> Hands on lab assessment </label>
            <select class="form-control select2" name="hands_on_lab_assignment" data-placeholder="Choose anyone">
                <option label="Choose anyone"></option>

                <option value="yes">Yes</option>
                <option value="no">No</option>


                </select>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="course_timelimit_after_enroll"> Course time limit after enroll  </label>
            <select class="form-control select2" name="course_timelimit_after_enroll" data-placeholder="Choose time">
                <option label="Choose time"></option>

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
            <select class="form-control select2" name="Digital_badge" data-placeholder="Choose anyone">
                <option label="Choose anyone"></option>

                <option value="yes">Yes</option>
                <option value="no">No</option>


                </select>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="discussion_forum">Discussion forum group link </label>
            <input type="text" class="form-control" id="discussion_forum" name="discussion_forum" value=""
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

{{--
<script>
    $(document).ready(function () {
        $('#loader').hide();
        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                course_name: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                course_name: {
                    required: 'please enter Course name'
                }
            },
            submitHandler: function (form) {

                var myData = new FormData($("#create")[0]);

                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')},
                    url: "{{ route('courses.store') }}",
                    type: 'POST',
                    data: myData,
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#loader').show();
                        $("#submit").prop('disabled', true); // disable button
                    },
                    success: function (data) {

                        $("#status").html(data.html);
                        reload_table();
                        $('#loader').hide();
                        $("#submit").prop('disabled', false); // disable button
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#modalUser').modal('hide'); // hide bootstrap modal
                    }
                });
            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'

    });
</script> --}}
