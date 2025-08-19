<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Upload</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 600px;
            margin: auto;
        }

        #preview {
            max-height: 300px;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Upload Image</h5>
            </div>
            <div class="card-body">
                <!-- Laravel Flash Messages -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Image Upload Form -->
                <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="image" class="form-label">Choose an image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" accept="image/*" onchange="previewImage(event)">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 text-center">
                        <img id="preview" src="#" alt="Image Preview"
                            class="img-fluid rounded shadow-sm d-none">
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-upload"></i> Upload
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Image Preview Script -->
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            } else {
                preview.src = '#';
                preview.classList.add('d-none');
            }
        }
    </script>

</body>

</html>
