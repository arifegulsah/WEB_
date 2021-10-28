<!DOCTYPE html>

<html>
<head>
	<title></title>
	<meta charset="UTF-8">

	<!-- ICON KUTUPHANESİ -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="css/formstyle.css">

	<!-- COPY TO CLIPBOARD YAPABİLMEK İÇİN-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>


<body>

	<div class="form-container">
		<h1>Bize Bir Bilet Gönder</h1>
		<p>Bişeylerbişeyler bişeyler bişeyler. Bişeylerbişeyler  bişeyler bişeyler bişeylerbişeyler..</p>
		<div class="line"></div>

		<div class="ana-form">
			<!-- SADECE IMAGE KOYMAK İÇİN OLAN KISIM -->
			<div class="left-side">
				<img src="img/ticket.png">
			</div>
			<!-- SADECE IMAGE KOYMAK İÇİN OLAN KISIM // BİTİŞ-->

			<!-- TALEP EDİLENLER KISMI-->
			<div class="right-side">
				<form action="#">
					<div class="form-elementler">
						<label>Başlık :</label><input type="text" name="baslik" class="input-field" id="baslik" required>
					</div>
					<div class="form-elementler">
						<label>Açıklama :</label><input type="textarea" name="aciklama" class="input-field" id="aciklama" required>
					</div>
					<div class="form-elementler">
						<label>Link :</label><input type="url" name="link" id="link" class="input-field"required>
					</div>
					<div class="form-elementler">
						<label>Email :</label><input type="email" name="email" id="email" class="input-field" required>
					</div>
					<div class="form-elementler">
						<label>Image :</label><input type="text" name="" id="resim" class="input-field" required>
					</div>
					<div class="form-elementler form-button">
						<h1>Gönder</h1>
						<img src="img/plane2.png">
						<button class="submit-btn" id="show-code" name="show-code"></button>
					</div>
				</form>
			</div>
			<!-- TALEP EDİLENLER KISMI // BİTİŞ-->

			<!-- BU DIV FORM SUBMITLENDİKTEN SONRA RANDOM KODUN POP UP OLACAĞI DIVDIR -->
			<div class="pop-up-code-creator">
				<div class="newcode" id="newcode"> </div>
				<button class="newcode-btn" id="code-copy">kopyala</button>
			</div>
	<!-- BU DIV FORM SUBMITLENDİKTEN SONRA RANDOM KODUN POP UP OLACAĞI DIVDIR // BİTİŞ -->




		</div>

	</div>


<script type="text/javascript">
	document.querySelector("#show-code").addEventListener("click",function(){
		document.querySelector(".pop-up-code-creator").classList.add("active");
	});
</script>



<!-- BU SCRIPT RANDOM CODE ÜRETMEK VE O KODU SONRASINDA KOPYALA BUTONU BASINCA KAYDETMEK İÇİN VAR -->
<script type="text/javascript">
	function random_code_generator(string_uzunlugu){
		var random_code = '';
		var karakterler = 'ABCDEFJKLMNOPRSTUVYZabcdefjklmnoprstuvyz0123456789!^+%&/()=?_<>£#$½{[]}|'
		for(var i, i = 0; i < string_uzunlugu; i++){
			random_code += karakterler.charAt(Math.floor(Math.random() * karakterler.length));
		}

		//random_code variableını phpye transfer etmek için ajax kodu
		//$.ajax({
		//	url: 'form.php',
		//	type: "POST",
		//	dataType: 'text',
		//	data: {'code': random_code},
		//	success: function(data){
		//		console.log("basarılı gonderim");
		//	}
		//});




		return random_code;
	}
	document.getElementById('newcode').innerHTML = random_code_generator(32);

	function copy(copyId){
		var $input = $("<input>");
		$("body").append($input);
		$input.val($(""+copyId).text()).select();
		document.execCommand("copy");
		$input.remove();
	}

	$(document).ready(function(){
		$("#code-copy").click(function(){
			copy('#newcode');
		});
	});

	$(document).ready(function(){
		$('#code-copy').on('click', function(){
			$('#code-copy').attr("disabled", "disabled");
			var baslik = $('#baslik').val();
			var aciklama = $('#aciklama').val();
			var link = $('#link').val();
			var email = $('#email').val();
			var resim = $('#resim').val();
			var code = random_code_generator(32);

			if (baslik!="" && aciklama!="" && link!="" && email!="" && resim!= ""){
				$.ajax({
					url: "save.php",
					type: "POST",
					data: {
						baslik: baslik,
						aciklama: aciklama,
						link: link,
						email: email,
						resim: resim,
						code: code
					},
					cache: false,
					success: function(dataResult){
						

					}
				});
			}

			else{
				alert('Boş bırakmayın');
			}
		});
	});



</script>

<!-- BU SCRIPT RANDOM CODE ÜRETMEK VE O KODU SONRASINDA KOPYALA BUTONU BASINCA KAYDETMEK İÇİN VAR // BİTİŞ -->



<script type="text/javascript">
	document.querySelector("#code-copy").addEventListener("click",function(){
		document.querySelector(".pop-up-code-creator").classList.remove("active");
	});
</script>


</body>
</html>