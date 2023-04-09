const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

// Get the modal
var addModal1 = document.getElementById("myModal1");
var addModal2 = document.getElementById("myModal2");
var addModal3 = document.getElementById("myModal3");
var addModal4 = document.getElementById("myModal4");

// var editModal = document.getElementById("editModal");
// let nama = document.getElementById("nama");
// let nim = document.getElementById("nim");
// let email = document.getElementById("email");

// Get the button that opens the modal
var btnTambah = document.getElementById("btnTambahpenju");
var btnTambah = document.getElementById("btnTambahpetu");
var btnTambah = document.getElementById("btnTambahpaket");
var btnTambah = document.getElementById("btnTambahmaje");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on the button, open the modal
btnTambahpenju.onclick = function() {
  addModal1.style.display = "block";
}
btnTambahpetu.onclick = function() {
	addModal2.style.display = "block";
}
 btnTambahpaket.onclick = function() {
	addModal3.style.display = "block";
}
btnTambahmaje.onclick = function() {
	addModal4.style.display = "block";
}


// When the user clicks on <span> (x), close the modal penju
span[0].onclick = function() {
	kode.value = "";
	nama.value = "";
	des.value = "";
	harga.value = "";
	jumlah.value = "";
	addModal1.style.display = "none";
  }

  // When the user clicks on <span> (x), close the modal petu
span[1].onclick = function() {
	idpetu.value = "";
	namapetu.value = "";
	nohp.value = "";
	addModal2.style.display = "none";
  }

  // When the user clicks on <span> (x), close the modal paket
span[2].onclick = function() {
	idpaket.value = "";
	jenis.value = "";
	hargapaket.value = "";
	addModal3.style.display = "none";
  }

// When the user clicks on <span> (x), close the modal maje
span[3].onclick = function() {
	kodemaje.value = "";
	namamaje.value = "";
	desmaje.value = "";
	hargamaje.value = "";
	jumlahmaje.value = "";
	addModal4.style.display = "none";
  }
  
	//   span[1].onclick = function() {
	// 	kode.value = "";
	// 	nama.value = "";
	// 	des.value = "";
	// 	harga.value = "";
	// 	jumlah.value = "";
	// 	aksi.value = "";
	// 	  editModal.style.display = "none";
	// 	}
	
	//   // When the user clicks anywhere outside of the modal, close it
	//   window.onclick = function(event) {
	// 	if (event.target == addModal || event.target == editModal) {
	// 		kode.value = "";
	// 		nama.value = "";
	// 		des.value = "";
	// 		harga.value = "";
	// 		jumlah.value = "";
	// 		aksi.value = "";
	// 	  addModal.style.display = "none";
	// 	  editModal.style.display = "none";
	// 	}
	//   }
	
	//   var submit = document.getElementById("submit")
	//   submit.onclick = ()=>{
	// 	  addModal.style.display = "none";
	//   }