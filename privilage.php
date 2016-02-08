<?php require 'header.php' ?>
<div class="row well">
    <form class="form" id="privillages" method="post" action="privilage_post.php">
        <div class="col-sm-12 form-group">
            <label>Resources</label>
            <select class="form-control" name="employement">
                <option>page1</option>
                <option>page2</option>
                <option>page3</option>
            </select>
        </div>
        <div class="col-sm-12 form-group">
            <div class="col-sm-3 form-group">
                <label>Principal:</label>
            </div>
             <div class="col-sm-2 form-group">
                <input type="checkbox" name="view" value="1"> View<br>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="add" value="1"> Add<br>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="delete" value="1"> Delete<br>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="all" value="1"> All<br>
            </div>
        </div>
        <div class="col-sm-12 form-group">
            <div class="col-sm-3 form-group">
                <label>Teacher:</label>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="view" value="1"> View<br>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="add" value="1"> Add<br>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="delete" value="1"> Delete<br>
            </div>
              <div class="col-sm-2 form-group">
                <input type="checkbox" name="all" value="1"> All<br>
            </div>
        </div>
        <div class="col-sm-12 form-group">
            <div class="col-sm-3 form-group">
                <label>Student:</label>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="view" value="1"> View<br>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="add" value="1"> Add<br>
            </div>
            <div class="col-sm-2 form-group">
                <input type="checkbox" name="delete" value="1"> Delete<br>
            </div>
              <div class="col-sm-2 form-group">
                <input type="checkbox" name="all" value="1"> All<br>
            </div>
        </div>
    </form>
</div>
<?php require 'footer.php' ?>