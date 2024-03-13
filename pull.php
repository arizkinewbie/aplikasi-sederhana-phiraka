<?php

$output = shell_exec('git pull origin master');
echo "<pre> aplikasi-sederhana status: $output</pre>";

$output2 = shell_exec('cd ../fibonacci-phiraka/ && git pull origin master');
echo "<pre> fibonacci-phiraka status: $output2</pre>";
