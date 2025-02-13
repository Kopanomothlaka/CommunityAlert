<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('/styles/registration.css') }}">
    <title>Community Alert | Login</title>
</head>

<body>
<div class="form-outer-container">
    <div class="illustrator-container">
        <img src="{{ asset('/images/Orphanage-amico.png') }}" alt="">
    </div>
    <div class="form-wrapper">
        <img src="{{ asset('/images/component.png') }}" alt="" style="display: inline;">


        <h1>Community Alert Login</h1>


        <form action="" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="input-container mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
            <div class="input-container mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter your password.
                </div>
            </div>
            <p>Forgot password? <a href="">Reset</a></p>
            <button type="submit" class="btn btn-primary">LOGIN</button>
            <p>You don't have an account? <a href="/registration">Create account</a></p>
        </form>

    </div>
</div>

<script>
    (function () {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
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
