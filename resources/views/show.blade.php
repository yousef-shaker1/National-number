<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #999a9b; /* خلفية خفيفة */
            padding: 20px; /* هامش حول الصفحة */
        }
        .container {
            max-width: 800px; /* تحديد عرض أقصى للصفحة */
        }
        .card {
            margin-bottom: 20px; /* هامش أسفل البطاقة */
        }
        .card-header {
            background-color: #007bff; /* لون خلفية رأس البطاقة */
            color: white; /* لون نص رأس البطاقة */
        }
        .table thead th {
            background-color: #007bff; /* لون خلفية رؤوس الجدول */
            color: white; /* لون نص رؤوس الجدول */
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2; /* لون خلفية الصفوف الفردية في الجدول */
        }
    </style>
    <title>عرض البيانات</title>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">تفاصيل الرقم القومي</h4>
        </div>
        <div class="card-body">
            <label for="number">الرقم القومي</label>
            <input type="text" id="number" class="form-control mb-3" value="{{ $number }}" readonly>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">الخاصية</th>
                        <th scope="col">القيمة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>الرقم القومي:</td>
                        <td>{{ $number }}</td>
                    </tr>
                    <tr>
                        <td>تاريخ الميلاد:</td>
                        <td>
                            {{ $day }}/
                            @if($zeroday == 0)
                                0{{ $month }}
                            @else
                                {{ $month }}
                            @endif
                            @if($first == 2)
                                @if($zero == 0)
                                    /19{{ $zero }}{{ $year }}
                                @else
                                    /19{{ $four }}
                                @endif
                            @elseif($first == 3)
                                @if($zero == 0)
                                    /20{{ $zero }}{{ $year }}
                                @else
                                    /20{{ $four }}
                                @endif
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>كود المحافظة:</td>
                        <td>{{ $Governorate }}</td>
                    </tr>
                    <tr>
                        <td>المحافظة:</td>
                        <td>
                            @switch($Governorate)
                                @case('01') القاهرة @break
                                @case('02') الإسكندرية @break
                                @case('03') بورسعيد @break
                                @case('04') السويس @break
                                @case('11') دمياط @break
                                @case('12') الدقهلية @break
                                @case('13') الشرقية @break
                                @case('14') القليوبية @break
                                @case('15') كفر الشيخ @break
                                @case('16') الغربية @break
                                @case('17') المنوفية @break
                                @case('18') البحيرة @break
                                @case('19') الإسماعيلية @break
                                @case('21') الجيزة @break
                                @case('22') بني سويف @break
                                @case('23') الفيوم @break
                                @case('24') المنيا @break
                                @case('25') أسيوط @break
                                @case('26') سوهاج @break
                                @case('27') قنا @break
                                @case('28') أسوان @break
                                @case('29') الأقصر @break
                                @case('31') البحر الأحمر @break
                                @case('32') الوادي الجديد @break
                                @case('33') مطروح @break
                                @case('34') شمال سيناء @break
                                @case('35') جنوب سيناء @break
                                @default مولود خارج مصر
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <td>النوع:</td>
                        <td>
                            @if($type % 2 == 0)
                                أنثى
                            @else
                                ذكر
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>العمر: </td>
                        <td>
                            <?php
                                $day = $day;
                                $month = $zeroday == 0 ? "0$month" : $month;
                                $year = $first == 2 ? ($zero == 0 ? "19$zero$year" : "19$four") : ($zero == 0 ? "20$zero$year" : "20$four");

                                $birthDate = new DateTime("$year-$month-$day");
                                $today = new DateTime();
                                $interval = $today->diff($birthDate);

                                $years = $interval->y;
                                $months = $interval->m;
                                $days = $interval->d;
                            ?>
                            هو: {{ $years }} سنة، {{ $months }} شهر، {{ $days }} يوم
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
