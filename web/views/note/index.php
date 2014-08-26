<hr/>
<h1>Note</h1>

<form method="post" action="<?php echo URL; ?>note/create/">
    <label>Title</label><input type="text" name="title"/><br/>
    <label>Content</label><textarea name="content"></textarea><br/>
    <label>&nbsp;</label><input type="submit" />
</form>

<hr/>
<br/>

<table>
<?php
    foreach ($this->noteList as $key => $value){
        echo '<tr>';
        echo '<td>' . $value['title'] . '</td>';
        echo '<td>' . $value['date_added'] . '</td>';
        echo '<td><a class="edit" href="' . URL . 'note/edit/' . $value['noteid'] . '" >Edit</td>';
        echo '<td><a class="delete" href="' . URL . 'note/delete/' . $value['noteid'] . '" >Delete</td>';
        echo '<tr/>';
    }
    //print_r( $this->userList);
?>
</table>

<script>
$(function() {

    $('.delete').click(function(e) {
        // e.preventDefault();

        var c = confirm("are you sure you want to delete?");
        if ( c == false ) return false;
        });
    }

});
</script>