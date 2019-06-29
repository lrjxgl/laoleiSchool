<?php
$finfo = finfo_open(FILEINFO_MIME_TYPE); // 返回 mime 类型
foreach (glob("*") as $filename) {
    echo $filename.":".finfo_file($finfo, $filename) . "\n";
}
finfo_close($finfo);
?>