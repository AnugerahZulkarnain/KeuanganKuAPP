<html>
  <head>
    <meta name="description" content="Netflix Landing Page Clone" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="0gJfdWRVTYbKtD_OGfrq6IZ-yIbpLIs_vlwy5RMo_yM" />

    <!--------------------------  Stylesheets  ----------------------------->
    <style>
            * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: rgb(18, 18, 18);
  color: white;
  font-family: "Poppins", sans-serif;
}

.navbar {
  position: absolute;
  top: 0;
  width: 100%;
  display: flex;
  justify-content: space-between;
  padding: 3% 5%;
  z-index: 10;
}

.navbar-brand {
  width: 100px;
  height: 100%;
}

.logo {
  width: 50px;
  height: 50px;
}

.language-dropdown {
  background: transparent;
  border: none;
  color: white;
}

.language-dropdown:focus {
  outline: none;
}

.dropdown-container {
  border: 1px solid white;
  padding: 0.4rem;
  border-radius: 4px;
  background: rgba(0, 0, 0, 0.4);
}

.signin-button {
  background-color: #08f55f;
  border: 1px solid #08f55f;
  color: rgb(0, 0, 0);
  padding: 0.25rem 0.5rem;
  border-radius: 4px;
  text-decoration: none;
}

.signup-button {
    margin-right: 20px;
  border: 1px solid #08f55f;
  color: white;
  padding: 0.25rem 0.5rem;
  border-radius: 4px;
  text-decoration: none;
}

.navbar-nav-items {
  display: flex;
  gap: 10px;
}

.netflix-bg-container {
  width: 100%;
  height: 80vh;
}

.netflix-bg-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.netflix-bg-overlay {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 80vh;
  background: rgba(0, 0, 0, 0.4);
  background-image: linear-gradient(
    to top,
    rgba(0, 0, 0, 0.8) 0,
    rgba(0, 0, 0, 0) 60%,
    rgba(0, 0, 0, 0.8) 100%
  );
}

.netflix-card {
  position: absolute;
  top: 20%;
  text-align: center;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.netflix-title {
  color: #fff;
  font-weight: 600;
  font-size: 2rem;
}

.netflix-subtitle,
.netflix-description {
  color: #fff;
  font-weight: 400;
  font-size: 1rem;
}

.netflix-description {
  margin: 0 50px;
}

.email-input {
  border: none;
  background: transparent;
  width: 100%;
  height: 100%;
  padding-left: 7px;
}
.email-label {
  color: black;
  position: absolute;
  top: 28%;
  left: 2%;
  color: rgb(153, 149, 149);
  transition: 0.5s;
}

.email-form-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 15px;
}

.form-container {
  background-color: white;
  width: 90%;
  height: 50px;
  position: relative;
}

.email-input:focus + .email-label {
  top: 0.2rem;
  font-size: 10px;
}

.email-input:not(:placeholder-shown).email-input:not(:focus) + .email-label {
  top: 0.2rem;
  font-size: 10px;
}

.email-input:focus-visible {
  outline: none;
}

.primary-button {
  background-color: #dc030f;
  border: 1px solid #dc030f;
  color: white;
  padding: 0.8rem 1.2rem;
  border-radius: 2px;
  font-size: 15px;
  letter-spacing: 1px;
}

.feature {
  border-top: 8px solid #222;
  padding: 2rem 1rem;
}

.feature-details {
  text-align: center;
}

.feature-heading {
  font-size: 25px;
  font-weight: 600;
  margin: 10px 0;
}

.feature-sub-heading {
  font-size: 15px;
  font-weight: 400;
}

.feature-image-container {
  width: 100%;
  position: relative;
}
.feature-image {
  width: 100%;
}

.feature-bg-video-container {
  position: absolute;
  width: 100%;
  top: 20%;
  left: 13%;
  height: 100%;
  max-width: 73%;
  max-height: 54%;
  z-index: -2;
}

.feature-bg-video {
  width: 100%;
}

.feature-2-poster-container {
  position: absolute;
  bottom: 8%;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  max-width: 16em;
  display: flex;
  align-items: center;
  background-color: black;
  border: 2px solid rgba(255, 255, 255, 0.25);
  border-radius: 10px;
  height: 60px;
  padding: 0.25rem 0.6rem;
  gap: 15px;
}

.poster-container {
  width: 20%;
}

.poster {
  width: 100%;
  height: 100%;
}
.poster-details {
  width: 60%;
}
.poster-details > h4 {
  font-size: 13px;
  font-weight: 500;
}
.poster-details > h6 {
  font-size: 12px;
  font-weight: 400;
  color: rgb(63, 63, 246);
}

.download-gif-container {
  width: 20%;
  height: 100%;
}
.gif {
  width: 100%;
  height: 100%;
}

