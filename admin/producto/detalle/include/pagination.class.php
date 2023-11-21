<?php
class pagination{
/*
Script Name: *Digg Style Paginator Class
Script URI: http://www.mis-algoritmos.com/2007/05/27/digg-style-pagination-class/
Description: Class in PHP that allows to use a pagination like a digg or sabrosus style.
Script Version: 0.3.3
Author: Victor De la Rocha
Author URI: http://www.mis-algoritmos.com
*/
		/*Valores predeterminados*/
		var $total_pages = -1;//items
		var $limit = null;
		var $target = ""; 
		var $page = 1;
		var $adjacents = 2;
		var $showCounter = false;
		var $className = "pagination";
		var $parameterName = "page";
		var $urlF = false;//urlFriendly

		/*Botones siguientes y anteriores*/
		var $nextT = "Next";
		var $nextI = "&#187;"; //&#9658;
		var $prevT = "Previous";
		var $prevI = "&#171;"; //&#9668;

		/*****/
		var $calculate = false;
		
		#articulos totales
		function items($value){$this->total_pages = (int) $value;}
		
		#Cu�ntos art�culos mostrar por p�gina
		function limit($value){$this->limit = (int) $value;}
		
		#P�gina para enviar el valor de la p�gina.
		function target($value){$this->target = $value;}
		
		#P�gina actual
		function currentPage($value){$this->page = (int) $value;}
		
		#�Cu�ntas p�ginas adyacentes se deben mostrar a cada lado de la p�gina actual?
		function adjacents($value){$this->adjacents = (int) $value;}
		
		#Mostrar contador?
		function showCounter($value=""){$this->showCounter=($value===true)?true:false;}

		#para cambiar el nombre de la clase del div paginaci�n
		function changeClass($value=""){$this->className=$value;}

		function nextLabel($value){$this->nextT = $value;}
		function nextIcon($value){$this->nextI = $value;}
		function prevLabel($value){$this->prevT = $value;}
		function prevIcon($value){$this->prevI = $value;}

		#para cambiar el nombre de la clase del div paginaci�n
		function parameterName($value=""){$this->parameterName=$value;}

		#cambiar url
		function urlFriendly($value="%"){
				if(eregi('^ *$',$value)){
						$this->urlF=false;
						return false;
					}
				$this->urlF=$value;
			}
		
		var $pagination;

		function pagination(){}
		function show(){
				if(!$this->calculate)
					if($this->calculate())
						echo "<div class=\"$this->className\">$this->pagination</div>\n";
			}
		function get_pagenum_link($id){
				if(strpos($this->target,'?')===false)
						if($this->urlF)
								return str_replace($this->urlF,$id,$this->target);
							else
								return "$this->target?$this->parameterName=$id";
					else
						return "$this->target&$this->parameterName=$id";
			}
		
