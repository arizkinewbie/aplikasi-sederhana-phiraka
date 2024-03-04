<!-- app/Views/user/edit.php -->
<?php echo view('templates/header'); ?>

<div class="container mt-5">
    <h2>EDIT USER</h2>
    <hr />
    <div class="col-md-3">
        <form action="<?= base_url('user/update/' . $user['id']); ?>" method="post" class="needs-validation" novalidate>
            <input type="hidden" name="id" value="<?= $user['id']; ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Nama</label>
                <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>" maxlength="128" required>
                <div class="invalid-feedback">Nama tidak boleh kosong dan maksimal 128 karakter.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password </label>
                <input type="password" class="form-control" name="password" id="password" pattern=".{5,8}">
                <div class="invalid-feedback">Password harus diisi 5-8 karakter.</div>
                <span class="form-text">*biarkan kosong jika tidak ingin ubah password</span>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>
        </form>
    </div>
</div>

<?php echo view('templates/footer'); ?>
<script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>