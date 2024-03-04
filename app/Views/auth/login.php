<?php echo view('templates/header'); ?>

<div class="container mt-5">

    <h2>FORM LOGIN</h2>
    <hr />
    <div class="col-md-3">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/auth/login'); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nama</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <!-- tambahkan captcha -->
            <div class="mb-3">
                <label for="captcha" class="form-label">Security Image</label>
                <input type="text" class="form-control" name="captcha" id="captcha">
                <img src="<?= base_url('/captcha'); ?>" alt="captcha" class="img-fluid" id="captcha-image" style="width: 200px;" />
                <a href="#" id="refresh-captcha">Refresh</a>
            </div>
            <!-- end captcha -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php echo view('templates/footer'); ?>