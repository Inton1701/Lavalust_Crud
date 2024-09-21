<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('header.php'); ?>
    <title>User Info</title>
</head>

<body>
    <div class="container">
        <div class="container py-5">
            <h1 class="text-uppercase text-center">user table</h1>
        </div>
        <div class="container mt-3">
            <?php flash_alert(); ?>
            <div class="container my-3">
       
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add User
                        </button>       
            
            </div>
            <table id="usersTable" class="display table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Addresss</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- fetch user data from database -->
                    <?php foreach ($user as $u): ?>
                        <tr>
                            <td class="userID"><?= $u['id'] ?></td>
                            <td><?= $u['aamj_last_name'] ?></td>
                            <td><?= $u['aamj_first_name'] ?></td>
                            <td><?= $u['aamj_email'] ?></td>
                            <td><?= $u['aamj_gender'] ?></td>
                            <td><?= $u['ammj_address'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm btnEdit">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm btnDelete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal -->

    <!-- Modal to add user -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="addUser" name="addUser" action="<?= site_url('user/create'); ?>" method="POST">
                            <div class="row mb-3">
                                <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                            </div>
                            <div class="row mb-3">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                            </div>
                            <div class="row mb-3">
                                <input type="email" class="form-control" placeholder="juandelacruz@example.com" name="email" required>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <select name="gender" id="gender" class="form-select" name="gender">
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <textarea class="form-control" placeholder="Address" name="address" required></textarea>
                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add User</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to Edit user -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="editUser" name="editUser" action="<?= site_url('user/update'); ?>" method="POST">
                            <input type="hidden" id="id" name="id">
                            <div class="row mb-3">
                                <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name" required>
                            </div>
                            <div class="row mb-3">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" required>
                            </div>
                            <div class="row mb-3">
                                <input type="email" class="form-control" placeholder="juandelacruz@example.com" name="email" id="email" required>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <select name="gender" id="genders" class="form-select" name="gender">
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <textarea class="form-control" placeholder="Address" name="address" id="address" required></textarea>
                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Info</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to delete user -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="addUser" name="addUser" action="<?= site_url('user/delete'); ?>" method="POST">
                            <input type="hidden" id="deleteID" name="id">
                            Are you sure you want to delete this user?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script>
    $(document).ready(function() {
            //Setup User Table using DataTable
            $('#usersTable').DataTable({
                responsive: true,
                paging: true,    
                searching: true, 
                info: true        
            });

            //Show Modal and fetch user data to edit user
            $('.btnEdit').on('click', function(e) {
                e.preventDefault();

                var id = $(this).closest('tr').find('.userID').text();
                $.ajax({
                    method: 'GET',
                    url: '<?= site_url('user/fetch_user/') ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(key, value) {
                            $('#id').val(value['id']);
                            $('#last_name').val(value['aamj_last_name']);
                            $('#first_name').val(value['aamj_first_name']);
                            $('#email').val(value['aamj_email']);
                            $('#genders').val(value['aamj_gender']);
                            $('#address').val(value['ammj_address']);
                        });
                        $('#editModal').modal('show');
                    }
                });
            });

            //Show Modal and fetch user data for delete user
            $('.btnDelete').on('click', function(e) {
                e.preventDefault();

                var id = $(this).closest('tr').find('.userID').text();
                $.ajax({
                    method: 'GET',
                    url: '<?= site_url('user/fetch_user/') ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(key, value) {
                            $('#deleteID').val(value['id']);
                        });
                        $('#deleteModal').modal('show');
                    }
                });
            });
        });
    </script>
</body>

</html>