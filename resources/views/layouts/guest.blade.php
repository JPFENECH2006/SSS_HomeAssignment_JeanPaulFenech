<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auth</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height:100vh">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
