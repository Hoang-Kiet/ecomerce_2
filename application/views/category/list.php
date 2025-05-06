<div class="container">
    <div class="card">
        <div class="card-header">
            LIST OF Category
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($categories as $key => $cate) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key+1; ?></th>
                            <td><?php echo $cate['title'] ?></td>
                            <td><?php echo $cate['description'] ?></td>
                            <td>
                                <?php if (!empty($cate['image'])): ?>
                                    <img src="<?php echo base_url('uploads/category/' . $cate['image']); ?>" alt="Image" width="150px" height="100px">
                                <?php else: ?>
                                    No image
                                <?php endif; ?>
                                <!-- -->
                            </td>
                            <td>
                                <?php if ($cate['status'] == 1) {
                                    echo '<span class="badge badge-success">Active</span>';
                                } else {
                                    echo '<span class="badge badge-danger">Inactive</span>';
                                } ?>
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn có muốn xoá sản phẩm này hay không?')" href="<?php echo base_url('brand/category/' . $cate['id']) ?>" class="btn btn-danger">Delete</a>
                                <a href="<?php echo base_url('category/edit/' . $cate['id']) ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>