.feature-3-bg-video-container {
  max-width: 63%;
  max-height: 47%;
  z-index: -2;
  top: 9%;
  left: 19%;
}

.FAQ-question {
  width: 100%;
}
.FAQ-title {
  width: 100%;
  display: flex;
  justify-content: space-between;
  padding: 15px 20px;
  font-size: 18px;
  background-color: #303030;
  border: 1px solid #303030;
  color: white;
}

.FAQ-answer {
  background-color: #303030;
  border-top: 1px solid black;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.5s ease-in-out;
}

.FAQ-answer > p {
  margin: 1rem;
}
.FAQ-list-container {
  border-top: 8px solid #222;
  padding: 2rem 0;
}
.FAQ-heading {
  font-size: 20px;
  text-align: center;
  font-weight: 600;
  margin: 1rem 3rem;
}

.FAQ-list {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 10px;
}

.FAQ-email {
  text-align: center;
}

.FAQ-email > h3 {
  font-size: 18px;
  font-weight: 400;
  margin: 2rem 0;
}

footer {
  border-top: 8px solid #333;
  padding: 2rem 1rem;
  color: #757575;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.footer-row-2 {
  display: flex;
  font-size: 13px;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 50px;
}

.footer-row-1 > h4 {
  font-size: 16px;
  font-weight: 500;
  padding-top: 25px;
}

.footer-row-3 > .dropdown-container {
  width: fit-content;
  border: 1px solid #757575;
  color: #757575;
}

.footer-row-3 > .dropdown-container > .language-dropdown {
  color: #757575;
}

/* -------------------- Media Queries--------------------- */

@media (min-width: 768px) {
  .netflix-bg-container {
    height: 100vh;
  }

  .netflix-bg-overlay {
    height: 100vh;
  }

  .netflix-card {
    top: 40%;
    left: 30%;
    transform: translate(-20%, -20%);
  }
  .netflix-title {
    font-size: 3rem;
  }

  .netflix-subtitle {
    font-size: 1.5rem;
  }

  .netflix-description {
    padding-top: 15px;
    font-size: 1.2rem;
  }

  .feature {
    padding: 4rem;
  }

  .feature-heading {
    font-size: 35px;
  }

  .feature-sub-heading {
    font-size: 20px;
  }
  .feature-2-poster-container {
    max-width: 26em;
    height: 85px;
  }
  .poster-container {
    width: 15%;
  }
  .download-gif-container {
    width: 3rem;
    height: 3rem;
  }

  .poster-details > h4 {
    font-size: 18px;
  }
  .poster-details > h6 {
    font-size: 14px;
  }
  .FAQ-title {
    font-size: 20px;
  }
  .FAQ-heading {
    font-size: 38px;
    font-weight: 500;
    letter-spacing: 1px;
  }
  .FAQ-list {
    padding: 1rem 5rem;
  }
  .FAQ-email {
    width: 75%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transform: translateX(15%);
  }
}

@media (min-width: 1024px) {
  .navbar {
    padding: 2% 4%;
  }

  .navbar-brand {
    width: 150px;
  }

  .logo {
    width: 50px;
    height: 50px;
  }

  .signin-button {
    padding: 7px 20px;
    font-size: 15px;
  }
  .dropdown-container {
    padding: 5px 5px;
  }

  .navbar-nav-items {
    gap: 30px;
  }

  .netflix-card {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .form-container {
    width: 75%;
  }

  .email-form-container {
    flex-direction: row;
    align-items: center;
    gap: 1px;
  }
  .primary-button {
    height: 50px;
  }

  .feature {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
  }

  .feature-details {
    text-align: left;
    padding: 0 6rem;
  }

  .feature-heading {
    font-size: 40px;
  }

  .feature-sub-heading {
    font-size: 20px;
  }

  .feature-image-container {
    max-width: 500px;
  }

  .feature:nth-child(even) {
    flex-direction: row-reverse;
  }

  .feature-2-poster-container {
    max-width: 20em;
    height: 100px;
    padding: 1rem;
  }
  .poster-container {
    width: 20%;
  }
  .FAQ-list {
    padding: 1rem 25rem;
  }
  .FAQ-email {
    transform: translateX(16%);
  }

  .FAQ-email > .email-form-container > .form-container {
    width: 55%;
  }

  footer {
    padding: 2rem 13rem;
    justify-content: flex-start;
    text-align: left;
    align-items: flex-start;
  }

  .footer-row-2 {
    padding-top: 15px;
    padding-left: 10px;
    padding-right: 50px;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: nowrap;
    gap: 100px;
  }

  .footer-row-1,
  .footer-row-3,
  .footer-row-4 {
    align-self: flex-start;
  }

  .column-1,
  .column-2,
  .column-3,
  .column-4 {
    width: 100%;
  }
  .column-1 > p,
  .column-2 > p,
  .column-3 > p,
  .column-4 > p {
    padding-bottom: 15px;
  }

  div.footer-row-3 > .dropdown-container {
    padding: 10px 5px;
  }
}

/* -------------------- Different Mobile Screens--------------------- */

@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
  .navbar {
    top: 15px;
  }

  .Netflix-logo {
    padding-right: 10px;
  }

  .dropdown-container {
    padding: 0.1rem;
    padding-left: 0.4rem;
    padding-right: 0.4rem;
  }

  .signin-button {
    padding: 0.35rem 0.5rem;
  }

  .navbar-nav-items {
    gap: 12px;
  }

  .netflix-bg-container {
    height: 95vh;
  }

  .netflix-bg-overlay {
    height: 95vh;
  }

  .netflix-title {
    font-size: 1.625rem;
  }

  .FAQ-email {
    padding-bottom: 20px;
  }

  .FAQ-email > h3 {
    padding-left: 25px;
    padding-right: 25px;
    font-size: 18px;
  }
}

