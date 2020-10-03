$(document).ready(function () {
	$('#datatable').DataTable({
		'lengthMenu': [
			[5, 10, 15, 20, -1],
			[5, 10, 15, 20, 'All']
		]
	})

	$(".select").select2({
		theme: 'bootstrap4',
		placeholder: "-- Silahkan Pilih --",
		allowClear: true
	});

	$('#pilih_cetak').change(function () {
		document.getElementById('div_cetak_laporan').hidden = false
	})
})

function ayah() {
	var dataAyah = document.getElementById('ayahCheck')
	var html = ''
	if (dataAyah.checked) {
		html += '<div id="ayahForm">'
		html += '<h2>Data Ayah</h2>'
		html += '<div class="form-group">'
		html += '<label>Nama</label>'
		html += '<input type="text" name="nama[]" class="form-control">'
		html += '<input type="hidden" name="keterangan[]" value="Ayah" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Tahun Lahir</label>'
		html += '<input type="number" name="tahun_lahir[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Berkebutuhan Khusus</label>'
		html += '<input type="text" name="berkebutuhan_khusus[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Pekerjaan</label>'
		html += '<input type="text" name="pekerjaan[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Pendidikan</label>'
		html += '<input type="text" name="pendidikan[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Penghasilan</label>'
		html += '<input type="text" name="penghasilan[]" class="form-control">'
		html += '</div>'
		html += '<hr />'
		html += '</div>'
		$('.ayahDiv').html(html)
	} else {
		var divAyah = document.getElementById('ayahForm')
		divAyah.remove()
	}
}

function ibu() {
	var dataIbu = document.getElementById('ibuCheck')
	var html = ''
	if (dataIbu.checked) {
		html += '<div id="ibuForm">'
		html += '<h2>Data Ibu</h2>'
		html += '<div class="form-group">'
		html += '<label>Nama</label>'
		html += '<input type="text" name="nama[]" class="form-control">'
		html += '<input type="hidden" name="keterangan[]" value="Ibu" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Tahun Lahir</label>'
		html += '<input type="number" name="tahun_lahir[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Berkebutuhan Khusus</label>'
		html += '<input type="text" name="berkebutuhan_khusus[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Pekerjaan</label>'
		html += '<input type="text" name="pekerjaan[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Pendidikan</label>'
		html += '<input type="text" name="pendidikan[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Penghasilan</label>'
		html += '<input type="text" name="penghasilan[]" class="form-control">'
		html += '</div>'
		html += '<hr />'
		html += '</div>'
		$('.ibuDiv').html(html)
	} else {
		var divIbu = document.getElementById('ibuForm')
		divIbu.remove()
	}

}

function wali() {
	var dataWali = document.getElementById('waliCheck')
	var html = ''
	if (dataWali.checked) {
		html += '<div id="waliForm">'
		html += '<h2>Data Wali</h2>'
		html += '<div class="form-group">'
		html += '<label>Nama</label>'
		html += '<input type="text" name="nama[]" class="form-control">'
		html += '<input type="hidden" name="keterangan[]" value="Wali" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Tahun Lahir</label>'
		html += '<input type="number" name="tahun_lahir[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Berkebutuhan Khusus</label>'
		html += '<input type="text" name="berkebutuhan_khusus[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Pekerjaan</label>'
		html += '<input type="text" name="pekerjaan[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Pendidikan</label>'
		html += '<input type="text" name="pendidikan[]" class="form-control">'
		html += '</div>'
		html += '<div class="form-group">'
		html += '<label>Penghasilan</label>'
		html += '<input type="text" name="penghasilan[]" class="form-control">'
		html += '</div>'
		html += '<hr />'
		html += '</div>'
		$('.waliDiv').html(html)
	} else {
		var divWali = document.getElementById('waliForm')
		divWali.remove()
	}
}

