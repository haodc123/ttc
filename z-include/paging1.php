<?php
// Paging 1
							$perPage = 10;
							$gpage = htmlspecialchars(mysql_real_escape_string($_GET['page']));
							$_GET['page'] == '' ? $curPage = 1 : $curPage = $gpage;
							$start = ($curPage - 1) * $perPage;
							if ($curPage == '') $start = 0;
							$end = $start + $perPage - 1;
							// End Paging 1
							
?>