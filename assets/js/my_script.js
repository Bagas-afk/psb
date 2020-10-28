$(document).ready(function () {
	$('#datatable').DataTable({
		'lengthMenu': [
			[5, 10, 15, 20, -1],
			[5, 10, 15, 20, 'All']
		]
	})

	$('.password').password()

	$('.year').yearpicker()

	$(".select").select2({
		theme: 'bootstrap4',
		placeholder: "-- Silahkan Pilih --",
		allowClear: true
	});

	$('#pilih_cetak').change(function () {
		document.getElementById('div_cetak_laporan').hidden = false
	})

	$("body").on("click", ".remove_beasiswa", function () {
		$(this).parents("#isi_beasiswa").remove();
	});

	$("body").on("click", ".hapus_beasiswa", function () {
		var id_beasiswa = $(this).parents("#isi_beasiswa").data('id')
		Swal.fire({
			title: 'Hapus Data',
			text: 'Apakah Anda Yakin ingin Menghapus Data Beasiswa Tersebut?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus Data!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: '/psb/staff/hapus_beasiswa',
					type: 'post',
					data: {
						id_beasiswa: id_beasiswa
					},
					success: function (code) {
						if (code != 1) {
							Swal.fire({
								title: 'Gagal',
								text: 'Data Beasiswa Tidak Ada',
								icon: 'error'
							})
						} else {
							Swal.fire({
								title: 'Berhasil',
								text: 'Data Beasiswa Telah Dihapus',
								icon: 'success'
							})
						}
					}
				})
			} else {
				Swal.fire({
					title: 'Gagal',
					text: 'Data Beasiswa Tidak Dihapus',
					icon: 'error'
				})
			}

			if (result.value == true) {
				$(this).parents("#isi_beasiswa").remove()
			}
		})
	});

	$("body").on("click", ".remove_prestasi", function () {
		$(this).parents("#isi_prestasi").remove();
	});

	$("body").on("click", ".hapus_prestasi", function () {
		var id_prestasi = $(this).parents("#isi_prestasi").data('id')
		Swal.fire({
			title: 'Hapus Data Prestasi',
			text: 'Apakah Anda Yakin ingin Menghapus Data Prestasi Tersebut?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus Data!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: '/psb/staff/hapus_prestasi',
					type: 'post',
					data: {
						id_prestasi: id_prestasi
					},
					success: function (code) {
						if (code != '1') {
							Swal.fire({
								title: 'Gagal',
								text: 'Data Prestasi Tidak Ada',
								icon: 'error'
							})
						} else {
							Swal.fire({
								title: 'Berhasil',
								text: 'Data Prestasi Telah Dihapus',
								icon: 'success'
							})
						}
					}
				})
			} else {
				Swal.fire({
					title: 'Gagal',
					text: 'Data Prestasi Tidak Dihapus',
					icon: 'error'
				})
			}

			if (result.value == true) {
				$(this).parents("#isi_prestasi").remove()
			}

		})
	});

	$('#tahun_ajaran_pendaftar').change(function () {
		var id_tahun_ajaran = document.getElementById('tahun_ajaran_pendaftar').value
		$.ajax({
			type: 'get',
			url: '/psb/staff/tampil_pendaftar_tahun_ajaran/' + id_tahun_ajaran,
			dataType: 'json',
			success: function (data) {
				var html = ''
				data.forEach(data => {
					html += '<option value="' + data.id_pendaftar + '">' + data.nisn + ' - ' + data.nama_pendaftar + '</option>'
				})
				$('#pilihan_pendaftar').html(html)
			}
		})

		document.getElementById('verifikasi_nilai').href = '/psb/c_penilaian/verifikasi_penilaian/' + md5(id_tahun_ajaran)
	})

	$('#pilihan_pendaftar').change(function () {
		var id_pendaftar = document.getElementById('pilihan_pendaftar').value
		var tombol = document.getElementById('simpan')
		$.ajax({
			type: 'get',
			url: '/psb/staff/cari_nilai_pendaftar/' + id_pendaftar,
			dataType: 'json',
			success: function (data) {
				var html = ''
				if (data.length > 0) {
					Swal.fire({
						title: 'Gagal',
						text: 'Data Penilaian Sudah Ada',
						icon: 'error'
					})
					html += ''
					tombol.disabled = true
				} else {
					html += '<div class="form-group">'
					html += '<label>Pilihan Ganda Benar</label>'
					html += '<input type="number" class="form-control" name="pilihan_ganda_benar" min="0" max="50" required>'
					html += '</div>'
					html += '<div class="form-group">'
					html += '<label>Nilai Baca Tulis Al-Qur\'an</label>'
					html += '<input type="number" name="nilai_btq" class="form-control" min="0" max="100" required>'
					html += '</div>'
					tombol.disabled = false
				}
				$('#penilaian').html(html)
			}
		})
	})


	$('#tahun_ajaran').change(function () {
		var id_tahun_ajaran = $('#tahun_ajaran').val()
		$.ajax({
			url: '/psb/c_tahun_ajaran/cari_tahun_ajaran/' + id_tahun_ajaran,
			type: 'get',
			dataType: 'json',
			success: function (data) {
				var table = $('.tabel_pendaftar').DataTable();
				table.search('Tahun Ajaran ' + data.tahun_ajaran).draw();
			}
		})

	})

	$('#tahun_ajaran_pendaftar').change(function () {
		var id_tahun_ajaran = $('#tahun_ajaran_pendaftar').val()
		$.ajax({
			url: '/psb/c_tahun_ajaran/cari_tahun_ajaran/' + id_tahun_ajaran,
			type: 'get',
			dataType: 'json',
			success: function (data) {
				var table = $('.tabel_nilai').DataTable();
				table.search('Tahun Ajaran ' + data.tahun_ajaran).draw();
			}
		})

	})

	$('#tahun_ajaran_kelulusan').change(function () {
		var id_tahun_ajaran = $('#tahun_ajaran_kelulusan').val()
		$.ajax({
			url: '/psb/c_tahun_ajaran/cari_tahun_ajaran/' + id_tahun_ajaran,
			type: 'get',
			dataType: 'json',
			success: function (data) {
				var table = $('.tabel_kelulusan').DataTable();
				table.search('Tahun Ajaran ' + data.tahun_ajaran).draw();
			}
		})

	})
})

