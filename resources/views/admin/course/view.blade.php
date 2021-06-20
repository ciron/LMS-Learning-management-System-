<div class="row">
    <div class="col-md-12 col-sm-12 table-responsive">
        <table id="view_details" class="table table-bordered table-hover">
            <tbody>
            <tr>
                <td class="subject"> Course Name</td>
                <td> :</td>
                <td> {{ $course->course_name }} </td>
            </tr>
            <tr>
                <td class="subject"> Course Code</td>
                <td> :</td>
                <td> {{ $course->course_code }} </td>
            </tr>
            @php
                $catname =\App\Models\Category::where('id',$course->category_id)->first();
            @endphp
            <tr>
                <td class="subject"> Category</td>
                <td> :</td>

                @if ($catname !=null)
                <td>{{ $catname->name }} </td>
                @else
                <td>This category is deleted </td>
                @endif
            </tr>
            <tr>
                <td class="subject"> Course description</td>
                <td> :</td>
                <td> {!! $course->description !!} </td>
            </tr>
            <tr>
                <td class="subject"> Course Regular Price</td>
                <td> :</td>
                <td> {{ $course->regular_price }} </td>
            </tr>
            <tr>
                <td class="subject"> Course Discount Price</td>
                <td> :</td>
                <td> {{ $course->discount_price }} </td>
            </tr>
            <tr>
                <td class="subject"> Who is it for!</td>
                <td> :</td>
                <td> {{ $course->who_is_it_for }} </td>
            </tr>
            <tr>
                <td class="subject"> What you will learn!</td>
                <td> :</td>
                <td> {{ $course->what_you_will_learn }} </td>
            </tr>
            <tr>
                <td class="subject"> What it prepare you for!</td>
                <td> :</td>
                <td> {{ $course->what_it_prepare_you_for }} </td>
            </tr>
            <tr>
                <td class="subject"> Online Self placed!</td>
                <td> :</td>
                <td> {{ $course->online_self_palced }} </td>
            </tr>
            <tr>
                <td class="subject">How many time need to complete it!</td>
                <td> :</td>
                <td> {{ $course->course_time_need }} Hr </td>
            </tr>
            <tr>
                <td class="subject">Lab Assignment!</td>
                <td> :</td>
                <td> {{ $course->hands_on_lab_assignment }} </td>
            </tr>
            <tr>
                <td class="subject">Video content!</td>
                <td> :</td>
                <td> {{ $course->video_content }} </td>
            </tr>
            <tr>
                <td class="subject">Course Time limit after enroll !</td>
                <td> :</td>
                <td>
                @php
                    $timeduration =  $course->course_timelimit_after_enroll;

                    switch ($timeduration) {
                    case 1:
                        echo "1 month !";
                        break;
                    case 2:
                        echo "2 month !";
                        break;
                    case 3:
                        echo "3 month !";
                        break;
                    case 4:
                        echo "4 month !";
                        break;
                    case 5:
                        echo "5 month !";
                        break;
                    case 6:
                        echo "6 month!";
                        break;
                    case 7:
                        echo "7 month!";
                        break;
                    case 8:
                        echo "8 month!";
                        break;
                    case 9:
                        echo "9 month!";
                        break;
                    case 10:
                        echo "10 month!";
                        break;
                    case 11:
                        echo "11 month!";
                        break;
                    case 12:
                        echo "1 year!";
                        break;

                    default:
                        echo "More than one year";
                    }
                @endphp
                </td>
            </tr>
            <tr>
                <td class="subject">Digital badge!</td>
                <td> :</td>
                <td> {{ $course->digital_badge }} </td>
            </tr>
            <tr>
                <td class="subject">Discussion Forum</td>
                <td> :</td>
                <td> {{ $course->discussion_forum }} </td>
            </tr>


            </tbody>
        </table>
    </div>
</div>
