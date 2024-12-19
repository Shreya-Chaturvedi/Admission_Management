<?php
// Include your database connection
 // Update this path as per your project

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $short_name = $_POST['short_name'] ?? '';
    $logo = $_FILES['img']['name'] ? 'uploads/' . $_FILES['img']['name'] : $_settings->info('logo');
    $cover = $_FILES['cover']['name'] ? 'uploads/' . $_FILES['cover']['name'] : $_settings->info('cover');

    // Handle file uploads
    if ($_FILES['img']['tmp_name']) {
        move_uploaded_file($_FILES['img']['tmp_name'], $logo);
    }
    if ($_FILES['cover']['tmp_name']) {
        move_uploaded_file($_FILES['cover']['tmp_name'], $cover);
    }

    // Update the database
    $stmt = $conn->prepare("UPDATE system_settings SET name = ?, short_name = ?, logo = ?, cover = ? WHERE id = 1");
    $stmt->bind_param('ssss', $name, $short_name, $logo, $cover);
    if ($stmt->execute()) {
        $_settings->set_flashdata('success', 'System Information updated successfully.');
    } else {
        $_settings->set_flashdata('error', 'Failed to update System Information.');
    }

    header("Location: index.php");
    exit();
}
?>

<!-- Remaining HTML and JavaScript -->
<?php if ($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
</script>
<?php elseif ($_settings->chk_flashdata('error')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('error') ?>", 'error');
</script>
<?php endif; ?>

<style>
    img#cimg {
        height: 15vh;
        width: 15vh;
        object-fit: scale-down;
        border-radius: 100%;
    }
    img#cimg2 {
        height: 50vh;
        width: 100%;
        object-fit: contain;
    }
</style>
<div class="col-lg-12">
    <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
            <h5 class="card-title">System Information</h5>
        </div>
        <div class="card-body">
            <form action="" id="system-frm" method="POST" enctype="multipart/form-data">
                <div id="msg" class="form-group"></div>
                <div class="form-group">
                    <label for="name" class="control-label">System Name</label>
                    <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?php echo htmlspecialchars($_settings->info('name')); ?>">
                </div>
                <div class="form-group">
                    <label for="short_name" class="control-label">System Short Name</label>
                    <input type="text" class="form-control form-control-sm" name="short_name" id="short_name" value="<?php echo htmlspecialchars($_settings->info('short_name')); ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">System Logo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this, $(this))">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image($_settings->info('logo')); ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
                </div>
                <!-- <div class="form-group">
                    <label for="" class="control-label">Cover</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile" name="cover" onchange="displayImg2(this, $(this))">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div> -->
                <!-- <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image($_settings->info('cover')); ?>" alt="" id="cimg2" class="img-fluid img-thumbnail bg-gradient-dark border-dark">
                </div> -->
                <div class="row">
                    <button class="btn btn-sm btn-primary" form="system-frm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function displayImg(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
                _this.siblings('.custom-file-label').html(input.files[0].name);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function displayImg2(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                _this.siblings('.custom-file-label').html(input.files[0].name);
                $('#cimg2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
