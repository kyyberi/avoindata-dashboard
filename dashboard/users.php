<?php

					require_once '/home/avoindat/public_html/qa-include/qa-base.php';

					require_once QA_INCLUDE_DIR.'qa-app-users.php';
	
					if (qa_get_logged_in_userid()===null)
						echo 'not logged in';
					else
						echo qa_get_logged_in_handle().'<BR>'.qa_get_logged_in_email();
				?>
