<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Trait & Services</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .nav-link {
            font-weight: 500;
        }

        .card {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel Dashboard</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light">
                <h5 class="mb-0 text-center">Trait & Service Links</h5>
            </div>
            <div class="card-body text-center">
                <div class="d-grid gap-3">
                    <a href="{{ url('sayhello') }}" class="btn btn-outline-primary">
                        <i class="bi bi-chat-left-text"></i> Trait Hello
                    </a>
                    <a href="{{ url('getCode') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-code-slash"></i> Trait Code
                    </a>
                    <a href="{{ url('say-hello') }}" class="btn btn-outline-success">
                        <i class="bi bi-person-lines-fill"></i> Service Hello
                    </a>
                    <a href="{{ url('get-code') }}" class="btn btn-outline-warning">
                        <i class="bi bi-terminal"></i> Service Code
                    </a>
                    <a href="{{ url('image') }}" class="btn btn-outline-dark">
                        <i class="bi bi-image"></i> Trait Image
                    </a>
                    <a href="{{ url('format-date') }}" class="btn btn-outline-secondary">
                        Trait Format Date
                    </a>
                    <a href="{{ url('post') }}" class="btn btn-outline-warning">
                        Trait Post
                    </a>
                    <a href="{{ url('/users/create') }}" class="btn btn-outline-success">
                        Service User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