		function calculate(){
				$this->pagination = "";
				$this->calculate == true;
				$error = false;
				if($this->urlF and $this->urlF != '%' and strpos($this->target,$this->urlF)===false){
						//Es necesario especificar el comodin para sustituir
						echo "Especificaste un wildcard para sustituir, pero no existe en el target<br />";
						$error = true;
					}elseif($this->urlF and $this->urlF == '%' and strpos($this->target,$this->urlF)===false){
						echo "Es necesario especificar en el target el comodin % para sustituir el n�mero de p�gina<br />";
						$error = true;
					}

				if($this->total_pages < 0){
						echo "It is necessary to specify the <strong>number of pages</strong> (\$class->items(1000))<br />";
						$error = true;
					}
				if($this->limit == null){
						echo "It is necessary to specify the <strong>limit of items</strong> to show per page (\$class->limit(10))<br />";
						$error = true;
					}
				if($error)return false;
				
				$n = trim($this->nextT.' '.$this->nextI);
				$p = trim($this->prevI.' '.$this->prevT);
				
				/* Configurar vars para la consulta. */
				if($this->page) 
					$start = ($this->page - 1) * $this->limit;//primer elemento para mostrar en esta p�gina
				else
					$start = 0; //si no se da una var de p�gina, establezca el inicio en 0
			
				/* Configurar la p�gina vars para su visualizaci�n. */
				$prev = $this->page - 1;                            //la p�gina anterior es la p�gina - 1
				$next = $this->page + 1;                            //la siguiente p�gina es la p�gina + 1
				$lastpage = ceil($this->total_pages/$this->limit);        //lastpage es = total de p�ginas / art�culos por p�gina, redondeado hacia arriba.
				$lpm1 = $lastpage - 1;                        //�ltima p�gina menos 1
				
				/* 
					Ahora aplicamos nuestras reglas y dibujamos el objeto de paginaci�n.
En realidad, estamos guardando el c�digo en una variable en caso de que queramos dibujarlo m�s de una vez.
				*/
				
				if($lastpage > 1){
						if($this->page){
								//bot�n anterior
								if($this->page > 1)
										$this->pagination .= "<a href=\"".$this->get_pagenum_link($prev)."\"><b>$p</b></a>";
									else
										//$this->pagination .= "d<span class=\"disabled\">$p</span>";
							$this->pagination .= "<a class=\"disabled\"><b>$p</b></a>";
							}
						//p�ginas
						if ($lastpage < 7 + ($this->adjacents * 2)){//No hay suficientes p�ginas para molestarse en romperlo
								for ($counter = 1; $counter <= $lastpage; $counter++){
										if ($counter == $this->page)
												$this->pagination .= "<a class=\"current active\" style='background-color: #1681B5; color: #FFFFFF'>$counter</a>";
											else
												$this->pagination .= "<a href=\"".$this->get_pagenum_link($counter)."\">$counter</a>";
									}
							}
						elseif($lastpage > 5 + ($this->adjacents * 2)){//suficientes p�ginas para ocultar algunos
								//cerca de empezar; solo ocultar p�ginas posteriores
								if($this->page < 1 + ($this->adjacents * 2)){
										for ($counter = 1; $counter < 4 + ($this->adjacents * 2); $counter++){
												if ($counter == $this->page)
														//$this->pagination .= "h<span class=\"current\">$counter</span>";
											$this->pagination .= "<a class=\"current active\" style='background-color: #1681B5; color: #FFFFFF'>$counter</a>";
													else
														$this->pagination .= "<a href=\"".$this->get_pagenum_link($counter)."\">$counter</a>";
											}
										//$this->pagination .= "...r";
									    $this->pagination .= "<a>...</a>";
										$this->pagination .= "<a href=\"".$this->get_pagenum_link($lpm1)."\">$lpm1</a>";
										$this->pagination .= "<a href=\"".$this->get_pagenum_link($lastpage)."\">$lastpage</a>";
									}
								//en medio esconder alg�n frente y otro atr�s
								elseif($lastpage - ($this->adjacents * 2) > $this->page && $this->page > ($this->adjacents * 2)){
										$this->pagination .= "<a href=\"".$this->get_pagenum_link(1)."\">1</a>";
										$this->pagination .= "<a href=\"".$this->get_pagenum_link(2)."\">2</a>";
										$this->pagination .= "<a>...</a>";
										for ($counter = $this->page - $this->adjacents; $counter <= $this->page + $this->adjacents; $counter++)
											if ($counter == $this->page)
													//$this->pagination .= "<span class=\"current\">$counter</span>";
									$this->pagination .= "<a class=\"current\" style='background-color: #1681B5; color: #FFFFFF'>$counter</a>";
												else
													$this->pagination .= "<a href=\"".$this->get_pagenum_link($counter)."\">$counter</a>";
										$this->pagination .= "<a>...</a>";
										$this->pagination .= "<a href=\"".$this->get_pagenum_link($lpm1)."\">$lpm1</a>";
										$this->pagination .= "<a href=\"".$this->get_pagenum_link($lastpage)."\">$lastpage</a>";
									}
								//cerca de fin solo ocultar las primeras p�ginas
								else{
										$this->pagination .= "<a href=\"".$this->get_pagenum_link(1)."\">1</a>";
										$this->pagination .= "<a href=\"".$this->get_pagenum_link(2)."\">2</a>";
										$this->pagination .= "<a>...</a>";
										for ($counter = $lastpage - (2 + ($this->adjacents * 2)); $counter <= $lastpage; $counter++)
											if ($counter == $this->page)
													//$this->pagination .= "<span class=\"current\">$counter</span>";
									$this->pagination .= "<a class=\"current\" style='background-color: #1681B5; color: #FFFFFF'>$counter</a>";
												else
													$this->pagination .= "<a href=\"".$this->get_pagenum_link($counter)."\">$counter</a>";
									}
							}
						if($this->page){
								//bot�n siguiente
								if ($this->page < $counter - 1)
										$this->pagination .= "<a href=\"".$this->get_pagenum_link($next)."\"><b>$n</b></a>";
									else
										//$this->pagination .= "<span class=\"disabled\">$n</span>";
							$this->pagination .= "<a class=\"disabled\">$n</a>";
									if($this->showCounter)$this->pagination .= "<div class=\"pagination_data\">($this->total_pages Pages)</div>";
							}
					}

				return true;
			}
	}
?>