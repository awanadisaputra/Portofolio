<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">


    <title>AwanAS</title>

    <link rel="icon" href="{{ asset('logoku.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/visitor/dashboard.css') }}">
</head>

<body>
    <aside>
        <div id="box-kiri">
            <h1 id="nama">Awan Adi Saputra</h1>
            <h2 id="jobdesk">Back End Developer</h2>
            <p>A backend developer focused on building systems that are efficient, secure, and easy to maintain.</p>

            <nav class="sidebar-nav">
                <ul>
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="#project">PROJECTS</a></li>
                    <li><a href="#skill">SKILLS</a></li>
                </ul>
            </nav>
            <section id="contact">
                <div>
                    @forelse ($contacts as $contact)
                        <a href="{{ $contact->link }}" target="_blank">
                            <img src="{{ asset('storage/' . $contact->image) }}" alt="{{ $contact->name }}"
                                class="contact-icon">
                        </a>
                    @empty
                        <p>Belum ada contact.</p>
                    @endforelse
                </div>
            </section>
        </div>
    </aside>

    <main>
        <button id="tombolLogin"><a href="log-in">Login</a></button>
        <div class="box-kanan">
            <div id="content">
                <!-- About Section -->
                <section id="about">
                    <h1>About Me</h1>
                    <p class="about-paragraph">{{ $about->description ?? 'Konten About belum tersedia.' }}</p>
                </section>

                <!-- Project Section -->
                <section id="project">
                    <h1>Projects</h1>
                    @forelse ($projects as $project)
                        <div class="project-card">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                class="project-image">
                            <div class="project-content">
                                <h3 class="project-title">
                                    {{ $project->title }}
                                </h3>
                                <p class="project-description">{{ $project->description }}</p>
                            </div>
                        </div>

                    @empty
                        <p>Belum ada proyek.</p>
                    @endforelse
                </section>

                <!-- skill Section -->
                <section id="skill">
                    <h1>Skills</h1>
                    <div class="skill-container">
                        @forelse ($skills as $skill)
                            <div class="skill-item">
                                <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}"
                                    class="skill-image">
                                <p>{{ $skill->name }}</p>
                            </div>
                        @empty
                            <p>Belum ada skill.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </main>
    <script>
        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".sidebar-nav a");

        const options = {
            root: null,
            threshold: 0.5 // hanya akan aktif saat 50% section terlihat
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const id = entry.target.getAttribute("id");
                const link = document.querySelector(`.sidebar-nav a[href="#${id}"]`);

                if (entry.isIntersecting) {
                    navLinks.forEach(el => el.classList.remove("active"));
                    if (link) link.classList.add("active");
                }
            });
        }, options);

        sections.forEach(section => {
            observer.observe(section);
        });
        // Tambahkan efek scroll + ubah warna langsung saat diklik
        document.querySelectorAll('.sidebar-nav a').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                // Scroll ke bagian yang dituju
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }

                // Langsung update active class
                navLinks.forEach(el => el.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

</body>

</html>