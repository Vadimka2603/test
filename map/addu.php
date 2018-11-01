
<style>
*:focus {outline: none;}

body {font: 14px/21px "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif;}

.addu h2, .addu label {font-family:Georgia, Times, "Times New Roman", serif;}

.form_hint, .required_notification {font-size: 11px;}

.addu ul {
 width:400px;
 list-style-type:none;
 list-style-position:outside;
 margin:35px;
 padding:0px;
}
.addu li{
 padding:12px;
 border-bottom:1px solid #eee;
 position:relative;
}

/*Линия между вначале и вконце формы*/

.addu li:first-child {
 border-bottom:1px solid #777;
}

/*Заголовок формы*/
.addu h2 {
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
.addu label {
 width:150px;
 margin-top: 3px;
 display:inline-block;
 float:left;
 padding:3px;
}
.addu input, select, .f {
 height:20px;
 width:220px;
 padding:1px 8px;
}
.addu textarea {padding:8px; width:300px;}
#apoint {margin-left:400px;}


/*Свечение на селекта*/

.addu input, .addu select {
 border:1px solid #aaa;
 box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
 border-radius:2px;
}
.addu input:focus, .addu select:focus {
 background: #fff;
 border:1px solid #555;
 box-shadow: 0 0 3px #aaa;
}

.addu input:focus, .addu select:focus { /* add this to the already existing style */
 padding-right:0px;
}

 .addu input, .addu select { /* add this to the already existing style */
 -moz-transition: padding .25s;
 -webkit-transition: padding .25s;
 -o-transition: padding .25s;
 transition: padding .25s;
}

.addu input, .addu textarea {
 padding-right:15px;
}

input:required {
 background: #fff url(../images/invalid.png) no-repeat 98% center;
 background-size: 15px;

}
::-webkit-validation-bubble-message {
 padding: 1em;
}

.addu input:focus:invalid { /* when a field is considered invalid by the browser */
 background: #fff url(../images/invalid.png) no-repeat 98% center;
 background-size: 15px;
 box-shadow: 0 0 5px #d45252;
 border-color: #b03535
}

.addu input:required:valid { /* when a field is considered valid by the browser */
 background: #fff;
 background-size: 15px;
 box-shadow: 0 0 5px #5cd053;
 border-color: #28921f;
}


.addu input[type="file"].f3 {
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

<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	function selectLaw() {
		$dbuser = "postgres";
        $dbpass = "kf,fnfvbz";
        $db = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass);
        $query = $db->prepare("SELECT * FROM law");
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
?>

<form class="addu" action="" method="" name="addu">
	<ul>
		<li>
			<label for="login">Логин:</label>
			<input type="text" name="login" required>
		</li>
		<li>
			<label for="pass">Пароль:</label>
			<input type="text" name="pass" required>
		</li>
		<li>
			<label for="laws">Права:</label>
			<select id="law" name="laws">
				<option value="0">---Law Type---</option>
				<?php
				$law = selectLaw();
					foreach ($law as $col) {
						echo '<option value="'.$col['id'].'">'.$col['laws'].'</option>';
					}
				?>
			</select>
		</li>
	</ul>
</form>
<button id="addu" class="submit" name="addu">Добавить</button>
<div id="result"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#addu').click(function() {
			var MD5 = function(s){function L(k,d){return(k<<d)|(k>>>(32-d))}function K(G,k){var I,d,F,H,x;F=(G&2147483648);H=(k&2147483648);I=(G&1073741824);d=(k&1073741824);x=(G&1073741823)+(k&1073741823);if(I&d){return(x^2147483648^F^H)}if(I|d){if(x&1073741824){return(x^3221225472^F^H)}else{return(x^1073741824^F^H)}}else{return(x^F^H)}}function r(d,F,k){return(d&F)|((~d)&k)}function q(d,F,k){return(d&k)|(F&(~k))}function p(d,F,k){return(d^F^k)}function n(d,F,k){return(F^(d|(~k)))}function u(G,F,aa,Z,k,H,I){G=K(G,K(K(r(F,aa,Z),k),I));return K(L(G,H),F)}function f(G,F,aa,Z,k,H,I){G=K(G,K(K(q(F,aa,Z),k),I));return K(L(G,H),F)}function D(G,F,aa,Z,k,H,I){G=K(G,K(K(p(F,aa,Z),k),I));return K(L(G,H),F)}function t(G,F,aa,Z,k,H,I){G=K(G,K(K(n(F,aa,Z),k),I));return K(L(G,H),F)}function e(G){var Z;var F=G.length;var x=F+8;var k=(x-(x%64))/64;var I=(k+1)*16;var aa=Array(I-1);var d=0;var H=0;while(H<F){Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=(aa[Z]| (G.charCodeAt(H)<<d));H++}Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=aa[Z]|(128<<d);aa[I-2]=F<<3;aa[I-1]=F>>>29;return aa}function B(x){var k="",F="",G,d;for(d=0;d<=3;d++){G=(x>>>(d*8))&255;F="0"+G.toString(16);k=k+F.substr(F.length-2,2)}return k}function J(k){k=k.replace(/rn/g,"n");var d="";for(var F=0;F<k.length;F++){var x=k.charCodeAt(F);if(x<128){d+=String.fromCharCode(x)}else{if((x>127)&&(x<2048)){d+=String.fromCharCode((x>>6)|192);d+=String.fromCharCode((x&63)|128)}else{d+=String.fromCharCode((x>>12)|224);d+=String.fromCharCode(((x>>6)&63)|128);d+=String.fromCharCode((x&63)|128)}}}return d}var C=Array();var P,h,E,v,g,Y,X,W,V;var S=7,Q=12,N=17,M=22;var A=5,z=9,y=14,w=20;var o=4,m=11,l=16,j=23;var U=6,T=10,R=15,O=21;s=J(s);C=e(s);Y=1732584193;X=4023233417;W=2562383102;V=271733878;for(P=0;P<C.length;P+=16){h=Y;E=X;v=W;g=V;Y=u(Y,X,W,V,C[P+0],S,3614090360);V=u(V,Y,X,W,C[P+1],Q,3905402710);W=u(W,V,Y,X,C[P+2],N,606105819);X=u(X,W,V,Y,C[P+3],M,3250441966);Y=u(Y,X,W,V,C[P+4],S,4118548399);V=u(V,Y,X,W,C[P+5],Q,1200080426);W=u(W,V,Y,X,C[P+6],N,2821735955);X=u(X,W,V,Y,C[P+7],M,4249261313);Y=u(Y,X,W,V,C[P+8],S,1770035416);V=u(V,Y,X,W,C[P+9],Q,2336552879);W=u(W,V,Y,X,C[P+10],N,4294925233);X=u(X,W,V,Y,C[P+11],M,2304563134);Y=u(Y,X,W,V,C[P+12],S,1804603682);V=u(V,Y,X,W,C[P+13],Q,4254626195);W=u(W,V,Y,X,C[P+14],N,2792965006);X=u(X,W,V,Y,C[P+15],M,1236535329);Y=f(Y,X,W,V,C[P+1],A,4129170786);V=f(V,Y,X,W,C[P+6],z,3225465664);W=f(W,V,Y,X,C[P+11],y,643717713);X=f(X,W,V,Y,C[P+0],w,3921069994);Y=f(Y,X,W,V,C[P+5],A,3593408605);V=f(V,Y,X,W,C[P+10],z,38016083);W=f(W,V,Y,X,C[P+15],y,3634488961);X=f(X,W,V,Y,C[P+4],w,3889429448);Y=f(Y,X,W,V,C[P+9],A,568446438);V=f(V,Y,X,W,C[P+14],z,3275163606);W=f(W,V,Y,X,C[P+3],y,4107603335);X=f(X,W,V,Y,C[P+8],w,1163531501);Y=f(Y,X,W,V,C[P+13],A,2850285829);V=f(V,Y,X,W,C[P+2],z,4243563512);W=f(W,V,Y,X,C[P+7],y,1735328473);X=f(X,W,V,Y,C[P+12],w,2368359562);Y=D(Y,X,W,V,C[P+5],o,4294588738);V=D(V,Y,X,W,C[P+8],m,2272392833);W=D(W,V,Y,X,C[P+11],l,1839030562);X=D(X,W,V,Y,C[P+14],j,4259657740);Y=D(Y,X,W,V,C[P+1],o,2763975236);V=D(V,Y,X,W,C[P+4],m,1272893353);W=D(W,V,Y,X,C[P+7],l,4139469664);X=D(X,W,V,Y,C[P+10],j,3200236656);Y=D(Y,X,W,V,C[P+13],o,681279174);V=D(V,Y,X,W,C[P+0],m,3936430074);W=D(W,V,Y,X,C[P+3],l,3572445317);X=D(X,W,V,Y,C[P+6],j,76029189);Y=D(Y,X,W,V,C[P+9],o,3654602809);V=D(V,Y,X,W,C[P+12],m,3873151461);W=D(W,V,Y,X,C[P+15],l,530742520);X=D(X,W,V,Y,C[P+2],j,3299628645);Y=t(Y,X,W,V,C[P+0],U,4096336452);V=t(V,Y,X,W,C[P+7],T,1126891415);W=t(W,V,Y,X,C[P+14],R,2878612391);X=t(X,W,V,Y,C[P+5],O,4237533241);Y=t(Y,X,W,V,C[P+12],U,1700485571);V=t(V,Y,X,W,C[P+3],T,2399980690);W=t(W,V,Y,X,C[P+10],R,4293915773);X=t(X,W,V,Y,C[P+1],O,2240044497);Y=t(Y,X,W,V,C[P+8],U,1873313359);V=t(V,Y,X,W,C[P+15],T,4264355552);W=t(W,V,Y,X,C[P+6],R,2734768916);X=t(X,W,V,Y,C[P+13],O,1309151649);Y=t(Y,X,W,V,C[P+4],U,4149444226);V=t(V,Y,X,W,C[P+11],T,3174756917);W=t(W,V,Y,X,C[P+2],R,718787259);X=t(X,W,V,Y,C[P+9],O,3951481745);Y=K(Y,h);X=K(X,E);W=K(W,v);V=K(V,g)}var i=B(Y)+B(X)+B(W)+B(V);return i.toLowerCase()};
			var login = $('input:text[name=login]').val();
			var pass = $('input:text[name=pass]').val();
			var law = $('#law').val();
			this.disabled = 1;

		$.ajax({

          type: 'POST',
          url: 'pscr/adduser.php',
          data: { logins: login , passw: pass, laws: law },
          success: function(data){
            $('#result').append('Добавленно:' + data);
            }
        });
        this.disabled = 0;
	});
});
</script>