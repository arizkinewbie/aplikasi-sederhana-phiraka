<?php echo view('templates/header'); ?>

<div class="container mt-5">
    <h2>DAFTAR USER <a href="#" class="btn btn-danger float-end logout">Logout</a>
    </h2>
    <hr />
    <a href="<?= base_url('user/add'); ?>" class="btn btn-primary mb-3">Tambah User Baru</a>
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success col-md-3" role="alert">
            <?= session()->getFlashdata('msg'); ?>
        </div>
    <?php endif; ?>
    <table id="usersTable" class="table table-striped table-bordered display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Ctime</th>
                <th>Fungsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user) : ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['CreateTime']; ?></td>
                    <td>
                        <a href="<?= base_url('user/edit/' . $user['id']); ?>" class="btn btn-success">Edit </a> |
                        <a href="#" class="btn btn-danger delete-user" data-id="<?= $user['id']; ?>" data-username=" <?= $user['username']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php echo view('templates/footer'); ?>
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            "scrollX": true,
            "scrollCollapse": true,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [1, 'asc']
            ]
        }).on('order.dt search.dt', function() {
            let i = 1;
            $('#usersTable').DataTable().rows({
                search: 'applied'
            }).nodes().each(function(cell, index) {
                cell.getElementsByTagName('td')[0].innerHTML = i++;
            });
        }).draw();
    });

    document.querySelectorAll('.delete-user').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-id');
            const userName = this.getAttribute('data-username');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "User " + userName + " akan dihapus dari database!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus User!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `<?= base_url('user/delete/'); ?>${userId}`;
                }
            });
        });
    });

    document.querySelectorAll('.logout').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'LOGOUT BERHASIL',
                html: 'Anda akan logout dalam 3 detik...',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false,
                willClose: () => {
                    window.location.href = '<?= base_url('auth/logout'); ?>';
                }
            });
        });
    });
</script>