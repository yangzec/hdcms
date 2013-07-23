<?php
class AppStartEvent extends Event
{
    public function run(&$options)
    {
        define("SESSION_NAME", session_name());
        define("SESSION_ID", session_id());
    }
}

?>