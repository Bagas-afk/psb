let gambar = document.getElementById('gambar')
let hasil = document.getElementById('hasil')
let preview = document.getElementById('preview')
let tombol = document.getElementById('tombol')
gambar.addEventListener('change', function () {
	if (gambar.value == '') {
		hasil.hidden = true
		preview.hidden = true
		tombol.disabled = true
	} else {
		hasil.hidden = false
		preview.hidden = false
		tombol.disabled = false
	}
})

function tampilkanPreview(gambar, idPreview) {
	// membuat objek gambar
	var gb = gambar.files;

	// loop untuk merender gambar
	for (var i = 0; i < gb.length; i++) {
		// bikin variabel
		var gbPreview = gb[i];
		var imageType = /image.*/;
		var preview = document.getElementById(idPreview);
		var reader = new FileReader();

		if (gbPreview.type.match(imageType)) {
			// jika tipe data sesuai
			preview.file = gbPreview;
			reader.onload = (function (element) {
				return function (e) {
					element.src = e.target.result;
				};
			})(preview);

			$('.img-preview').css('display', 'block');
			// membaca data URL gambar
			reader.readAsDataURL(gbPreview);
			preview.style.width = '150px';
			preview.style.height = '150px';

		} else {
			// jika tipe data tidak sesuai
			alert("Type file tidak sesuai. Khusus image.");
		}
	}
}
