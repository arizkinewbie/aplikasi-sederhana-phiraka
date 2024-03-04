<?php echo view('templates/header'); ?>

<div class="container mt-5">
    <h2>DAFTAR USER</h2>
    <hr />
    <a href="<?= base_url('user/add'); ?>" class="btn btn-primary mb-3">Tambah User Baru</a>
    <table id="usersTable" class="table table-striped" style="width:100%">
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
                        <a href="<?= base_url('user/edit/' . $user['id']); ?>" class="btn btn-success">Edit</a>
                        <a href="<?= base_url('user/delete/' . $user['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
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
</script>