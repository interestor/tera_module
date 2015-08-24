
<?php
//var_dump($_POST);
//echo 'Hello World!!';
?>

<html>
	<head>
		<title>Tera Module Simulation</title>
		<link rel="stylesheet" type="text/css" href="hex.css" media="all">
	</head>
	<body>
		<h1>Tera Module Simulation</h1>
		<div id="left_box" style="float:left;">
			<form action="./main2.php" method="post">
				<?php
				/////////////////////////////////////////////////////////
				//セレクトボックスを作ります
				//
				////////////////////////////////////////////////////////
					$selected_hex = $_POST;
					$make_select_box = 20;
					$make_select_list = Array(
						"設定なし",
						"エビ",
						"植物",
						"ポンプ",
						"ソーラー",
						"きのこ"
					);
					for( $i_box=0; $i_box<$make_select_box; $i_box++)
					{
						echo $i_box+1;
						$add_i_box = $i_box+1;
						echo "<select name='{$add_i_box}' style='clear:both;'>";
						for( $i_line=0; $i_line<count($make_select_list); $i_line++)
						{
							if ($selected_hex[$i_box+1] === $make_select_list[$i_line])
							{
								echo "<option value='{$make_select_list[$i_line]}' selected>";
							} else
							{
								echo "<option value='{$make_select_list[$i_line]}'>";
							}

							echo $make_select_list[$i_line];
							echo "</option>";
						}
						echo "</select><br>";
					}
					///////////////////////////////////////////////////
				?>
				<input type="submit" name="submit" value="送信" />
			</form>
		</div>
		<div id="center_box" style="float:left;">
		<?php
		///////////////////////////////////////////////////
		//六角形モジュールをつくります
		//
		//////////////////////////////////////////////////
		include 'element_include.php';

		$selected_hex = $_POST;
		$horizontal_hex_num_master = 4;
		$vartical_hex_num_master = 5;
		$line_num = 1;

		$horizontal_hex_num = $horizontal_hex_num_master;
		$vartical_hex_num = $vartical_hex_num_master;


		echo "<div id='{$line_num}_hex_line' style='clear:both;'>";
		foreach($selected_hex as $hex_key => $hex_value)
		{

			//echo $hex_key;//これが六角形ナンバー
			//echo $hex_value;//これが六角形に入れられた要素
			if($horizontal_hex_num === 0)
			{
				$horizontal_hex_num = $horizontal_hex_num_master;
				$line_num = $line_num +1;
				$vartical_hex_num = $vartical_hex_num -1;
				echo "</div>";
				echo "<div id='{$line_num}_hex_line' style='clear:both;'>";

				if(($vartical_hex_num % 2) == 0)
				{
					echo "<div  class='margin' style='float:left;' >
				</div>";
				}
			}

			if( $hex_key != "submit")
			{

				echo "<div class='hexagon' style='float:left; ";
				if($hex_value != "設定なし")
				{
					echo 'background-image:url("./img/';
					echo $hex_value;
					echo '.jpg");';

				}
				echo "'>";
				echo "<span style='position: absolute; z-index : 10;'>";
				echo $hex_key;
				echo "</span>";
				echo "<div class='hexTop'></div>";
				echo "<div class='hexBottom'></div>";

				echo "<div id='triangle_line' style='clear:both; position: absolute;'>";

				var_dump($block_comfig[$hex_value][input][0]);
				//右上矢印作成
				echo "<div class='triangle_upper_right' style='float:left; background-image: url";
				//右上矢印が有効かチェック
				if($block_comfig[$hex_value][input][0] === $block_comfig[$selected_hex[$block_connect[$hex_key][1]]][output])
				{
					echo "(./img/active_right.gif);";
				}
				echo "'></div>";

				//左下矢印作成
				echo "<div class='triangle_left_lower' style='float:left; background-image: url";
				//左下矢印が有効かチェック
				if($block_comfig[$hex_value][output][0] === $block_comfig[$selected_hex[$block_connect[$hex_key][1]]][input][0])
				{
					echo "(./img/active_left.gif);";
				}
				echo "'></div>";

				//右下矢印作成
				echo "<div class='triangle_right_lower' style='float:left; background-image: url";
				//右下矢印が有効かチェック
				if($block_comfig[$hex_value][output][0] === $block_comfig[$selected_hex[$block_connect[$hex_key][2]]][input][0])
				{
					echo "(./img/active_right.gif);";
				}
				echo "'></div>";

				//左上矢印作成
				echo "<div class='triangle_upper_left' style='float:left; background-image: url";
				//左上矢印が有効かチェック
				if($block_comfig[$hex_value][input][0] === $block_comfig[$selected_hex[$block_connect[$hex_key][2]]][output][0])
				{
					echo "(./img/active_left.gif);";
				}
				echo "'></div>";

				echo "</div>";
				echo "</div>";

				//右矢印作成
				echo "<div class='triangle_right' style='float:left; background-image: url";
				//右矢印が有効かチェック
				if($block_comfig[$hex_value][output][0] === $block_comfig[$selected_hex[$block_connect[$hex_key][0]]][input][0])
				{
					echo "(./img/active_right.gif);";
				}
				echo "'></div>";

				//左矢印作成
				echo "<div class='triangle_left' style='float:left; background-image: url";
				//左矢印が有効かチェック
				if($block_comfig[$hex_value][input][0] === $block_comfig[$selected_hex[$block_connect[$hex_key][0]]][output][0])
				{
					echo "(./img/active_left.gif);";
				}
				echo "'></div>";
			}
			$horizontal_hex_num = $horizontal_hex_num -1;
		}

		///////////////////////////////////////////////////
		?>
			<!--div id='1st_line' style='clear:both;'>
				<div class='hexagon' style='float:left;
											background-image: url(./img/ebi.jpg);'>
					<span style='position: absolute; z-index : 10;'>
						　　　1
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>

				<div class='hexagon' style='float:left; background-image: url(./img/エビ.jpg);'>
					<span style='position: absolute; z-index : 10;'>
						　　　2
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　3
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　4
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
			</div>
			<div id='2nd_line' style='clear:both;' >
				<div  class='margin' style='float:left;' >
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　5
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　6
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　7
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　8
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
			</div>
			<div id='3rd_line' style='clear:both;' >

				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　9
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　10
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　11
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　12
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
			</div>
			<div id='4th_line' style='clear:both;' >
				<div  class='margin' style='float:left;' >
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　13
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　14
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　15
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　	16
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
			</div>
			<div id='5th_line' style='clear:both;' >

				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　17
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　18
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　19
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
				<div class='hexagon' style='float:left;'>
					<span style='position: absolute; z-index : 10;'>
						　　　20
					</span>
					<div class='hexTop'></div>
					<div class='hexBottom'></div>
				</div>
			</div-->
		</div><!--end center_box-->
		<div id='right_box' style='float:left;'>
		</div>
	</body>
</html>
