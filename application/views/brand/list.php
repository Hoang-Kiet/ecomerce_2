<div class="container">
    <div class="card">
        <div class="card-header">
            LIST OF BRANDS
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
                    foreach ($brands as $key => $bra) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key; ?></th>
                            <td><?php echo $bra['title'] ?></td>
                            <td><?php echo $bra['description'] ?></td>
                            <td>
                                <?php if (!empty($bra['image'])): ?>
                                    <img src="<?php echo base_url('uploads/brand/'.$bra['image']); ?>" alt="Image" width="150px" height="100px">
                                <?php else: ?>
                                    No image
                                <?php endif; ?>
                                <!-- -->
                            </td>
                            <td>
                                <?php if ($bra['status'] == 1){
                                    echo '<span class="badge badge-success">Active</span>';
                                } else {
                                    echo '<span class="badge badge-danger">Inactive</span>';
                                } ?>
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn có muốn xoá sản phẩm này hay không?')" href="<?php echo base_url('brand/delete/'.$bra['id'])?>" class="btn btn-danger">Delete</a>
                                <a href="<?php echo base_url('brand/edit/'.$bra['id'])?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>