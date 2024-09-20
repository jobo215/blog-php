<?php

include './helpers/SessionHelper.php';

SessionHelper::setUserLoggedOut();
header("Location: ../index.php");