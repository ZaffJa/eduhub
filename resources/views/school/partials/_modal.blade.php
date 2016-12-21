<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content card">
            <div class="card-header modal-header" style="padding:35px 50px;" data-background-color="red">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Edit School Info</h4>
            </div>
            <form role="form">
                <div class="card-content" >

                    <div class="form-group">
                        <label for="usrname"> Username</label>
                        <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="psw"> Password</label>
                        <input type="text" class="form-control" id="psw" placeholder="Enter password">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" checked>Remember me</label>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger btn-round pull-left" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-success btn-round pull-left"><span class="glyphicon glyphicon-off"></span> Submit</button>

                </div>
            </form>
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script>
