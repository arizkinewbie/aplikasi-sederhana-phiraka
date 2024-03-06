<?php echo view('templates/header'); ?>

<div class="container mt-5">
    <h2>FORM LOGIN</h2>
    <hr />
    <div class="col-md-4">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/auth/login'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nama</label>
                <input type="text" class="form-control" name="username" id="username" autocomplete="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="current-password" required>
            </div>
            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="6LcH2IspAAAAACoPhE-cWlpcCBJeOgnoC2pm1Tim">
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php echo view('templates/footer'); ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>