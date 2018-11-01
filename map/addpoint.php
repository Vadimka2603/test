
<style>
*:focus {outline: none;}

body {font: 14px/21px "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif;}

.addp h2, .addp label {font-family:Georgia, Times, "Times New Roman", serif;}

.form_hint, .required_notification {font-size: 11px;}

.addp ul {
 width:400px;
 list-style-type:none;
 list-style-position:outside;
 margin:35px;
 padding:0px;
}
.addp li{
 padding:12px;
 border-bottom:1px solid #eee;
 position:relative;
}

/*Линия между вначале и вконце формы*/

.addp li:first-child {
 border-bottom:1px solid #777;
}

/*Заголовок формы*/
.addp h2 {
 margin:0;
 display: inline;
}
.required_notification {
 color:#d45252;
 margin:5px 0 0 0;
 display:inline;
 float:right;
}


/*Элементы input */
.addp label {
 width:150px;
 margin-top: 3px;
 display:inline-block;
 float:left;
 padding:3px;
}
.addp input, select, .f {
 height:20px;
 width:220px;
 padding:1px 8px;
}
.addp textarea {padding:8px; width:300px;}
#apoint {margin-left:400px;}


/*Свечение на селекта*/

.addp input, .addp select {
 border:1px solid #aaa;
 box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
 border-radius:2px;
}
.addp input:focus, .addp select:focus {
 background: #fff;
 border:1px solid #555;
 box-shadow: 0 0 3px #aaa;
}

.addp input:focus, .addp select:focus { /* add this to the already existing style */
 padding-right:0px;
}

 .addp input, .addp select { /* add this to the already existing style */
 -moz-transition: padding .25s;
 -webkit-transition: padding .25s;
 -o-transition: padding .25s;
 transition: padding .25s;
}

.addp input, .addp textarea {
 padding-right:15px;
}

input:required {
 background: #fff url(../images/invalid.png) no-repeat 98% center;
 background-size: 15px;

}
::-webkit-validation-bubble-message {
 padding: 1em;
}

.addp input:focus:invalid { /* when a field is considered invalid by the browser */
 background: #fff url(../images/invalid.png) no-repeat 98% center;
 background-size: 15px;
 box-shadow: 0 0 5px #d45252;
 border-color: #b03535
}

.addp input:required:valid { /* when a field is considered valid by the browser */
 background: #fff;
 background-size: 15px;
 box-shadow: 0 0 5px #5cd053;
 border-color: #28921f;
}


.addp input[type="file"].f3 {
	height: 35px;
}
.dd-container {
    position: relative;
    margin-left: 150px;
}
.demo-content {
    font-size: 12px;
}

.dd-select {
    border-radius: 2px;
    border: solid 1px #ccc;
    position: relative;
    cursor: pointer;
}

.dd-options {
    border: solid 1px #ccc;
        border-top-width: 1px;
        border-top-style: solid;
        border-top-color: rgb(204, 204, 204);
    border-top: none;
    list-style: none;
    box-shadow: 0px 1px 5px #ddd;
    display: none;
    position: absolute;
    z-index: 2000;
    margin: 0;
    padding: 0;
    background: #fff;
    overflow: auto;
}

.dd-container li {
	padding: 0px;
	border-bottom: 0px solid #777;
}
.dd-container ul {
 	margin:0px;
 	padding:0px;
}

.dd-container label {
width: unset;
margin-top: unset;
display: unset;
float: unset;
padding: unset;
}

.dd-container img {

}

.dd-container a {
	padding: 10px;
    display: block;
    border-bottom: solid 1px #ddd;
    overflow: hidden;
    text-decoration: none;
    color: #333;
    cursor: pointer;
    -webkit-transition: all 0.25s ease-in-out;
    -moz-transition: all 0.25s ease-in-out;
    -o-transition: all 0.25s ease-in-out;
    -ms-transition: all 0.25s ease-in-out;
}

#selmimg {
	width: 35px;
	height: 35px;
	position: absolute;
	margin-left: 400px;
	margin-top: -30px;
}
#selmimg img {
	width: 100%;
	height: 100%;
}



-webkit-file-upload-button {
  float: right; position: relative; top: -1px; right: -1px;}

</style>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>



<?php
    function get_map_obj($table){
        //$dbuser = "mapper";
        //$dbpass = "qwerty";
        $dbuser = "postgres";
    	$dbpass = "kf,fnfvbz";
        $dbuser = "postgres";
        $dbpass = "kf,fnfvbz";
        $db = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass);
        $query = $db->prepare("SELECT * FROM m_preset");

        //$query = $db->prepare("SELECT * FROM :table ORDER BY id");
        //$values = ['table'=>$v];
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    $res = get_map_obj("tt");

?>

<form class="addp" action="" method="" name="addp">
	<ul>
		<li>
			<h2>Add Point</h2>
			<span class="required_notification">* Denotes Required Field</span>
		</li>
		<li>
			<label for="m_name">Наименование:</label>
			<input type="text" name="m_name" required>
		</li>
		<li>
			<label for="m_coords">Координаты:</label>
			<input id="mcoord" type="text" name="m_coords" required>
		</li>
		<li>
			<label for="m_link">Полная Ссылка:</label>
			<input type="text" name="m_link" required>
		</li>
		<li>
			<label for="m_linkname">Ссылка:</label>
			<input type="text" name="m_linkname" required>
		</li>
		<li>
			<label for="m_contacts">Контакты:</label>
			<input type="text" name="m_contacts" required>
		</li>
		<li>
			<label for="m_info">ИНФО:</label>
			<input type="text" name="m_info" required>
		</li>
		<li>
			<label for="m_preset">Иконка:</label>
			<select id="selm" name="m_preset">
				<option value="0" style="background-image: #fff url(valid.png) no-repeat 98% center;">---Image Type---</option>
				<?php
					$preset = get_map_obj("tt");
					foreach ($preset as $col) {
						echo '<option data-path="'.$col['p_img'].'" value="'.$col['id'].'">'.$col['p_link'].'</option>';
					 	# code...
					 } 
				?>
			</select>
			<div id="selmimg"><img src="/images/znaki_oven.png" /></div>
		</li>


            <div class="clearfix">
            </div>
            <div id="result"></div>
	</ul>
</form>
<button id="apoint" class="submit" name="addpoi">Добавить</button>
<script type="text/javascript">
	$(document).ready(function(){
	$('#selm').change(function(){
		$('#selmimg').find('img:first').attr('src', $('#selm option:selected').attr('data-path'));
		$('#apoint').click(function() {
			var mname = $('input:text[name=m_name]').val();
			var mcoords = $('input:text[name=m_coords]').val();
			var mlink = $('input:text[name=m_link]').val();
			var mlinkname = $('input:text[name=m_linkname]').val();
			var mcontacts = $('input:text[name=m_contacts]').val();
			var minfo = $('input:text[name=m_info]').val();
			var mpreset = $('#selm').val();
			this.disabled = 1;

		$.ajax({

          type: 'POST',
          url: 'pscr/addpoint.php',
          data: { m_name: mname, m_coords: mcoords, m_link: mlink, m_linkname: mlinkname, m_contacts: mcontacts, m_info: minfo, m_preset: mpreset },
          success: function(data){
            $('#result').append('Добавленно:' + data);
            }
        });
        this.disabled = 0;
	});
	});
});
</script>
