const flashDataNotif = $('.flash-data-notif').data('flashdata')
const flashDataPerintah = $('.flash-data-perintah').data('flashdata')
const flashDataPesan = $('.flash-data-pesan').data('flashdata')
const Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 5000,
	timerProgressBar: true,
	onOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
	}
})


function hapus_data(nama, href) {
	Swal.fire({
		title: 'Hapus Data',
		text: 'Apakah Anda Yakin ingin Menghapus Data ' + nama + ' Tersebut?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href
		}
	})
}

if (flashDataNotif == 'Berhasil') {
	Swal.fire({
		title: flashDataPerintah,
		text: flashDataPesan,
		icon: 'success'
	})
} else if (flashDataNotif == 'Gagal') {
	Swal.fire({
		title: flashDataPerintah,
		text: flashDataPesan,
		icon: 'error'
	})
} else if (flashDataNotif == 'Info') {
	Swal.fire({
		title: flashDataPerintah,
		text: flashDataPesan,
		icon: 'info'
	})
}
