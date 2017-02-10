<?php
require_once(__DIR__.'/helpers/common.php');
Page::Authorize();
Page::Redirect('/pages/dashboard.php');