function ayah() {
	var dataAyah = document.getElementById('ayahCheck')
	var nama_ayah = document.getElementById('nama_ayah')
	var divAyah = document.getElementById('ayahForm')
	var html = ''
	if (dataAyah.checked) {
		if (nama_ayah.value != '') {
			divAyah.hidden = false
		} else {
			html += '<div id="ayahForm">'
			html += '<h2>Data Ayah</h2>'
			html += '<div class="form-group">'
			html += '<label>Nama</label>'
			html += '<input type="text" id="nama_ayah" name="nama_pengasuh[]" class="form-control">'
			html += '<input type="hidden" name="id_pengasuh[]" class="form-control">'
			html += '<input type="hidden" name="keterangan[]" value="Ayah" class="form-control">'
			html += '</div>'
			html += '<div class="form-group">'
			html += '<label>Tahun Lahir</label>'
			html += '<input type="date" name="tanggal_lahir_pengasuh[]" class="form-control">'
			html += '</div>'
			html += '<div class="form-group">'
			html += '<label>Berkebutuhan Khusus</label>'
			html += '<input type="text" name="berkebutuhan_khusus_pengasuh[]" class="form-control">'
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
		}
	} else {
		if (nama_ayah.value != '') {
			divAyah.hidden = true
		} else {
			divAyah.remove()
		}
	}
}

