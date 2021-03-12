<?php
include 'inti.php';
$pagetitle = 'hehe';
?>
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Days
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <label  class="dropdown-item" value="1" style="display: block; margin:5px"> <input  class="dropdown-item" type="checkbox"> Sunday</label>
        <label  class="dropdown-item" value="1" style="display: block; margin:5px"> <input  class="dropdown-item" type="checkbox"> Monday</label>
        <label  class="dropdown-item" value="1" style="display: block;margin:5px"> <input  class="dropdown-item" type="checkbox"> Tuesday</label>
        <label  class="dropdown-item" value="1" style="display: block;margin:5px"> <input  class="dropdown-item" type="checkbox"> Wednesday</label>
        <label  class="dropdown-item" value="1" style="display: block;margin:5px"> <input  class="dropdown-item" type="checkbox"> Thursday</label>
        <label  class="dropdown-item" value="1" style="display: block;margin:5px"> <input  class="dropdown-item" type="checkbox"> Friday</label>
        <label  class="dropdown-item" value="1" style="display: block;margin:5px"> <input   class="dropdown-item" type="checkbox"> Saturday</label>
    </div>
</div>
<?php
include 'footer.php';
?>