<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استعلام الرقم القومي</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/image/img.jpg'); /* مسار الصورة */
            background-size: cover; /* تملأ الصورة الصفحة بالكامل */
            background-position: center; /* مركز الصورة في الخلفية */
            background-repeat: no-repeat; /* عدم تكرار الصورة */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .card {
            background: rgba(255, 255, 255, 0.8); /* زيادة الشفافية */
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* زيادة ظل البطاقة */
            padding: 20px;
        }
        .card-header {
            border-bottom: 0;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.9); /* خلفية شفافة للحقل */
        }
        .alert-warning {
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 500px;
        }
        .container {
            min-height: 200px; /* ضمان ارتفاع كافٍ للنموذج */
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- رسالة التحذير -->
        <div class="alert alert-warning" role="alert">
            <strong>ملحوظة</strong> رقمك القومي لا يتم حفظه فلا تقلق!
        </div>
        <!-- نموذج الاستعلام -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">استعلام الرقم القومي</h4>
                    </div>
                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('inquiry') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="number">ادخل الرقم القومي</label>
                                <input type="text" id="number" name="number" class="form-control" placeholder="رقمك القومي">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">استعلام</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
