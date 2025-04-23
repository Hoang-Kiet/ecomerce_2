<div class="container">
    <div class="card">
        <div class="card-header">
            EDIT BRAND
        </div>
        <div class="card-body">
            <?php
            if ($this->session->flashdata('success')) {
            ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php
            } elseif ($this->session->flashdata('error')) {
            ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php
            }
            ?>
            <form action="<?php echo base_url('brand/update/' . $brands['id']) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="title" value="<?php echo $brands['title'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger"><?php echo form_error('title'); ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" name="slug" value="<?php echo $brands['slug'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="text-danger"><?php echo form_error('slug'); ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description" value="<?php echo $brands['description'] ?>" class="form-control" id="exampleInputPassword1">
                    <span class="text-danger"><?php echo form_error('description') ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleInputPassword1">
                    <img src="<?php echo base_url('uploads/brand/' . $brands['image']); ?>" alt="Image" width="150px" height="100px">
                    <small class="text-danger"><?php if (isset($error)) {
                                                    echo $error;
                                                } ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <?php if ($bra['status'] == 1) {
                        ?>
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        <?php echo '<span class="badge badge-success">Active</span>';
                        } else {
                        ?>
                            <option value="1">Active</option>
                            <option selected value="0">Inactive</option>
                        <?php
                            echo '<span class="badge badge-danger">Inactive</span>';
                        } ?>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>