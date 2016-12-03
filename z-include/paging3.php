<?php
$qsort2 = explode('&page', $url2);
					$prevPage = $curPage - 1;
					$nextPage = $curPage + 1;
					echo 'Trang &nbsp; &nbsp;';
                    if ($prevPage > 0) echo '<a class="out" href="'.$qsort2[0].'&page='.$prevPage.'">Trước</a>&nbsp;&nbsp;&nbsp;';
					for ($i = 1; $i <= $totalPage; $i++)
                    {
                        if ($curPage == $i || ($curPage == '' && $i == 1))
						{
							if ($i == $totalPage) 
								echo '<u><a class="current" href="'.$qsort2[0].'&page='.$i.'">'.$i.'</a></u> ';
							else
								echo '<u><a class="current" href="'.$qsort2[0].'&page='.$i.'">'.$i.'</a></u> | ';
						}
						else
						{
							if ($i == $totalPage) 
								echo '<a href="'.$qsort2[0].'&page='.$i.'">'.$i.'</a> ';
							else
								echo '<a href="'.$qsort2[0].'&page='.$i.'">'.$i.'</a> | ';
						}
                    }
					if ($nextPage <= $totalPage) echo '&nbsp;&nbsp;&nbsp;<a class="out" href="'.$qsort2[0].'&page='.$nextPage.'">Sau</a>';
					
?>