@media (min-device-width: 360px) and (max-device-width: 640px) {
  .netflix-bg-container {
    height: 80vh;
  }

  .netflix-bg-overlay {
    height: 80vh;
  }

  .column-1,
  .column-2,
  .column-3,
  .column-4 {
    width: 45%;
  }

  .column-1 > p,
  .column-2 > p,
  .column-3 > p,
  .column-4 > p {
    padding-bottom: 10px;
  }
}

@media (min-device-width: 540px) and (max-device-width: 720px) {
  .navbar {
    top: 15px;
  }

  .dropdown-container {
    padding: 0.1rem;
    padding-left: 0.4rem;
    padding-right: 0.4rem;
  }

  .signin-button {
    padding: 0.35rem 0.5rem;
  }

  .navbar-nav-items {
    gap: 12px;
  }



  .column-1,
  .column-2,
  .column-3,
  .column-4 {
    width: 40%;
  }

}

/* Laptop (min-device-width: 768px) (max-device-width: 1024px) */
@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
  .netflix-bg-container {
    height: 80vh;
  }

  .netflix-bg-overlay {
    height: 80vh;
  }

  .column-1,
  .column-2,
  .column-3,
  .column-4 {
    width: 25%;
  }

  .column-1 > p,
  .column-2 > p,
  .column-3 > p,
  .column-4 > p {
    padding-bottom: 20px;
  }
}

/* I-Pad Orientation : Portrait */
@media only screen and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 1) and (min-device-width: 768px) and (max-device-width: 1007px) {
  .navbar {
    top: 15px;
  }

  .logo {
    height: 2.1rem;
    width: 6.75rem;
    padding-right: 10px;
  }

  .dropdown-container {
    font-size: 15px;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }

  .signin-button {
    font-size: 15px;
    padding: 0.55rem 0.9rem;
  }

  .navbar-nav-items {
    gap: 25px;
  }


  .column-1,
  .column-2,
  .column-3,
  .column-4 {
    width: 15%;
  }
  .column-1 > p,
  .column-2 > p,
  .column-3 > p,
  .column-4 > p {
    padding-bottom: 10px;
  }
}
    </style>
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>KeuanganKu</title>
    <link
      rel="icon"
      href="https://i.ibb.co/KcxMkHHH/logo-Keuangan-Ku.png"
    />
  </head>
  <body>
    <!--------------------------  ----------------------------->

    <!-------------------------- Navbar ----------------------------->
    <header>
      <nav class="navbar">
        <div class="navbar-brand">
            <img src="https://i.ibb.co/KcxMkHHH/logo-Keuangan-Ku.png" alt="logo-Keuangan-Ku" class="logo">
        </div>

        <div class="navbar-nav-items">
          <div class="nav-item">
            <a class="signup-button" href="admin/register">Register</a>
            <a class="signin-button" href="admin/login">Login</a>
          </div>
        </div>
      </nav>
    </header>

    <!-------------------------- Header Netflix background  ----------------------------->
    <main>
      <section class="netflix-bg">
        <div class="netflix-bg-container">
        </div>
        <div class="netflix-bg-overlay"></div>

        <div class="netflix-card">
          <h1 class="netflix-title">
           Selamat Datang di KeuanganKu
          </h1>
          <p class="netflix-subtitle">Manajemen keuangan anda dimana saja.</p>
          <p class="netflix-description">
            Tidak punya aplikasi memanajemen keuangan anda? Login saja
            dan mulai manajemen keuangan anda
          </p>
        </div>
      </section>
    <script src="src/index.js"></script>
  </body>
</html>