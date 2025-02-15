<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/styles/registration.css') }}">
    <title>Community Alert | Login</title>
    <style>
        .form-outer-container {
            min-height: 100vh;
            padding: 20px;
        }

        .illustrator-container img {
            width: 100%;
            height: auto;
            max-width: 600px;
            display: block;
            margin: 0 auto;
        }

        .form-wrapper {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
        }

        @media (min-width: 768px) {
            .form-outer-container {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 50px;
                padding: 40px;
            }

            .illustrator-container {
                flex: 1;
                max-width: 600px;
            }

            .form-wrapper {
                flex: 1;
                max-width: 450px;
                padding: 40px;
            }
        }

        @media (max-width: 767px) {
            .illustrator-container {
                margin-bottom: 30px;
            }

            h1 {
                font-size: 1.75rem;
            }

            .form-wrapper {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
<div class="container-fluid form-outer-container">
    <div class="row align-items-center">
        <!-- Illustrator Column -->
        <div class="col-md-6 illustrator-container">
            <img src="{{ asset('/images/Orphanage-amico.png') }}" alt="" class="img-fluid">
        </div>

        <!-- Form Column -->
        <div class="col-md-6">
            <div class="form-wrapper">
                <img src="{{ asset('/images/component.png') }}" alt="" class="img-fluid mb-3" style="max-width: 150px;">

                <h1 class="mb-4">Community Alert Login</h1>

                <form action="" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <div class="invalid-feedback">
                            Please enter your password.
                        </div>
                    </div>

                    <p class="mt-3">Forgot password? <a href="">Reset</a></p>
                    <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                    <p class="mt-3 text-center">You don't have an account? <a href="/registration">Create account</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Existing scripts remain the same -->
<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
