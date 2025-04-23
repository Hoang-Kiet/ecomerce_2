<div class="container mt-5">
    <h3>Login Admin Page</h3>
    <?php 
        if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }else if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        }
    
    ?>
    <form action="<?php echo base_url('login-user'); ?>" method="Post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php echo form_error('email'); ?>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            <?php echo form_error('password'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>