function tambahPrestasi() {
	var html = ''
	html += '<div class="mb-3 isi_data" id="isi_prestasi">'
	html += '<hr>'
	html += '<h3 class="mb-2">Data Prestasi <sup><a onclick="hapusPrestasi(\'isi_prestasi\')" class="badge badge-danger text-light"><i class="fas fa-trash"></i> Hapus Form Prestasi</a></sup></h3>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label class="text-left">Nama Prestasi</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="text" name="nama_prestasi[]" class="form-control w-100">'
	html += '</div>'
	html += '</div>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label>Jenis Prestasi</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="text" name="jenis_prestasi[]" class="form-control w-100">'
	html += '</div>'
	html += '</div>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label>Tingkat Prestasi</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="text" name="tingkat_prestasi[]" class="form-control w-100">'
	html += '</div>'
	html += '</div>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label>Tahun Prestasi</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="number" name="tahun_prestasi[]" class="form-control w-100" placeholder="contoh : 2019">'
	html += '</div>'
	html += '</div>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label>Penyelenggara</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="text" name="penyelenggara_prestasi[]" class="form-control w-100">'
	html += '</div>'
	html += '</div>'
	html += '</div>'
	$('#field_prestasi').append(html)
}

function tambahBeasiswa() {
	var html = ''
	html += '<div class="mb-3" id="isi_beasiswa">'
	html += '<hr>'
	html += '<h3 class="mb-2">Data Beasiswa <sup><a onclick="hapusBeasiswa(\'isi_beasiswa\')" class="badge badge-danger text-light"><i class="fas fa-trash"></i> Hapus Form Prestasi</a></sup></h3>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label class="text-left">Nama Beasiswa</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="text" name="nama_beasiswa[]" class="form-control w-100">'
	html += '</div>'
	html += '</div>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label>Jenis Beasiswa</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="text" name="jenis_beasiswa[]" class="form-control w-100">'
	html += '</div>'
	html += '</div>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label>Penyelenggara Beasiswa</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="text" name="penyelenggara_beasiswa[]" class="form-control w-100">'
	html += '</div>'
	html += '</div>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label>Tahun Mulai</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="number" name="tahun_mulai[]" class="form-control w-100" placeholder="contoh : 2019">'
	html += '</div>'
	html += '</div>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label>Tahun Selesai</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="number" name="tahun_selesai[]" class="form-control w-100" placeholder="contoh : 2019">'
	html += '</div>'
	html += '</div>'
	html += '</div>'
	$('#field_beasiswa').append(html)
}

function hapusPrestasi(isi) {
	var div = document.getElementById(isi)
	div.remove()
}

function hapusBeasiswa(isi) {
	var div = document.getElementById(isi)
	div.remove()
}

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
	// This function will display the specified tab of the form ...
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
	// ... and fix the Previous/Next buttons:
	if (n == 0) {
		document.getElementById("prevBtn").style.display = "none";
	} else {
		document.getElementById("prevBtn").style.display = "inline";
	}
	if (n == (x.length - 1)) {
		document.getElementById("nextBtn").innerHTML = '<i class="fas fa-save"></i> Simpan Data';
	} else {
		document.getElementById("nextBtn").innerHTML = '<i class="fas fa-arrow-right"></i>';
	}
	// ... and run a function that displays the correct step indicator:
	fixStepIndicator(n)
}

function nextPrev(n) {
	// This function will figure out which tab to display
	var x = document.getElementsByClassName("tab");
	// Exit the function if any field in the current tab is invalid:
	if (n == 1 && !validateForm()) return false;
	// Hide the current tab:
	x[currentTab].style.display = "none";
	// Increase or decrease the current tab by 1:
	currentTab = currentTab + n;
	// if you have reached the end of the form... :
	if (currentTab >= x.length) {
		//...the form gets submitted:
		document.getElementById("regForm").submit();
		return false;
	}
	// Otherwise, display the correct tab:
	showTab(currentTab);
}

function validateForm() {
	// This function deals with validation of the form fields
	var x, y, i, valid = true;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].getElementsByClassName("required");
	// A loop that checks every input field in the current tab:
	for (i = 0; i < y.length; i++) {
		// If a field is empty...
		if (y[i].value == "") {
			// add an "invalid" class to the field:
			y[i].className += " invalid";
			// and set the current valid status to false:
			valid = false;
		}
	}
	// If the valid status is true, mark the step as finished and valid:
	if (valid) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
	}
	return valid; // return the valid status
}

function fixStepIndicator(n) {
	// This function removes the "active" class of all steps...
	var i, x = document.getElementsByClassName("step");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	}
	//... and adds the "active" class to the current step:
	x[n].className += " active";
}
