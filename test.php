<?php
function Counter()
{
    static $call_count = 0;
    array($call_count++);
    echo "This function has been called $call_count times,";
}
Counter();
Counter();
Counter();
