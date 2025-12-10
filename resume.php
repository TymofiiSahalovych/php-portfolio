<?php 
    $title = "My CV";
    require_once ("blocks/header.php");
?>
<link rel="stylesheet" href="css/resume.scss"/>

<body>
    <div class="resume-wrapper">
        <section class="profile section-padding">
            <div class="container">
                <div class="picture-resume-wrapper">
                    <div class="picture-resume">
                        <span><img src="catimage.jpg" alt="" /></span>
                        <svg version="1.1" viewBox="0 0 350 350">

                            <defs>
                                <filter id="goo">
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />
                                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -9" result="cm" />
                                </filter>
                            </defs>

                            <g filter="url(#goo)">

                                <circle id="main_circle" class="st0" cx="171.5" cy="175.6" r="130" />

                                <circle id="circle" class="bubble0 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble1 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble2 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble3 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble4 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble5 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble6 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble7 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble8 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble9 st1" cx="171.5" cy="175.6" r="122.7" />
                                <circle id="circle" class="bubble10 st1" cx="171.5" cy="175.6" r="122.7" />

                            </g>
                        </svg>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="name-wrapper">
                    <h1>Tymofii <br />Sahalovych</h1>
                </div>
                <div class="clearfix"></div>
                <div class="contact-info clearfix">
                    <ul class="list-titles">
                        <li>Call</li>
                        <li>Mail</li>
                        <li>Web</li>
                        <li>Home</li>
                    </ul>
                    <ul class="list-content ">
                        <li>+41 76 815 22 59</li>
                        <li>tymofiisahalovych@gmail.com</li>
                        <li><a href="https://github.com/TymofiiSahalovych">GitHub Profile</a></li>
                        <li>Diechtersmattstrasse 9, 6074 Giswil</li>
                    </ul>
                </div>
                <div class="contact-presentation">
                    <p><span class="bold">Computer Science</span> graduate with a passion for software development and innovation.
                     Currently working as a Trainee at Axetris AG, specializing in full-stack development with C#, ASP.NET, 
                     and modern web technologies. Experienced in database optimization, Windows services development, 
                     and machine learning applications. Dedicated to creating efficient solutions that enhance productivity.</p>
                </div>
                <div class="contact-social clearfix">
                    <ul class="list-content">
                        <p><strong>Languages:</strong></p>
                        <li>English (C1 - Proficient)</li>
                        <li>German (B1 - Intermediate)</li>
                        <li>Ukrainian (Native)</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="experience section-padding">
            <div class="container">
                <h3 class="experience-title">Experience</h3>

                <div class="experience-wrapper">
                    <div class="company-wrapper clearfix">
                        <div class="experience-title">Axetris AG</div> <!-- NAME OF THE COMPANY  -->
                        <div class="time">Sep. 2022 - Present</div> <!-- THE TIME YOU WORK WITH THE COMPANY  -->
                    </div>

                    <div class="job-wrapper clearfix">
                        <div class="experience-title">Trainee </div> <!-- JOB TITLE  -->
                        <div class="company-description">
                            <p> <!-- JOB DESCRIPTION  -->
                                Axetris AG is a leading company in microtechnology applications, offering solutions in gas sensing, infrared 
                                sources, and mass flow controllers.
                                <ul>
                                    <li>Contributed to the research and development team by modernizing database structures and enhancing 
                                        accessibility using C# and SQL technologies.</li>
                                    <li>Developed and implemented Windows services to facilitate efficient background processing for various 
                                        applications.</li>
                                    <li>Created an automated solution for defect control in production leveraging machine learning, significantly 
                                        improving quality control processes.</li>
                                    <li>Reduced quality control time per unit from 5 minutes to less than 10 seconds, enhancing production 
                                        efficiency and throughput.</li>
                                </ul> 
                            </p> 
                        </div>
                    </div>

                    <div class="company-wrapper clearfix">
                        <div class="experience-title">Axetris AG</div>
                        <div class="time">May. 2022 - Jan. 2023</div> 
                    </div>

                    <div class="job-wrapper clearfix">
                        <div class="experience-title">Trainee</div>
                        <div class="company-description">
                            <p>
                                Developed an application for automation and remote control of laboratory equipment. 
                            </p>
                        </div>
                    </div>
                </div>
                <!--Skill experience-->

                <div class="section-wrapper clearfix">
                    <h3 class="section-title">Skills</h3> <!-- YOUR SET OF SKILLS  -->
                    <ul>
                        <li class="skill-percentage">C# / ASP.NET</li>
                        <li class="skill-percentage">SQL / Entity Framework</li>
                        <li class="skill-percentage">JavaScript / HTML / CSS</li>
                        <li class="skill-percentage">Agile Methodologies</li>
                        <li class="skill-percentage">Git / Version Control</li>
                        <li class="skill-percentage">API Development & Integration</li>
                        <li class="skill-percentage">Machine Learning / AI</li>
                        <li class="skill-percentage">Windows Services Development</li>

                    </ul>

                </div>

                <div class="section-wrapper clearfix">
                    <h3 class="section-title">Hobbies</h3>

                    <p>Passionate about software development and continuous learning. 
                        I enjoy exploring new technologies and solving complex technical challenges. 
                        Outside of coding,
                        Beyond tech, I stay active through volleyball and express creativity through pottery.
                    </p>

                    <p>Currently expanding technical knowledge through professional experience and continuous 
                        skill development in modern software architectures and cloud technologies.
                    </p>
                </div>

            </div>
        </section>

        <div class="clearfix"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="js/animation.js"></script>
</body>

<?php 
    require_once ("blocks/footer.php");
?>