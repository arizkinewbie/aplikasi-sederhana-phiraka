<?php echo view('templates/header'); ?>

<div class="container mt-5">
    <h2>FORM LOGIN</h2>
    <hr />
    <div class="col-md-4">
        <div class="alert" role="alert" style="display: none;">
        </div>
        <form id="loginForm" action="<?= base_url('/auth/login'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nama</label>
                <input type="text" class="form-control" name="username" id="username" autocomplete="username" required>
            </div>
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="current-password" required>
                <i toggle="#password" class="bi bi-eye-fill toggle-password position-absolute" style="top: 70%; right: 15px; transform: translateY(-50%); cursor: pointer;"></i>
            </div>
            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="6LcH2IspAAAAACoPhE-cWlpcCBJeOgnoC2pm1Tim" required>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php echo view('templates/footer'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const loginForm = document.getElementById("loginForm");
        const alertBox = document.querySelector('.alert');
        loginForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alertBox.className = 'alert';
                    alertBox.style.display = 'block';
                    alertBox.innerHTML = data.message;
                    if (data.status === 'success') {
                        alertBox.classList.add('alert-success');
                        window.location.href = data.redirect;
                    } else {
                        alertBox.classList.add('alert-danger');
                        grecaptcha.reset();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alertBox.className = 'alert alert-danger';
                    alertBox.style.display = 'block';
                    alertBox.innerHTML = 'Terjadi kesalahan, silakan coba lagi.';
                });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.toggle-password').addEventListener('click', function(e) {
            const target = e.target.getAttribute("toggle");
            const input = document.querySelector(target);
            if (input.type === "password") {
                input.type = "text";
                e.target.classList.remove('bi-eye-fill');
                e.target.classList.add('bi-eye-slash-fill');
            } else {
                input.type = "password";
                e.target.classList.remove('bi-eye-slash-fill');
                e.target.classList.add('bi-eye-fill');
            }
        });
    });
</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>