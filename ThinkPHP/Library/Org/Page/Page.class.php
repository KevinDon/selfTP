<?php 
	namespace Org\Page;
	class Page {
		public function getPage($pageCount, $pageSize=5){
			//计算出总共多少页？
			$page = ceil($pageCount/ $pageSize);
			$htmlStr = "<table  width='100%'>
                   				<tr>
                   				<td style='text-align: center;'>";
			for ($i = 1; $i <= $page; $i++) { 
				$htmlStr .="<a href=". ROOT . "index.php/Admin/Products/index/page/$i >$i</a>";
			}
			return $htmlStr .=   "</td>
					       </tr>
					       </table>";
		}
	}

 ?>