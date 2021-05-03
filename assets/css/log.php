@import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

* {
    box-sizing: border-box;
}

body {
    background-image: url("pics/background/blue.jpg");
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Varela Round',
    sans-serif;
    height: 100vh;
    margin: -20px 0 50px;
}

h1 {
    color: rgb(34, 91, 165);
    text-align: center;
    font-weight: bold;
    margin: 0;
      direction:rtl;
}

h2 {
    text-align: center;
    font-size: 20px;
      direction:rtl;
      font-size: bold;

}

p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
      direction:rtl;
}

span {
    font-size: 12px;
}

a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
}

.student-sex-radio {
    display: inline-flex;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
    margin: 10px 0px;
}

.radio-input {
    display: none;
}

.radio-label {
    padding: 8px 10px;
    font-size: 14px;
    background-color: #eee;
    color: rgb(63, 63, 63);
    cursor: pointer;
    transition: 0.5s;
}

.radio-input:hover+.radio-label {
    background-color: rgb(196, 196, 196);
}

.radio-input:checked+.radio-label {
    background-color: rgb(49, 132, 241);
    color: rgb(255, 255, 255);
    font-weight: bold;
}

.radio-label:not(:last-of-type) {
    border-left: 1px solid rgba(0, 0, 0, 0.22);
}



button {
    border-radius: 20px;
    border: 1px solid rgb(34, 91, 165);
    background-color: rgb(34, 91, 165);
    color: #FFFFFF;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 30px;
    transition: transform 80ms ease-in;
}

#addStudentbutton {
    border-radius: 50%;
    background-color: rgb(34, 91, 165);
    color: #FFFFFF;
    font-size: 14px;
    font-weight: bold;
    padding: 10px 15px;
    transition: transform 80ms ease-in;
}

#addStudentbutton:hover {
    background-color: rgb(49, 132, 241);
    border:rgb(49, 132, 241) 1px solid;
}

#cancelStudentbutton {
    display: none;
    background-color: rgb(146, 29, 29);
    border: 1px solid rgb(146, 29, 29);
    border-radius: 50%;
    color: #FFFFFF;
    font-size: 14px;
    font-weight: bold;
    padding: 10px 15px;
    transition: transform 80ms ease-in;

}

#cancelStudentbutton:hover {
    background-color: rgb(235, 67, 67);
    border:rgb(235, 67, 67) 1px solid;
}


button:active {
    transform: scale(0.95);
}

button:focus {
    outline: none;
}

button.ghost {
    background-color: transparent;
    border-color: #FFFFFF;
    text-align: center;
    justify-content: center;
    align-items: center;
}

form {
    background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 20px;
    height: 100%;
    text-align: center;
      direction:rtl;
}

form h1 {
    font-size: 30px;
    padding: 10px 10px;
    
}

form h2 {
    text-align: start;
    border-bottom: 1px solid rgb(104, 104, 104);
}


#formStudent {
    display: none;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}


input {
    background-color: #eee;
    border: none;
    padding: 5px 5px;
    margin: 4px 0;
    width: 100%;
}

#submitParentBtn {
    width: 50%;
     border-radius: 20px;
     border: 1px solid rgb(34, 91, 165);
     background-color: rgb(34, 91, 165);
     color: #FFFFFF;
     font-size: 16px;
     font-weight: bold;
     padding: 12px 12px;
     text-transform: uppercase;
     transition: transform 80ms ease-in;
}

#submitParentBtn:hover {
    width: 50%;
    border-radius: 20px;
    border: 1px solid rgb(49, 132, 241);
    background-color: rgb(49, 132, 241);
    color: #FFFFFF;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 12px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}

#studentFormSubmit {
    width: 75%;
    border-radius: 20px;
    border: 1px solid rgb(34, 91, 165);
    background-color: rgb(34, 91, 165);
    color: #FFFFFF;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 12px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}

#studentFormSubmit:hover {
    width: 75%;
    border-radius: 20px;
    border: 1px solid rgb(49, 132, 241);
    background-color: rgb(49, 132, 241);
    color: #FFFFFF;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 12px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}

#EnterSystem {
    width: 75%;
    border-radius: 20px;
    border: 1px solid rgb(34, 91, 165);
    background-color: rgb(34, 91, 165);
    color: #FFFFFF;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 12px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}

#EnterSystem:hover {
    width: 75%;
    border-radius: 20px;
    border: 1px solid rgb(49, 132, 241);
    background-color: rgb(49, 132, 241);
    color: #FFFFFF;
    font-size: 16px;
    font-weight: bold;
    padding: 12px 12px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}


#citySelector {
        background-color: #eee;
        border: none;
        padding: 5px 5px;
        margin: 4px 0;
        width: 100%;
}

.login-logo {
    margin: 20px 0;
    justify-content: center;
}

.container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
        0 10px 10px rgba(0, 0, 0, 0.22);
    position: relative;
    width: 768px;
    max-width: 100%;
    height: 600px;
    min-height: 480px;
    overflow: hidden;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in-container {
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.right-panel-active .sign-in-container {
    transform: translateX(100%);
}

.sign-up-container {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.right-panel-active .sign-up-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
}

@keyframes show {

    0%,
    49.99% {
        opacity: 0;
        z-index: 1;
    }

    50%,
    100% {
        opacity: 1;
        z-index: 5;
    }
}

.overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
}

.container.right-panel-active .overlay-container {
    transform: translateX(-100%);
}

.overlay {
    
    background-image: url("pics/bnei_akiva/2.png");
    background-size: cover;
    background-position: 0 0;
    color: #FFFFFF;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 40%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.overlay-left {
    transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
    transform: translateX(0);
}

.overlay-right {
    right: 0;
    transform: translateX(0);
}

.container.right-panel-active .overlay-right {
    transform: translateX(20%);
}

#goTo-logIn {
    color: rgb(34, 91, 165);
    background-color: rgba(255, 255, 255, 0.671);
        border: none;
    font-size: 20px;
}

#goTo-logIn:hover {
    background-color: rgba(175, 201, 235, 0.644);
}

#goTo-signUp {
    color: rgb(34, 91, 165);
    background-color: rgba(255, 255, 255, 0.671);
    border: none;
    font-size: 20px;
}

#goTo-signUp:hover {
    background-color: rgba(175, 201, 235, 0.644);
}

.parent-panel {
   
   box-shadow: 0px 10px rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    margin: 0.5em;
    padding: 0.5em;
}

.student-panel {
    
    box-shadow: 10px 10px rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    margin: 0.5em;
    padding: 0.5em;
}

.buttons {
    width: 100%;
}

.login-error {
    font-size: 12px;
    font-weight: bold;
    color: rgb(192, 12, 12);

}

.hidden {
    display: none;
}

.next-btn:hover {
    border: 1px solid rgb(49, 132, 241);
    background-color: rgb(49, 132, 241);
}

.regImage {
    padding: 0px 0px;
    margin: 0px 0px;
    background-image: url("pics/bnei_akiva/12.jpg");
    background-size:cover;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    width: 100%;
    height: 60%;
    position: relative;
    overflow: hidden;
    transform: scale(0.75);
}
