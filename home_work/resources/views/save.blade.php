<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">




    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



    <link rel="stylesheet" href="{{asset('css/frontend_css/confirm.css')}}">
</head>

<body>
    <div class="box col-sm-9">
        <div class="header">
            <h3 class="text-center">Confirm</h3>
        </div>
        <div class="content">
            <form action="{{asset('/confirmsave')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if($language == "vi")
                    <div class="nameSyllabus">Tên giáo trình</div>
                    <textarea class="textbox" name="name" id="check" cols="95%" rows="1" placeholder="Nhập tên giáo trình" required></textarea>
                @else
                    <div class="nameSyllabus">Name syllabus</div>
                    <textarea class="textbox" name="name" id="check" cols="95%" rows="1" placeholder="Enter name syllabus" required></textarea>
                @endif

                <div id="nameajax"></div>
                @if($language == "vi")
                    <div class="intended">Kết quả học tập dự định</div>
                @else
                    <div class="intended">Intended Learning Outcomes</div>
                @endif
                <textarea class="textbox" name="text1" id="" cols="95%" rows="5">{{$data['textboxvalue']}}</textarea>

                @if($language == "vi")
                    <div class="outcome">Đánh giá dựa trên kết quả</div>
                @else
                    <div class="outcome">Outcome-based Assessment</div>
                @endif
                <textarea class="textbox" name="text2" id="" cols="95%" rows="5">{{$data['textboxvalue1']}}</textarea>

                @if($language == "vi")
                    <div class="teaching">Dạy và học</div>
                @else
                    <div class="teaching">Teaching and Learning</div>
                @endif

                <textarea class="textbox" name="text3" id="" cols="95%" rows="5">{{$data['textboxvalue2']}}</textarea>

                @if($language == "vi")
                    <input id="checkresult" type="submit" class="btn-warning" value="Xác nhận">
                @else
                    <input id="checkresult" type="submit" class="btn-warning" value="Confirm">
                @endif


            </form>
        </div>
    </div>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#check').keyup(function() {
            let name = $(this).val();
            $.ajax({
                url: 'check',
                method: 'get',
                data: {
                    name: $(this).val()
                },
                success: function(data) {
                    $('#nameajax').html(data);
                    console.log(data);
                    if (data == 'Name already in use.') {
                        $('#checkresult').html('<div class="spinner-border text-danger btn-warning type="submit"></div>');

                        $('#checkresult').prop('disabled', true);
                    } else {
                        $('#checkresult').prop('disabled', false);
                    }
                }
            });
        });
    });
</script>


</html>