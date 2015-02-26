    <?php 
    
        require 'classes/functions.php';
        include 'includes/header.php';
            
     ?> 
                
                
                <div class="row main">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <strong class="">Login</strong>

                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                <div class="form-group">
                                    <div class="col-md-offset-4">
                                        <label class="radio-inline"> <input type="radio" name="staff" id="admin" value="admin" checked="" /> Admin </label>
                                        <label class="radio-inline"> <input type="radio" name="staff" id="teacher" value="teacher" /> Teacher </label>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Id</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputEmail3" name="email" placeholder="Admin ID or Teacher ID" required="" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputPassword3" name="password" placeholder="Password" required="" type="password" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <div class="checkbox">
                                                <label class="">
                                                    <input class="" type="checkbox" />Remember me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-signin">Sign
                                                in</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
    <?php include 'includes/footer.php'; ?>