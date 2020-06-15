<?php

  function remove_session()
  { session_start();
    unset($_SESSION);
    session_destroy();
    session_reset();
  }
