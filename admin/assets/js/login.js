const firebaseConfig = {
    apiKey: "AIzaSyCixz5owb2TaPkgo48494jeaooSAEuCTRVS-TJ-X6quc",
    authDomain: "clinirofordoctors.firebaseapp.com",
    projectId: "clinirofordoctors",
    storageBucket: "clinirofordoctors.appspot.com",
    messagingSenderId: "7696tret20691206",
    appId: "1:769620691206:web:138a064353340f7ef24a43907687",
    measurementId: "G-Z1PH4530J1ZHM"
  };

  firebase.initializeApp(firebaseConfig);



const loginBtn = document.getElementById("signin").onclick = ((e) => {
    e.preventDefault()

    const email = document.getElementById("yourEmaillogin").value
    const password = document.getElementById("yourPasswordlogin").value

    firebase.auth().signInWithEmailAndPassword(email,password)
    .then((userCredential) => {
        sessionStorage.setItem("uid", userCredential.user.uid)
        window.location.href = "index.html"
    }).catch((error) => {
        swal({
            title: "Sign In",
            text: error.message,
            icon: "error",
            button: "Try again"
        })
            
        })
})


firebase.auth().onAuthStateChanged((user) => {
    if (user) {
      // User is signed in, see docs for a list of available properties
      // https://firebase.google.com/docs/reference/js/firebase.User
      var uid = user.uid;
      // ...
    } else {
      // User is signed out
      // ...
    }
  });