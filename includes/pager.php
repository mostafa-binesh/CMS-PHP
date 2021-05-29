<ul class="pager">
<?php

for($i = 1;$i <= $page_count;$i++){
    echo "
    <li>
            <a href='index.php?page={$i}'>{$i}</a>
        </li>
    ";
}

?>
</ul>