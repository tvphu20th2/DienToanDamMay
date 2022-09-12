<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Liên kết và cấu hình Firebase -->
<script type="module">
	// Import the functions you need from the SDKs you need
	import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
	import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-analytics.js";
	
	// TODO: Add SDKs for Firebase products that you want to use
	// https://firebase.google.com/docs/web/setup#available-libraries
	
	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	const firebaseConfig = {
	  apiKey: "AIzaSyAoID_KJh2jgR4Hj0iiOYNhg-rt3i_0uq4",
	  authDomain: "diadiemdulich-doan.firebaseapp.com",
	  projectId: "diadiemdulich-doan",
	  storageBucket: "diadiemdulich-doan.appspot.com",
	  messagingSenderId: "551428015592",
	  appId: "1:551428015592:web:c5727cefd03c4c32bb905d",
	  measurementId: "G-ETFX14E8F1"
	};
	
	// Initialize Firebase
	const app = initializeApp(firebaseConfig);
	const analytics = getAnalytics(app);
</script>