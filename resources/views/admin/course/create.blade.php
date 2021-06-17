<form id='create' action="" enctype="multipart/form-data" method="post"
      accept-charset="utf-8">
    <div class="box-body">
        <div id="status"></div>
        <div class="form-group col-md-10 col-sm-12">
            <label for="course_name"> Course Title </label>
            <input type="text" class="form-control" id="course_name" name="course_name" value=""
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
        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                name: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                name: {
                    required: 'please enter category name'
                }
            },
            submitHandler: function (form) {

                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);

                $.ajax({
                    url: 'contacts',
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
