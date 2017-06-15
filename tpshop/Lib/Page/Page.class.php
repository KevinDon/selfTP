<?php 
	namespace Lib\Page;
	class Page {
		/**
		 * [getPage description]
		 * @AuthorHTL
		 * @DateTime  2017-06-13T10:10:35+0800
		 * @param     [string]                   $controllerPath [控制器的路径]
		 * @param     [int]                   $pageCount      [总共多少个]
		 * @param     integer                  $pageSize       [每页显示多少个]
		 * @return    [string]                                   [分页的HTML代码]
		 */
		public function getPage($controllerPath,$Count, $pageSize=5){
			//计算出总共多少页？
			$page = ceil($Count/ $pageSize);
			$htmlStr = "<table  width='100%'>
                   				<tr>
                   				<td style='text-align: center;'>";
			for ($i = 1; $i <= $page; $i++) { 
				$htmlStr .="<a href=". ROOT . $controllerPath . "/page/$i >$i</a>";
				//showBug($htmlStr);
			}
			return $htmlStr .=   "</td>
					       </tr>
					       </table>";
		}
	}

 ?>