function ibu() {
	var nama_ibu = document.getElementById('nama_ibu')
	var dataIbu = document.getElementById('ibuCheck')
	var divIbu = document.getElementById('ibuForm')
	var html = ''
	if (dataIbu.checked) {
		if (nama_ibu.value != '') {
			divIbu.hidden = false
		} else {
			html += '<div id="ibuForm">'
			html += '<h2>Data Ibu</h2>'
			html += '<div class="form-group">'
			html += '<label>Nama</label>'
			html += '<input type="text" id="nama_ibu" name="nama_pengasuh[]" class="form-control">'
			html += '<input type="hidden" name="id_pengasuh[]" class="form-control">'
			html += '<input type="hidden" name="keterangan[]" value="Ibu" class="form-control">'
			html += '</div>'
			html += '<div class="form-group">'
			html += '<label>Tahun Lahir</label>'
			html += '<input type="date" name="tanggal_lahir_pengasuh[]" class="form-control">'
			html += '</div>'
			html += '<div class="form-group">'
			html += '<label>Berkebutuhan Khusus</label>'
			html += '<input type="text" name="berkebutuhan_khusus_pengasuh[]" class="form-control">'
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
		}
	} else {
		if (nama_ibu.value != '') {
			divIbu.hidden = true
		} else {
			divIbu.remove()
		}
	}

}

function wali() {
	var nama_wali = document.getElementById('nama_wali')
	var dataWali = document.getElementById('waliCheck')
	var divWali = document.getElementById('waliForm')
	var html = ''
	if (dataWali.checked) {
		if (nama_wali.value != '') {
			divWali.hidden = false
		} else {
			html += '<div id="waliForm">'
			html += '<h2>Data Wali</h2>'
			html += '<div class="form-group">'
			html += '<label>Nama</label>'
			html += '<input type="hidden" name="id_pengasuh[]" class="form-control">'
			html += '<input type="text" id="nama_wali" name="nama_pengasuh[]" class="form-control">'
			html += '<input type="hidden" name="keterangan[]" value="Wali" class="form-control">'
			html += '</div>'
			html += '<div class="form-group">'
			html += '<label>Tahun Lahir</label>'
			html += '<input type="date" name="tanggal_lahir_pengasuh[]" class="form-control">'
			html += '</div>'
			html += '<div class="form-group">'
			html += '<label>Berkebutuhan Khusus</label>'
			html += '<input type="text" name="berkebutuhan_khusus_pengasuh[]" class="form-control">'
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
		}
	} else {
		if (nama_wali.value != '') {
			divWali.hidden = true
		} else {
			divWali.remove()
		}
	}
}

function tambahPrestasi() {
	var html = ''
	html += '<div class="mb-3" id="isi_prestasi">'
	html += '<hr>'
	html += '<h3 class="mb-2">Data Prestasi <sup><a class="badge badge-danger remove_prestasi text-light"><i class="fas fa-trash"></i> Hapus Form Prestasi</a></sup></h3>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label class="text-left">Nama Prestasi</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="hidden" name="id_prestasi[]" class="form-control w-100">'
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
	html += '<input type="number" name="tahun_prestasi[]" class="year form-control w-100" placeholder="contoh : 2019">'
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
	html += '<h3 class="mb-2">Data Beasiswa <sup><a class="badge badge-danger remove_beasiswa text-light"><i class="fas fa-trash"></i> Hapus Form Prestasi</a></sup></h3>'
	html += '<div class="form-inline row mb-2">'
	html += '<div class="col-2 d-flex justify-content-start">'
	html += '<label class="text-left">Nama Beasiswa</label>'
	html += '</div>'
	html += '<div class="col-10">'
	html += '<input type="hidden" name="id_beasiswa[]" class="form-control w-100">'
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

let preview = document.getElementById('preview')
let gambar = document.getElementById('gambar')
let hasil = document.getElementById('hasil')
gambar.addEventListener('change', function () {
	if (gambar.value == '') {
		hasil.hidden = true
		preview.hidden = true
	} else {
		hasil.hidden = false
		preview.hidden = false
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
			preview.style.height = '200px';

		} else {
			// jika tipe data tidak sesuai
			alert("Type file tidak sesuai. Khusus image.");
		}
	}
}

function tampilkanPreviewStandard(gambar, idPreview) {
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
			preview.style.width = '200px';
			preview.style.height = '200px';

		} else {
			// jika tipe data tidak sesuai
			alert("Type file tidak sesuai. Khusus image.");
		}
	}
}

let currentTab = 0; // Current tab is set to be the first tab (0)
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
