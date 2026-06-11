        <!-- ======= Top Bar ======= -->
        <div id="topbar" class="d-none d-lg-flex align-items-end fixed-top">
            <div class="container d-flex justify-content-end">
                <div class="social-links">
                    <a href="https://www.facebook.com/TnMConsultants" target="_blank" rel="noopener noreferrer" class="facebook" aria-label="T&M Consultants on Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/company/tnmconsultants" target="_blank" rel="noopener noreferrer" class="linkedin" aria-label="T&M Consultants on LinkedIn"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top header-scrolled">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-transparent navbar-light p-0 m-0">
                    <!-- Site Logo Here -->
                    <a class="logo mr-auto" href="/"><img src="/assets/img/tnmLogo.png" alt="TNM Logo" width="400" height="374"></a>
                    <!-- Collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobilemenu" onclick='
        if($("#my-bars").hasClass("fa-bars")){
            document.getElementById("my-bars").classList.remove("fa-bars");
            document.getElementById("my-bars").classList.add("fa-times");
        }
        else
        {
            document.getElementById("my-bars").classList.remove("fa-times");
            document.getElementById("my-bars").classList.add("fa-bars");
        }
        '>
                    <i class="fas fa-bars" id="my-bars"></i>
                </button>
                    <!-- Header links -->
                    <div class="collapse navbar-collapse" id="mobilemenu">
                        <ul class="navbar-nav ml-auto" id="myul">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about/">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                                <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                                    <a class="dropdown-item" href="/services/ai-agents/">AI Agents &amp; Assistants</a>
                                    <a class="dropdown-item" href="/services/ai-automation/">AI Automation &amp; RAG</a>
                                    <a class="dropdown-item" href="/services/fractional-cto/">Fractional CTO</a>
                                    <a class="dropdown-item" href="/services/software-delivery/">Software Delivery</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/case-studies/">Case Studies</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="demosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demos</a>
                                <div class="dropdown-menu" aria-labelledby="demosDropdown">
                                    <a class="dropdown-item" href="https://ai.assistant.tnmco.uk/" target="_blank">VIOLET - Clinic AI Assistant</a>
                                    <a class="dropdown-item" href="https://bitebot.tnmco.uk/" target="_blank">BiteBot - Restaurant AI Assistant</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact/">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Career.php">Career</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- End Header -->
