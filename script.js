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


function mostrardesktop() {
	document.getElementById('desktop').style.display = 'block';
	document.getElementById('informe').style.display = 'none';
	document.getElementById('analisis').style.display = 'none';
	document.getElementById('mensaje').style.display = 'none';
	document.getElementById('equipo').style.display = 'none';
	document.getElementById('config').style.display = 'none';
}

function mostrarinforme() {
	document.getElementById('informe').style.display = 'block';
	document.getElementById('desktop').style.display = 'none';
	document.getElementById('analisis').style.display = 'none';
	document.getElementById('mensaje').style.display = 'none';
	document.getElementById('equipo').style.display = 'none';
	document.getElementById('config').style.display = 'none';
}

function mostraranalisis() {
	document.getElementById('analisis').style.display = 'block';
	document.getElementById('informe').style.display = 'none';
	document.getElementById('desktop').style.display = 'none';
	document.getElementById('mensaje').style.display = 'none';
	document.getElementById('equipo').style.display = 'none';
	document.getElementById('config').style.display = 'none';
}

function mostrarmensaje() {
	document.getElementById('mensaje').style.display = 'block';
	document.getElementById('informe').style.display = 'none';
	document.getElementById('analisis').style.display = 'none';
	document.getElementById('desktop').style.display = 'none';
	document.getElementById('equipo').style.display = 'none';
	document.getElementById('config').style.display = 'none';
}

function mostrarequipo() {
	document.getElementById('equipo').style.display = 'block';
	document.getElementById('informe').style.display = 'none';
	document.getElementById('analisis').style.display = 'none';
	document.getElementById('mensaje').style.display = 'none';
	document.getElementById('desktop').style.display = 'none';
	document.getElementById('config').style.display = 'none';
}

function mostrarconfig() {
	document.getElementById('config').style.display = 'block';
	document.getElementById('informe').style.display = 'none';
	document.getElementById('analisis').style.display = 'none';
	document.getElementById('mensaje').style.display = 'none';
	document.getElementById('desktop').style.display = 'none';
	document.getElementById('equipo').style.display = 'none';
}


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
