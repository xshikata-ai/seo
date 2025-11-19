<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>MAHATH Portfolio</title>
    <meta name="description" content="MAHATH Portfolio " />
    <link
      rel="shortcut icon"
      href="assets/png/dp circle.png"
      type="image/x-icon"
    />

    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  </head>
  <body>
    <!-- navbar  -->
    <header class="header">
      <div class="header__content">
        <div class="header__logo-container">
          <div class="header__logo-img-cont">
            <img
              src="./assets/png/Logo.png"
              alt="MAHATH Logo Image"
              class="header__logo-img"
            />
          </div>
          <span class="header__logo-sub">MAHATH P T</span>
        </div>
        <div class="header__main">
          <ul class="header__links">
            <li class="header__link-wrapper">
              <a href="./index.html" class="header__link"> Home </a>
            </li>
            <li class="header__link-wrapper">
              <a href="./index.html#about" class="header__link">About </a>
            </li>
            <li class="header__link-wrapper">
              <a href="./index.html#projects" class="header__link">
                Projects
              </a>
            </li>
            <li class="header__link-wrapper">
              <a href="./index.html#contact" class="header__link"> Contact </a>
            </li>
          </ul>
          <div class="header__main-ham-menu-cont">
            <img
              src="./assets/svg/ham-menu.svg"
              alt="hamburger menu"
              class="header__main-ham-menu"
            />
            <img
              src="./assets/svg/ham-menu-close.svg"
              alt="hamburger menu close"
              class="header__main-ham-menu-close d-none"
            />
          </div>
        </div>
      </div>
      <div class="header__sm-menu">
        <div class="header__sm-menu-content">
          <ul class="header__sm-menu-links">
            <li class="header__sm-menu-link">
              <a href="./index.html"> Home </a>
            </li>

            <li class="header__sm-menu-link">
              <a href="./index.html#about"> About </a>
            </li>

            <li class="header__sm-menu-link">
              <a href="./index.html#projects"> Projects </a>
            </li>

            <li class="header__sm-menu-link">
              <a href="./index.html#contact"> Contact </a>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <!-- hero section  -->
    <section class="home-hero">
      <div class="home-hero__content">
        <img src="assets/png/dp circle.png" style="width: 25%;" alt="Profile" class="center" />
        <h1 class="heading-primary">Hi, I'm <span> Mahath</span></h1>
        <h2 class="heading-primary2">
          I'm a
          <span class="role"></span>
        </h2>

        <div class="home-hero__info">
          <p class="text-primary">
            This is my portfolio website. Here you'll get to know about me and
            my projects .
          </p>
        </div>
        <div class="home-hero__cta">
          <a
            href="https://www.linkedin.com/in/mahath-p-t-b9b1a9236"
            target="_blank"
            class="btn btn--bg"
            >Hire ME</a
          >
        </div>
      </div>
      <div class="home-hero__socials">
        <div class="home-hero__social">
          <a
            href="https://www.linkedin.com/in/mahath-p-t-b9b1a9236"
            target="_blank"
            class="home-hero__social-icon-link"
          >
            <img
              src="./assets/png/linkedin-ico.png"
              alt="icon"
              class="home-hero__social-icon"
            />
          </a>
        </div>
        <div class="home-hero__social">
          <a
            href="https://github.com/MAHATH2001"
            target="_blank"
            class="home-hero__social-icon-link"
          >
            <img
              src="./assets/png/github-ico.png"
              alt="icon"
              class="home-hero__social-icon"
            />
          </a>
        </div>

        <div class="home-hero__social">
          <a
            href="https://instagram.com/mahath.pt/"
            target="_blank"
            class="home-hero__social-icon-link home-hero__social-icon-link--bd-none"
          >
            <img
              src="./assets/png/insta-ico.png"
              alt="icon"
              class="home-hero__social-icon"
            />
          </a>
        </div>
      </div>
      <div class="home-hero__mouse-scroll-cont">
       <a href="./index.html#about"><div class="mouse"></div></a> 
      </div>
    </section>

    <!-- About section  -->
    <section id="about" class="about sec-pad">
      <div class="main-container">
        <h2 class="heading heading-sec heading-sec__mb-med">
          <span class="heading-sec__main">About Me</span>
          <span class="heading-sec__sub">
            Front-End Developer 🧑‍💻 | UI-UX Designer 🧑‍🎨 <br />
            Web App Developer 💻 |  💻 coder
          </span>
        </h2>
        <div class="about__content">
          <div class="about__content-main">
            <h3 class="about__content-title">Get to know me!</h3>
            <div class="about__content-details">
              <p class="about__content-details-para">
                Hey! It's
                <strong>Mahath</strong>
                and I'm a <strong> Front-End Developer </strong> located in
                Chennai. I've done projects form IBM provide by Nalaiya Thiran course and Uploaded in
                GitHub.Collaborated with talented people to create
                <strong>Web page </strong>
                for both client and Server use.
              </p>
              <p class="about__content-details-para">
                To enhance my professional skills, capabilities and
                knowledge <strong> in an organization</strong> which recognizes the
                value of hard work and trusts me with
                responsibilities and challenges. Feel free to <strong>Contact</strong> me here.
              </p>
            </div>
            <a href="./index.html#contact" class="btn btn--med btn--theme dynamicBgClr"
              >Contact Me</a
            >
          </div>
          <div class="about__content-skills">
            <h3 class="about__content-title">My Skills</h3>
            <div class="skills">
              <div class="skills__skill">HTML</div>
              <div class="skills__skill">CSS</div>
              <div class="skills__skill">JavaScript</div>
              <div class="skills__skill">Bootstrap</div>
              <div class="skills__skill">Github</div>
              <div class="skills__skill">VScode</div>
              <div class="skills__skill">UI-UX design</div>
              <div class="skills__skill">Machine learning </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Project section  -->
    <section id="projects" class="projects sec-pad">
      <div class="main-container">
        <h2 class="heading heading-sec heading-sec__mb-bg">
          <span class="heading-sec__main">Projects</span>
          <span class="heading-sec__sub">
            Here you will find some of my personal projects that I created and
            more details about it.
          </span>
        </h2>

        <div class="projects__content">
          <div class="projects__row">
            <div class="projects__row-img-cont">
              <img
                src="./assets/jpeg/WEB PHISHING.png"
                alt="Software Screenshot"
                class="projects__row-img"
                loading="lazy"
              />
            </div>
            <div class="projects__row-content">
              <h3 class="projects__row-content-title">Web-Phishing-Detection-using-Machine-Learning</h3>
              <p class="projects__row-content-desc">
                This project is to train machine learning models and deep neural nets on the dataset created to predict phishing websites.
                Both phishing and benign URLs of websites are gathered to form a dataset and from them required URL and website content-based 
                features are extracted.The performance level of each model is measures and compared.
              </p>
              <a
                href="./project-1.html"
                class="btn btn--med btn--theme dynamicBgClr"
                target="_blank"
                >Read More</a
              >
            </div>
          </div>
          <div class="projects__row">
            <div class="projects__row-img-cont">
              <img
                src="./assets/jpeg/MediQuic.png"
                alt="Software Screenshot"
                class="projects__row-img"
                loading="lazy"
              />
            </div>
            <div class="projects__row-content">
              <h3 class="projects__row-content-title">AI-based personalized medical chatbot</h3>
              <p class="projects__row-content-desc">
                This project aims to address the challenges of limited access to personalized medical information.
                By offering a reliable and accessible platform, the chatbot aims to empower individuals in making 
                informed decisions regarding their health and potentially reduce the strain on healthcare resources.

              </p>
              <a
                href="./project-2.html"
                class="btn btn--med btn--theme dynamicBgClr"
                target="_blank"
                >Read more</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- contact section  -->
    <section id="contact" class="contact sec-pad dynamicBg">
      <div class="main-container">
        <h2 class="heading heading-sec heading-sec__mb-med">
          <span class="heading-sec__main heading-sec__main--lt">Contact</span>
          <span class="heading-sec__sub heading-sec__sub--lt">
            <strong style="color: rgba(21, 0, 62, 0.63)"> Questions ,</strong
            ><strong style="color: rgb(21, 0, 62, 0.63)"> Thoughts </strong> or
            want a
            <strong style="color: rgb(21, 0, 62, 0.63)"> Project</strong> done
            by Me...
          </span>
        </h2>
        <div class="contact__form-container">
          <form action="#" class="contact__form">
            <div class="contact__form-field">
              <label class="contact__form-label" for="name">Name</label>
              <input
                required
                placeholder="Enter Your Name"
                type="text"
                class="contact__form-input"
                name="name"
                id="name"
              />
            </div>
            <div class="contact__form-field">
              <label class="contact__form-label" for="email">Email</label>
              <input
                required
                placeholder="Enter Your Email"
                type="text"
                class="contact__form-input"
                name="email"
                id="email"
              />
            </div>
            <div class="contact__form-field">
              <label class="contact__form-label" for="message">Message</label>
              <textarea
                required
                cols="30"
                rows="10"
                class="contact__form-input"
                placeholder="Enter Your Message"
                name="message"
                id="message"
              ></textarea>
            </div>
            <button type="submit" class="btn btn--theme contact__btn">
              Submit
            </button>
          </form>
        </div>
      </div>
    </section>

    <!-- footer  -->
    <footer class="main-footer">
      <div class="main-container">
        <div class="main-footer__upper">
          <div class="main-footer__row main-footer__row-1">
            <h2 class="heading heading-sm2 main-footer__heading-sm">
              <span>Social</span>
            </h2>
            <div class="main-footer__social-cont">
              <a
                target="_blank"
                rel="noreferrer"
                href="https://www.linkedin.com/in/mahath-p-t-b9b1a9236"
              >
                <img
                  class="main-footer__icon"
                  src="./assets/png/linkedin-ico.png"
                  alt="icon"
                />
              </a>
              <a
                target="_blank"
                rel="noreferrer"
                href="https://github.com/MAHATH2001"
              >
                <img
                  class="main-footer__icon"
                  src="./assets/png/github-ico.png"
                  alt="icon"
                />
              </a>
              <a
                target="_blank"
                rel="noreferrer"
                href="https://instagram.com/mahath.pt/"
              >
                <img
                  class="main-footer__icon main-footer__icon--mr-none"
                  src="./assets/png/insta-ico.png"
                  alt="icon"
                />
              </a>
            </div>
          </div>
          <div class="main-footer__row main-footer__row-2">
            <h4 class="heading heading-sm2 text-lt">MAHATH P T</h4>
            <p class="main-footer__short-desc">
              Front-End Developer &nbsp;|&nbsp; UI-UX Designer <br />

              <a href="https://mail.google.com">
                <i class="uil uil-envelope mail-logo"></i>
                mahath2001@gmail.com</a
              >
            </p>
          </div>
        </div>

        <!-- If you give me some credit or shoutout here by linking to my website, then it will be a big thing for me and will help me a lot :) -->
        <div class="main-footer__lower">
          Made by
          <a
            rel="noreferrer"
            target="_blank"
            href="https://www.linkedin.com/in/mahath-p-t-b9b1a9236"
            >MAHATH P T</a
          >
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="./index.js"></script>
    <script>
      var typeData = new Typed(".role", {
        strings: [
          "Front-end Developer",
          "UI-UX Designer",
          "Web App Developer ",
          "Coder",
        ],
        loop: true,
        typeSpeed: 100,
        backSpeed: 80,
        backDelay: 1000,
      });
    </script>
  </body>
</html>
